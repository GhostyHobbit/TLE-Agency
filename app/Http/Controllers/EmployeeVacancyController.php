<?php

namespace App\Http\Controllers;

use App\Models\EmployeeVacancy;
use Illuminate\Http\Request;

class EmployeeVacancyController extends Controller
{
    public function index()
    {
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
        $application = EmployeeVacancy::create($request->validate([
            'employee_id' => 'required|exists:employees,id',
            'vacancy_id' => 'required|exists:vacancies,id',
            'status' => 'required|boolean',
        ]));

        return response()->json($application, 201);
    }

    public function show($id)
    {
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
        $application->update($request->validate([
            'employee_id' => 'required|exists:employees,id',
            'vacancy_id' => 'required|exists:vacancies,id',
            'status' => 'required|boolean',
        ]));

        return response()->json($application);
    }

    public function destroy($id)
    {
        EmployeeVacancy::findOrFail($id)->delete();
        return response()->json(['message' => 'Application deleted']);
    }
}

