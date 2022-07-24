<?php

namespace App\Http\Controllers;

use App\Models\Edition;

class EditionController extends Controller
{
    public function show(Edition $edition)
    {
        $categories = $edition->categories;

        return view('edition.show', compact('edition', 'categories'));
    }
}
