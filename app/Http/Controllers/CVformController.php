<?php

namespace App\Http\Controllers;

use App\Models\Name;
use App\Models\CVform;
use Illuminate\Http\Request;

class CVformController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // was used for testing, almost identical to SortController.index()
    public function index()
    {
        $cvs = CVform::with(['names', 'universities', 'technologies'])->get();
        return view('CV_form/show', compact('cvs'));
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
            'fname' => 'required|string',
            'mname' => 'required|string',
            'lname' => 'required|string',
            'date' => 'date|required',
            'university_id' => 'exists:universities,id',
            'technology_ids' => 'nullable|array',
            'technology_ids.*' => 'exists:technologies,id',
        ]);

        // finds the person or creates a new entry, if they exist checks if university is given
        // and checks if there are any new technologies added
        try {
            $name = Name::firstOrCreate([
                'fname' => $request->fname,
                'mname' => $request->mname,
                'lname' => $request->lname,
                'dob' => $request->date,
            ]);

            $cvform = CVform::where('name_id', $name->id)->first();
            if ($cvform) {
                if ($request->filled('university_id')) {
                    $cvform->university_id = $request->university_id;
                }
                $cvform->save();

                if ($request->filled('technology_ids')) {
                    $oldTechnologies = $cvform->technologies()->pluck('technology_id')->toArray();
                    $newTechnologies = array_unique(array_merge($oldTechnologies, $request->technology_ids));
                    $cvform->technologies()->sync($newTechnologies);
                }
            } else {
                $cvform = CVform::create([
                    'name_id' => $name->id,
                    'university_id' => $request->university_id,
                ]);
                if ($request->filled('technology_ids')) {
                    $cvform->technologies()->attach($request->technology_ids);
                }
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CVform $cVform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CVform $cVform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CVform $cVform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CVform $cVform)
    {
        //
    }
}
