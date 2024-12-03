<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeVacancy; // Import the EmployeeVacancy model
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Load employees with their associated vacancies through the pivot table
        $employees = Employee::with('vacancies')->get();
        return response()->json($employees);
    }

    public function create()
    {
        // Return a view to show the employee creation form
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|file',
        ]);

        $employee = Employee::create($validatedData);

        return response()->json($employee, 201);
    }

    public function show($id)
    {
        // Load the employee with their associated vacancies
        $employee = Employee::with('vacancies')->findOrFail($id);
        return response()->json($employee);
    }

    public function edit($id)
    {
        // Return a view to show the employee edit form
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|file',
        ]);

        $employee->update($validatedData);

        return response()->json($employee);
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return response()->json(['message' => 'Employee deleted']);
    }

    // Additional method to attach a vacancy to an employee
    public function attachVacancy(Request $request, $employeeId)
    {
        $validatedData = $request->validate([
            'vacancy_id' => 'required|exists:vacancies,id',
            'status' => 'required|string',
        ]);

        $employee = Employee::findOrFail($employeeId);
        $employee->vacancies()->attach($validatedData['vacancy_id'], ['status' => $validatedData['status']]);

        return response()->json(['message' => 'Vacancy attached successfully']);
    }

    // Additional method to detach a vacancy from an employee
    public function detachVacancy($employeeId, $vacancyId)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->vacancies()->detach($vacancyId);

        return response()->json(['message' => 'Vacancy detached successfully']);
    }
}
