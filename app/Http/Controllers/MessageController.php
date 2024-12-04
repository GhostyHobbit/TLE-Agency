<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Vacancy;

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
        // Haal de vacature op
        $vacancy = Vacancy::findOrFail($vacancyId);

        // Valideer de binnenkomende gegevens (bijvoorbeeld het bericht)
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'date' => 'required|string',
            'time' => 'required',
            'number_of_invites' => 'required|integer|min:1', // Validatie voor het aantal uitnodigingen
        ]);

        // Maak het bericht aan
        $message = Message::create([
            'message' => $validatedData['message'],
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'location' => $validatedData['location'] ?? 'Onbekend', // als locatie is ingevuld
        ]);

        // Haal alle werkzoekenden op die gereageerd hebben op deze vacature
        $allApplicants = $vacancy->employees()->wherePivot('status', 1)->orderBy('employee_vacancy.created_at')->get();

        // Beperk het aantal werkzoekenden tot het opgegeven aantal
        $invitedEmployees = $allApplicants->take($validatedData['number_of_invites']);

        // Als er werkzoekenden zijn die gereageerd hebben, stuur dan het bericht
        if ($invitedEmployees->count() > 0) {
            foreach ($invitedEmployees as $employee) {
                // Koppel het bericht aan de werkzoekende (update de status naar 'uitgenodigd' en koppel het bericht)
                $vacancy->employees()->updateExistingPivot($employee->id, [
                    'status' => 2, // Stel de status in op 'uitgenodigd' (2)
                    'message_id' => $message->id, // Koppel het bericht
                ]);
            }

            // Terugkeren naar de vorige pagina met een succesbericht
            return redirect()->back()->with('success', 'Bericht succesvol verstuurd naar de geselecteerde werkzoekenden!');
        }

        // Als er geen werkzoekende is die heeft gereageerd, geef een foutmelding terug
        return redirect()->back()->with('error', 'Er zijn geen werkzoekenden die hebben gereageerd op deze vacature.');
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
