<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::with('employer')->get();
        return response()->json($vacancies);
    }

    public function create()
    {
        // Return a view to show the vacancy creation form
        return view('vacancies.create');
    }

    public function store(Request $request)
    {
        $vacancy = Vacancy::create($request->validate([
            'employer_id' => 'required|exists:employers,id',
            'name' => 'required|string|max:255',
            'hours' => 'required|integer',
            'salary' => 'required|numeric',
        ]));

        return response()->json($vacancy, 201);
    }

    public function show($id)
    {
        $vacancy = Vacancy::with('employer')->findOrFail($id);
        return response()->json($vacancy);
    }

    public function edit($id)
    {
        // Return a view to show the vacancy edit form
        $vacancy = Vacancy::findOrFail($id);
        return view('vacancies.edit', compact('vacancy'));
    }

    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($request->validate([
            'employer_id' => 'required|exists:employers,id',
            'name' => 'required|string|max:255',
            'hours' => 'required|integer',
            'salary' => 'required|numeric',
        ]));

        return response()->json($vacancy);
    }

    public function destroy($id)
    {
        Vacancy::findOrFail($id)->delete();
        return response()->json(['message' => 'Vacancy deleted']);
    }
}
