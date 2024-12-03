<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('employers')->get();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        // Return a view to show the company creation form
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $company = Company::create($request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
        ]));

        return response()->json($company, 201);
    }

    public function show($id)
    {
        $company = Company::with('employers')->findOrFail($id);
        return response()->json($company);
    }

    public function edit($id)
    {
        // Return a view to show the company edit form
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
        ]));

        return response()->json($company);
    }

    public function destroy($id)
    {
        Company::findOrFail($id)->delete();
        return response()->json(['message' => 'Company deleted']);
    }
}
