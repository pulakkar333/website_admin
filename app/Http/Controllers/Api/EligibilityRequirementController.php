<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EligibilityRequirement;

class EligibilityRequirementController extends Controller
{
    public function index()
    {
        $requirements = EligibilityRequirement::orderBy('order', 'asc')->get();
        return response()->json($requirements);
    }

    public function show($id)
    {
        $requirement = EligibilityRequirement::findOrFail($id);
        return response()->json($requirement);
    }
}

