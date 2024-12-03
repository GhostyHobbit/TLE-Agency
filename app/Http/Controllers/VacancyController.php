<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        // Load vacancies with their associated employer
        $vacancies = Vacancy::all();
        $vacancies = Vacancy::withCount('employees')->get();
        return view('employers.viewvacancies', compact('vacancies'));
    }



    public function create()
    {
        // Return a view to show the vacancy creation form
        return view('vacancies.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employer_id' => 'required|exists:employers,id',
            'name' => 'required|string|max:255',
            'hours' => 'required|integer',
            'salary' => 'required|numeric',
        ]);

        $vacancy = Vacancy::create($validatedData);

        return response()->json($vacancy, 201);
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
