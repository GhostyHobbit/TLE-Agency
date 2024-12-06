<?php

namespace App\Http\Controllers;

use App\Models\EmployeeVacancy;
use Illuminate\Http\Request;

class EmployeeVacancyController extends Controller
{
    public function index()
    {
        // Load applications with their associated employee and vacancy
        $applications = EmployeeVacancy::with(['employee', 'vacancy'])->get();
        return response()->json($applications);
    }

    public function create()
    {
        // Return a view to show the application creation form
        return view('employee_vacancies.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'vacancy_id' => 'required|exists:vacancies,id',
            'status' => 'required|boolean',
        ]);

        $application = EmployeeVacancy::create($validatedData);

        return response()->json($application, 201);
    }

    public function show($id)
    {
        // Load the application with its associated employee and vacancy
        $application = EmployeeVacancy::with(['employee', 'vacancy'])->findOrFail($id);
        return response()->json($application);
    }

    public function edit($id)
    {
        // Return a view to show the application edit form
        $application = EmployeeVacancy::findOrFail($id);
        return view('employee_vacancies.edit', compact('application'));
    }

    public function update(Request $request, $id)
    {
        $application = EmployeeVacancy::findOrFail($id);

        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'vacancy_id' => 'required|exists:vacancies,id',
            'status' => 'required|boolean',
        ]);

        $application->update($validatedData);

        return response()->json($application);
    }

    public function destroy($id)
    {
        EmployeeVacancy::findOrFail($id)->delete();
        return response()->json(['message' => 'Application deleted']);
    }
}
