<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Criteria;
use App\Models\Rating;
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

    public function candidateAdd(Request $request, Candidate $candidate, Rating $rating)
    {
        // create candidate
        $data = [
            'name' => $request->name
        ];
        $candidateID = $candidate->create($data);

        // create rating
        $ratingData = collect($request->sub_criteria_id)->map(function($item) use ($candidateID) {
            return [
                'sub_criteria_id' => $item,
                'candidate_id' => $candidateID->id
            ];
        })->toArray();

        $rating->insert($ratingData);

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Berhasil menambahkan data calon baru');
        return redirect()->route('candidate.view');

    }

    public function candidateEdit(Rating $rating, Candidate $candidate, Request $request)
    {
        $data = [
          'name' => $request->name
        ];

        $candidateID = $candidate->id;

        $candidate->update($data);

        $rating->where('candidate_id', $candidateID)->delete();

        // recreate rating data
        // create rating
        $ratingData = collect($request->sub_criteria_id)->map(function($item) use ($candidateID) {
            return [
                'sub_criteria_id' => $item,
                'candidate_id' => $candidateID
            ];
        })->toArray();

        $rating->insert($ratingData);

        $request->session()->flash('status', 'warning');
        $request->session()->flash('message', 'Berhasil edit data calon');
        return redirect()->route('candidate.view');
    }

    public function candidateDelete(Candidate $candidate, Request $request)
    {
        $candidate->delete();

        $request->session()->flash('status', 'danger');
        $request->session()->flash('message', 'Berhasil menghapus data calon');
        return redirect()->route('candidate.view');
    }
}
