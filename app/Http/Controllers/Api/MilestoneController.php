<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function index()
    {
        $milestones = Milestone::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        return response()->json($milestones);
    }

    public function show($id)
    {
        $milestone = Milestone::findOrFail($id);
        return response()->json($milestone);
    }
}
