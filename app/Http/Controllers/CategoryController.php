<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Edition;

class CategoryController extends Controller
{
    public function show(Edition $edition, Category $category)
    {
        return view('category.show', compact('category'));
    }
}
