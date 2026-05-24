<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        return response()->json($departments);
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);
        return response()->json($department);
    }
}

