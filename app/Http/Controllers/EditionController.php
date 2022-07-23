<?php

namespace App\Http\Controllers;

use App\Models\Edition;

class EditionController extends Controller
{
    public function show(Edition $edition)
    {
        return view('dashboard', compact('edition'));
    }
}
