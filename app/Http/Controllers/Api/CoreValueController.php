<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    public function index()
    {
        $coreValues = CoreValue::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        return response()->json($coreValues);
    }

    public function show($id)
    {
        $coreValue = CoreValue::findOrFail($id);
        return response()->json($coreValue);
    }
}
