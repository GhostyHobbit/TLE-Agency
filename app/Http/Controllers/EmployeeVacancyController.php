<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeVacancyController extends Controller
{
    public function index()
    {
        // Haal de ingelogde gebruiker op
        $user = Auth::user();

        // Haal de vacatures op waarvoor de gebruiker is ingeschreven met eager loading van de 'vacancy' en 'message' relaties
        $vacancies = EmployeeVacancy::where('user_id', $user->id)
            ->with(['vacancy', 'message']) // Eager load de gerelateerde vacature en bericht details
            ->get();

        // Voor elke inschrijving binnen de vacatures, bereken de wachtrijpositie
        foreach ($vacancies as $vacancy) {
            // Haal alle inschrijvingen op met hetzelfde vacature_id waar de status 1 is
            $allQueueEntries = EmployeeVacancy::where('vacancy_id', $vacancy->vacancy_id)
                ->where('status', 1)
                ->orderBy('id') // Sorteer op primaire id (verhoogend)
                ->get();

            // Stap 4: Bereken de wachtrijpositie voor elke inschrijving binnen deze vacature
            $vacancy->queuePosition = $allQueueEntries->search(function ($entry) use ($user) {
                    return $entry->user_id === $user->id;
                }) + 1; // +1 omdat array indexen vanaf 0 beginnen
        }

        // Retourneer de view met de benodigde variabelen
        return view('employees.viewresponses', compact('vacancies'));
    }

    public function create()
    {
        // Return a view to show the application creation form
        return view('employee_vacancies.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vacancy_id' => 'required|exists:vacancies,id',
        ]);

        $employeeVacancy = new EmployeeVacancy();
        $employeeVacancy->user_id = request()->user()->id;
        $employeeVacancy->vacancy_id = $request->input('vacancy_id');
        $employeeVacancy->status = 0;
        $employeeVacancy->save();

        return redirect(route('employee-vacancies.enrolled'));
    }

    public function enrolled() {
        return view('employee_vacancies.enrolled');
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
