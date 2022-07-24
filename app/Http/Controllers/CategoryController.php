<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Edition;

class CategoryController extends Controller
{
    public function show(Edition $edition, Category $category)
    {
        $clusters = $category->clusters;

        return view('category.show', compact('edition', 'category', 'clusters'));
    }
}
