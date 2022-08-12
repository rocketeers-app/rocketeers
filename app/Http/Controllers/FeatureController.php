<?php

namespace App\Http\Controllers;

use App\Models\Feature;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::whereNotNull('description')->get();
        $littleBigDetails = Feature::whereNull('description')->get();

        return view('features.index', compact('features', 'littleBigDetails'));
    }

    public function show(Feature $feature)
    {
        return view('features.show', compact('feature'));
    }
}
