<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class SubCriteriaController extends Controller
{
    public function subCriteriaView()
    {
        $criteriaData = Criteria::with('subCriteria')->get();

        return view('sub.sub_criteria', compact('criteriaData'));
    }

    public function subCriteriaAdd(SubCriteria $subCriteria, Request $request)
    {
        $subCriteria->create($request->all());

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Berhasil menambahkan data sub kriteria baru');

        return redirect()->route('subcrit.view');
    }

    public function subCriteriaEdit(SubCriteria $subCriteria, Request $request)
    {
        $subCriteria->update($request->all());

        $request->session()->flash('status', 'warning');
        $request->session()->flash('message', 'Berhasil edit data kriteria');

        return redirect()->route('subcrit.view');
    }

    public function subCriteriaDelete(SubCriteria $subCriteria, Request $request)
    {
        $subCriteria->delete();

        $request->session()->flash('status', 'danger');
        $request->session()->flash('message', 'Berhasil menghapus data sub kriteria');

        return redirect()->route('subcrit.view');
    }
}
