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
        ]);

        // Maak het bericht aan
        $message = Message::create([
            'message' => $validatedData['message'],
            'date' => now()->toDateString(), // bijvoorbeeld de huidige datum
            'time' => now()->toTimeString(), // en de huidige tijd
            'location' => $validatedData['location'] ?? 'Onbekend', // als locatie is ingevuld
        ]);

        // Zoek de eerste werkzoekende die heeft gereageerd op deze vacature
        // We nemen aan dat 'status' 1 betekent dat de werkzoekende gereageerd heeft
        $firstEmployee = $vacancy->employees()->wherePivot('status', 1)->first();

        // Als er een werkzoekende is die gereageerd heeft
        if ($firstEmployee) {
            // Koppel het bericht aan de wachtrij (employee_vacancy tabel)
            $vacancy->employees()->updateExistingPivot($firstEmployee->id, [
                'status' => 2, // Bijvoorbeeld de status wijzigen naar 'uitgenodigd' (2)
                'message_id' => $message->id, // Koppel het bericht
            ]);

            // Terugkeren naar de vorige pagina met een succesbericht
            return redirect()->back()->with('success', 'Bericht succesvol verstuurd naar de werkzoekende!');
        }

        // Als er geen werkzoekende is die heeft gereageerd, geef een foutmelding terug
        return redirect()->back()->with('error', 'Er zijn geen werkzoekenden die hebben gereageerd op deze vacature.');
    }




    public function show($id)
    {
        $message = Message::with(['sender', 'recipient'])->findOrFail($id);
        return response()->json($message);
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
