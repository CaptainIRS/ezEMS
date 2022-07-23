<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Edition $edition)
    {
        return view('news.index', compact('edition'));
    }

    public function show(Edition $edition, News $news)
    {
        return view('news.show', compact('news'));
    }
}
