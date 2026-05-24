<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PartnerSupportBenefit;

class PartnerSupportBenefitController extends Controller
{
    public function index()
    {
        $benefits = PartnerSupportBenefit::orderBy('order', 'asc')->get();
        return response()->json($benefits);
    }

    public function show($id)
    {
        $benefit = PartnerSupportBenefit::findOrFail($id);
        return response()->json($benefit);
    }
}

