<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use App\Models\Venue;

class VenueController extends Controller
{
    public function index(Edition $edition)
    {
        return view('venue.index', compact('edition'));
    }

    public function show(Edition $edition, Venue $venue)
    {
        return view('venue.show', compact('venue'));
    }
}
