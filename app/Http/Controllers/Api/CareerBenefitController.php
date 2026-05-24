<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CareerBenefit;
use Illuminate\Http\Request;

class CareerBenefitController extends Controller
{
    public function index()
    {
        $benefits = CareerBenefit::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        return response()->json($benefits);
    }

    public function show($id)
    {
        $benefit = CareerBenefit::findOrFail($id);
        return response()->json($benefit);
    }
}
