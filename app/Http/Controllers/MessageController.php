<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with(['sender', 'recipient'])->get();
        return response()->json($messages);
    }

    public function create()
    {
        // Return a view to show the message creation form
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sender_id' => 'required|exists:users,id',
            'recipient_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $message = Message::create($validatedData);

        return response()->json($message, 201);
    }

    public function show($id)
    {
        $message = Message::with(['sender', 'recipient'])->findOrFail($id);
        return response()->json($message);
    }

    public function edit($id)
    {
        // Return a view to show the message edit form
        $message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
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
