<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cluster;
use App\Models\Edition;

class ClusterController extends Controller
{
    public function show(Edition $edition, Category $category, Cluster $cluster)
    {
        return view('cluster.show', compact('cluster'));
    }
}
