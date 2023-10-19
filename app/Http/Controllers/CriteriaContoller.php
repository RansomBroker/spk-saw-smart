<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaContoller extends Controller
{
    public function criteriaView(Criteria $criteria)
    {
        $criteriaData = $criteria::all();
        return view('criteria.criteria', compact('criteriaData'));
    }

    public function criteriaAdd(Request $request, Criteria $criteria)
    {
        $criteria->create($request->all());

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Berhasil menambahkan data kriteria baru');
        return redirect()->route('criteria.view');
    }

    public function criteriaEdit(Request $request, Criteria $criteria)
    {
        $criteria->update($request->all());
        $request->session()->flash('status', 'warning');
        $request->session()->flash('message', 'Berhasil edit data kriteria');
        return redirect()->route('criteria.view');
    }

    public function criteriaDelete(Request $request, Criteria $criteria)
    {
        $criteria->delete();
        $request->session()->flash('status', 'danger');
        $request->session()->flash('message', 'Berhasil menghapus data kriteria');
        return redirect()->route('criteria.view');
    }
}
