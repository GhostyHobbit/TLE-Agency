<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::with('company')->get();
        return response()->json($employers);
    }

    public function create()
    {
        // Return a view to show the employer creation form
        return view('employers.create');
    }

    public function store(Request $request)
    {
        $employer = Employer::create($request->validate([
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]));

        return response()->json($employer, 201);
    }

    public function show($id)
    {
        $employer = Employer::with('company', 'vacancies')->findOrFail($id);
        return response()->json($employer);
    }

    public function edit($id)
    {
        // Return a view to show the employer edit form
        $employer = Employer::findOrFail($id);
        return view('employers.edit', compact('employer'));
    }

    public function update(Request $request, $id)
    {
        $employer = Employer::findOrFail($id);
        $employer->update($request->validate([
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]));

        return response()->json($employer);
    }

    public function destroy($id)
    {
        Employer::findOrFail($id)->delete();
        return response()->json(['message' => 'Employer deleted']);
    }
}
