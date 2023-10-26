<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function compareView()
    {
        return view('compares.compare');
    }
}
