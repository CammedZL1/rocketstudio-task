<?php

namespace App\Http\Controllers;

use App\Models\Name;
use App\Models\CVform;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SortController extends Controller
{
    public function index()
    {
        $cvs = CVform::with(['name', 'university', 'technologies'])->get();
        return view('CV_form/sort', compact('cvs'));
    }
    public function sortByRange(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);


        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $cvs = Name::with(['cvForm.universities', 'cvForm.technologies'])
            ->whereBetween('dob', [$startDate, $endDate])
            ->get();

        return response()->json(['success' => true, 'cvs' => $cvs]);
    }

    // TODO fix sort
    // !fixed
    public function sortByCreate(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $cvs = CVform::with(['names', 'universities', 'technologies'])
            ->join('names', 'cv_forms.name_id', '=', 'names.id')
            ->whereBetween('cv_forms.created_at', [$startDate, $endDate])
            ->orderBy('names.dob', 'asc')
            ->get(['cv_forms.*']);


        return response()->json(['success' => true, 'cvs' => $cvs]);

    }
}