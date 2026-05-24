<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class WhyWorkWithUsController extends Controller
{
    public function index()
    {
        $features = Feature::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        return response()->json($features);
    }

    public function show($id)
    {
        $feature = Feature::findOrFail($id);
        return response()->json($feature);
    }
}

