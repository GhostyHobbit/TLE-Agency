<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Response;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\EmployeeVacancy;


class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with(['sender', 'recipient'])->get();
        return response()->json($messages);
    }



    public function create($vacancyId)
    {
        // Haal de vacature op via het ID
        $vacancy = Vacancy::findOrFail($vacancyId);

        // Geef de vacature door aan de view
        return view('messages.create', compact('vacancy'));
    }

    public function store(Request $request, $vacancyId)
    {
        // Valideer de invoer
        $validatedData = $request->validate([
            'number_of_invites' => 'required|integer|min:1',
            'message' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        // Haal de wachtrij op voor deze vacature (status = 1 betekent in wachtrij)
        $queue = EmployeeVacancy::where('vacancy_id', $vacancyId)
            ->where('status', 1)
            ->orderBy('id') // Sorteer op basis van wachtrijvolgorde
            ->limit($validatedData['number_of_invites']) // Limiteer tot het aantal te versturen uitnodigingen
            ->get();

        // Controleer of er genoeg mensen in de wachtrij staan
        if ($queue->isEmpty()) {
            return redirect()->back()->with('error', 'Er zijn geen kandidaten in de wachtrij.');
        }

        // Loop door de wachtrij en maak berichten aan
        foreach ($queue as $candidate) {
            // Stap 1: Maak een bericht aan
            $newMessage = Message::create([
                'user_id' => $candidate->user_id, // Gebruiker uit de wachtrij
                'vacancy_id' => $candidate->vacancy_id, // Vacature uit de wachtrij
                'message' => $validatedData['message'], // Berichtinhoud uit formulier
                'location' => $validatedData['location'],
                'date' => $validatedData['date'],
                'time' => $validatedData['time'],
            ]);

            // Stap 2: Update de wachtrij (status = 2, message_id = ID van het nieuwe bericht)
            $candidate->update([
                'status' => 2,
                'message_id' => $newMessage->id,
            ]);
        }

        // Stap 3: Redirect met een succesbericht
        return redirect()->back()->with('success', 'Berichten succesvol verzonden naar ' . $queue->count() . ' kandidaten!');
    }

    public function response($id)
    {
        // Haal het bericht op via het ID
        $message = Message::findOrFail($id);

        // Geef de view terug met het bericht
        return view('messages.response', compact('message'));
    }



    public function show($messageId)
    {
        // Haal het bericht op op basis van het ID
        $message = Message::findOrFail($messageId);

        // Geef de gegevens door aan de view
        return view('messages.show', compact('message'));
    }

    public function updateStatus(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'status' => 'required|integer',
            'message_id' => 'required|integer|exists:messages,id',
            'new_date' => 'required_if:status,5|date',
            'new_time' => 'required_if:status,5|date_format:H:i',
        ]);

        // Zoek de EmployeeVacancy op basis van message_id
        $employeeVacancy = EmployeeVacancy::where('message_id', $request->input('message_id'))->first();

        if (!$employeeVacancy) {
            return redirect()->back()->with('error', 'The requested message does not exist.');
        }

        // Check of het een nieuw voorstel betreft (status = 5)
        if ($request->input('status') == 5) {
            // Maak een nieuw record aan in de responses-tabel
            $response = Response::create([
                'date' => $request->input('new_date'),
                'time' => $request->input('new_time'),
            ]);

            // Koppel het response_id aan de EmployeeVacancy
            $employeeVacancy->response_id = $response->id;
        }

        // Update de status van EmployeeVacancy
        $employeeVacancy->status = $request->input('status');
        $employeeVacancy->save();

        // Redirect met een succesbericht
        return redirect()->route('employees.viewresponses')->with('success', 'Status succesvol bijgewerkt.');
    }


    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);

        $validatedData = $request->validate([
            'sender_id' => 'required|exists:users,id',
            'recipient_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $message->update($validatedData);

        return response()->json($message);
    }

    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        return response()->json(['message' => 'Message deleted']);
    }
}
