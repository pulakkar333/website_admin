<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255|in:Sales,Service,Admin,HR,Engineering,Other',
            'city' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'terms_accepted' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('file')) {
            $destinationPath = public_path('uploads/registrations');
            
            // Make sure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $data['file'] = 'uploads/registrations/' . $fileName;
        }

        $registration = Registration::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Your registration has been submitted successfully!',
            'data' => $registration
        ], 201);
    }
}

