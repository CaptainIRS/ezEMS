<?php

namespace App\Http\Controllers;

use App\Models\Edition;

class SponsorController extends Controller
{
    public function index(Edition $edition)
    {
        return view('sponsor.index', compact('edition'));
    }
}
