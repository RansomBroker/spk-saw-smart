<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function compareView()
    {
        $sawData = Result::with('candidate')->where('category', 1)->get()->sortBy('rank');

        $smartData = Result::with('candidate')->where('category', 2)->get()->sortBy('rank');

        return view('compares.compare', compact('sawData', 'smartData'));
    }
}
