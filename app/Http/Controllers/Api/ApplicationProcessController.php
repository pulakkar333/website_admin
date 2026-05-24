<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApplicationProcess;

class ApplicationProcessController extends Controller
{
    public function index()
    {
        $processes = ApplicationProcess::orderBy('order', 'asc')->get();
        return response()->json($processes);
    }

    public function show($id)
    {
        $process = ApplicationProcess::findOrFail($id);
        return response()->json($process);
    }
}

