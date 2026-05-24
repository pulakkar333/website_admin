<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SoftwareRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SoftwareRequestController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'software_type' => 'nullable|string|max:255',
            'requirements' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $softwareRequest = SoftwareRequest::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Your software request has been submitted successfully!',
            'data' => $softwareRequest
        ], 201);
    }
}
