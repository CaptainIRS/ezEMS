<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cluster;
use App\Models\Edition;
use App\Models\Event;

class EventController extends Controller
{
    public function show(Edition $edition, Category $category, Cluster $cluster, Event $event)
    {
        return view('event.show', compact('event'));
    }
}
