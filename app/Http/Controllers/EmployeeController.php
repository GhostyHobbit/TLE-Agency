<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeVacancy; // Import the EmployeeVacancy model
use Illuminate\Http\Request;
use App\Models\Message;
use Carbon\Carbon;

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

    public function showMyQueue($employeeId)
    {
        // Haal de werkzoekende op
        $employee = Employee::findOrFail($employeeId);

        // Haal de vacatures op waarvoor de werkzoekende zich heeft ingeschreven
        $vacancies = $employee->vacancies()
            ->withPivot('status', 'message_id', 'created_at') // Zorg ervoor dat we de juiste pivot-velden hebben
            ->get();

        // Voeg wachtrijpositie toe aan elke vacature
        foreach ($vacancies as $vacancy) {
            // Haal alle inschrijvingen voor deze vacature op waar de status '1' is
            $allApplicants = $vacancy->employees()
                ->wherePivot('status', '1') // Filter werkzoekenden met status '1' (in de wachtrij)
                ->orderBy('employee_vacancy.created_at') // Sorteer op basis van de inschrijftijd in de wachtrij
                ->get();

            // Zoek de positie van de huidige werkzoekende in de lijst
            $queuePosition = $allApplicants->search(function ($applicant) use ($employee) {
                    return $applicant->id === $employee->id; // Zoek de werkzoekende op basis van hun ID
                }) + 1; // Voeg +1 toe omdat de zoekfunctie 0-gebaseerd is

            // Voeg de wachtrijpositie toe aan de vacature
            $vacancy->queue_position = $queuePosition;
        }

        // Haal de berichten op
        $messages = Message::whereIn('id', $vacancies->pluck('pivot.message_id'))->get();

        // Retourneer de view
        return view('employees.viewresponses', compact('vacancies', 'messages'));
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

}
