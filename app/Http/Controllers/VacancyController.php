<?php

namespace App\Http\Controllers;

use App\Models\vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vacancy');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vacancy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(vacancy $vacancy)
    {
        return view('vacancy.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vacancy $vacancy)
    {
        return view('vacancy.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vacancy $vacancy)
    {
        //
    }
}
