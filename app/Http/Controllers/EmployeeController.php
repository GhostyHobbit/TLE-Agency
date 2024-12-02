<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('employeeVacancies.vacancy')->get();
        return response()->json($employees);
    }

    public function create()
    {
        // Return a view to show the employee creation form
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|file',
        ]));

        return response()->json($employee, 201);
    }

    public function show($id)
    {
        $employee = Employee::with('employeeVacancies.vacancy')->findOrFail($id);
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
        $employee->update($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|file',
        ]));

        return response()->json($employee);
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();
        return response()->json(['message' => 'Employee deleted']);
    }
}

