<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RegionalOffice;
use Illuminate\Http\Request;

class RegionalOfficeController extends Controller
{
    public function index()
    {
        $offices = RegionalOffice::orderBy('id', 'asc')->get();
        return response()->json($offices);
    }

    public function show($id)
    {
        $office = RegionalOffice::findOrFail($id);
        return response()->json($office);
    }
}

