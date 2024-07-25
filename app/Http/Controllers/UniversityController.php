<?php

namespace App\Http\Controllers;

use App\Models\Name;
use App\Models\Technology;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // populates the selects
        $names = Name::all();
        $technologies = Technology::all();
        $universities = University::all();
        return view("CV_form.index", compact('universities', 'technologies', 'names'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'university_name' => 'string|required',
            'university_score' => 'integer|required',
        ]);

        $university = new University;
        $university->university_name = $request->university_name;
        $university->university_score = $request->university_score;
        $university->save();

        return response()->json(['success' => true, 'university' => $university]);
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(University $university)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, University $university)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        //
    }
}
