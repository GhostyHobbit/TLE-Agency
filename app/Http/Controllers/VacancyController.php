<?php

namespace App\Http\Controllers;

use App\Models\EmployeeVacancy;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    public function index(Request $request)
    {
        $query = Vacancy::query();
        $query->where('status', 'active');


        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%')
                    ->orWhereHas('employer', function($q) use ($search) {
                        $q->where('company', 'like', '%' . $search . '%');
                    });
            });
        }

        if ($request->has('location') && $request->location != '') {
            $query->where('location', $request->location);
        }

        if ($request->has('hours') && $request->hours != '') {
            $hoursRange = explode('-', $request->hours);
            $query->whereBetween('hours', [$hoursRange[0], $hoursRange[1]]);
        }

        $vacancies = $query->get();
        $locations = Vacancy::select('location')->distinct()->orderBy('location')->get();
        $hoursRanges = [
            '0-8' => '0-8',
            '9-16' => '9-16',
            '17-24' => '17-24',
            '25-32' => '25-32',
            '33-36' => '33-36',
            '37-40' => '37-40',
        ];

        return view('vacancies.index', compact('vacancies', 'locations', 'hoursRanges'));
    }

    public function get ()
    {
        // Load vacancies with their associated employer
        $vacancies = Vacancy::all();

        return view('employers.viewvacancies', compact('vacancies'));
    }

    public function create()
    {
        // Return a view to show the vacancy creation form
        return view('vacancies.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'employer_id' => 'required|exists:employers,id',
            'name' => 'required|string|max:255',
            'hours' => 'required|integer',
            'salary' => 'required|numeric',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'tasks' => 'required|string',
            'qualifications' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'status' => 'required|string|in:active,not_active',
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('vacancies', 'public'); // Store file in 'storage/app/public/vacancies'
        }


        $vacancy = new Vacancy();
        $vacancy->employer_id = $request->input('employer_id');
        $vacancy->name = $request->input("name");
        $vacancy->hours = $request->input("hours");
        $vacancy->salary = $request->input("salary");
        $vacancy->location = $request->input("location");
        $vacancy ->description = $request->input("description");
        $vacancy->path = $path;
        $vacancy->tasks = $request->input("tasks");
        $vacancy->qualifications = $request->input("qualifications");
        $vacancy->status = $request->input("status");
        $vacancy->save();

        return redirect()->route('vacancies.index');
    }

    public function show($id)
    {
        // Load the vacancy with its associated employer
        $vacancy = Vacancy::with('employer')->findOrFail($id);

        $user = Auth::user();

        if ($user === null) {
            $userCheck = null;
        } else {
            $userCheck = EmployeeVacancy::where('user_id', $user->id)
                ->where('vacancy_id', $vacancy->id)
                ->first();
        }

        return view('vacancies.show', compact('vacancy'), compact('userCheck'));
    }

    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('vacancies.edit', compact('vacancy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'hours' => 'required|numeric',
            'salary' => 'required|numeric',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'tasks' => 'required|string',
            'qualifications' => 'required|string',
            'status' => 'required|in:active,not_active',
            'picture' => 'nullable|image|mimes:jpeg,png,gif|max:2048', // Optional picture validation
        ]);

        $vacancy = Vacancy::findOrFail($id);

        // Update the vacancy fields
        $vacancy->name = $request->input('name');
        $vacancy->hours = $request->input('hours');
        $vacancy->salary = $request->input('salary');
        $vacancy->location = $request->input('location');
        $vacancy->description = $request->input('description');
        $vacancy->tasks = $request->input('tasks');
        $vacancy->qualifications = $request->input('qualifications');
        $vacancy->status = $request->input('status');

        // Handle the picture upload if a new picture is provided
        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->store('vacancies', 'public');
            $vacancy->path = $imagePath; // Save the path of the uploaded image
        }

        $vacancy->save(); // Save the updated vacancy

        // Redirect or return success message
        return redirect()->route('vacancies.index')->with('success', 'Vacature succesvol bijgewerkt.');
    }


    public function destroy($id)
    {
        Vacancy::findOrFail($id)->delete();
        return response()->json(['message' => 'Vacancy deleted']);
    }

    // Additional method to attach an employee to a vacancy
    public function attachEmployee(Request $request, $vacancyId)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'status' => 'required|string',
        ]);

        $vacancy = Vacancy::findOrFail($vacancyId);
        $vacancy->employees()->attach($validatedData['employee_id'], ['status' => $validatedData['status']]);

        return response()->json(['message' => 'Employee attached successfully']);
    }

    // Additional method to detach an employee from a vacancy
    public function detachEmployee($vacancyId, $employeeId)
    {
        $vacancy = Vacancy::findOrFail($vacancyId);
        $vacancy->employees()->detach($employeeId);

        return response()->json(['message' => 'Employee detached successfully']);
    }

    public function toggleStatus($vacancyId)
    {
        $vacancy = Vacancy::findOrFail($vacancyId);

        // Toggle the status between 'active' and 'not active'
        $vacancy->status = $vacancy->status === 'active' ? 'not active' : 'active';
        $vacancy->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Vacaturestatus is bijgewerkt.');
    }

}
