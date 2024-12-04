<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        // Load vacancies with their associated employer
        $vacancies = Vacancy::with('employer')->get();
        return response()->json($vacancies);
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
            'picture' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
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
        $vacancy->save();

    }

    public function show($id)
    {
        // Load the vacancy with its associated employer
        $vacancy = Vacancy::with('employer')->findOrFail($id);
        return response()->json($vacancy);
    }

    public function edit($id)
    {
        // Return a view to show the vacancy edit form
        $vacancy = Vacancy::findOrFail($id);
        return view('vacancies.edit', compact('vacancy'));
    }

    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $validatedData = $request->validate([
            'employer_id' => 'required|exists:employers,id',
            'name' => 'required|string|max:255',
            'hours' => 'required|integer',
            'salary' => 'required|numeric',
            'description' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $vacancy->update($validatedData);

        return response()->json($vacancy);
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
}
