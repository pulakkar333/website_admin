<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TechnicalSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TechnicalSupportController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'equipment_name' => 'nullable|string|max:255',
            'message' => 'required|string',
            'preferred_contact_time' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240' // max 10MB
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();
        $fileName = null;

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $uploadPath = 'uploads/technical-support';

            // Create directory if it doesn't exist
            if (!file_exists(public_path($uploadPath))) {
                mkdir(public_path($uploadPath), 0755, true);
            }

            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($uploadPath), $fileName);
            $data['file'] = $uploadPath . '/' . $fileName;
        }

        $support = TechnicalSupport::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Your technical support request has been submitted successfully!',
            'data' => $support
        ], 201);
    }
}
