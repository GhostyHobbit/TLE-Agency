<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeVacancy;
use App\Models\Response;

class EmployeeResponseController extends Controller
{
    public function store(Request $request, $messageId)
    {
        // Validatie
        $request->validate([
            'response' => 'required|string',
            'date' => 'nullable|date',
            'time' => 'nullable',
        ]);

        // Zoek de wachtrijvermelding op
        $employeeVacancy = EmployeeVacancy::where('message_id', $messageId)->first();

        if (!$employeeVacancy) {
            return redirect()->back()->withErrors('Geen wachtrij gevonden voor dit bericht.');
        }

        // Verwerk de drie opties
        switch ($request->input('response')) {
            case 'accept':
                $employeeVacancy->status = 3; // Status: Geaccepteerd
                break;

            case 'reject':
                $employeeVacancy->status = 4; // Status: Geweigerd
                break;

            case 'propose':
                // Sla de nieuwe voorstel op in de responses-tabel
                $response = Response::create([
                    'date' => $request->input('date'),
                    'time' => $request->input('time'),
                ]);

                // Link de response aan de wachtrij en update de status
                $employeeVacancy->response_id = $response->id;
                $employeeVacancy->status = 5; // Status: Nieuw voorstel
                break;

            default:
                return redirect()->back()->withErrors('Ongeldige optie.');
        }

        // Sla de wijzigingen in de wachtrij op
        $employeeVacancy->save();

        return redirect()->route('employees.viewresponses.1')->with('success', 'Reactie succesvol verwerkt.');
    }
}
