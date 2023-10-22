<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function candidateView()
    {
        $candidateData = Candidate::with('rating.subCriteria.criteria')->get();
        $criteriaData = Criteria::with('subCriteria')->get();
        $subCriteriaData = SubCriteria::all();
        return view('candidate.candidate', compact('candidateData', 'criteriaData', 'subCriteriaData'));
    }

    public function candidateAdd()
    {

    }

    public function candidateEdit()
    {

    }

    public function candidateDelete()
    {

    }
}
