<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RegistrationBenefit;
use Illuminate\Http\Request;

class RegistrationBenefitController extends Controller
{
    public function index()
    {
        $benefits = RegistrationBenefit::orderBy('order', 'asc')->get();
        
        return response()->json([
            'success' => true,
            'data' => $benefits
        ]);
    }

    public function show($id)
    {
        $benefit = RegistrationBenefit::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $benefit
        ]);
    }
}
