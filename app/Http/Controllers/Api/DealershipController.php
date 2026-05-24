<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dealership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DealershipController extends Controller
{
    /**
     * Get business type options for dropdown
     */
    public function getBusinessTypes()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'Dealer',
                'Distributor',
                'Service Partner',
                'Other'
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            //'company' => 'required|string|max:255',
            'owner' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'trade_license_tin' => 'nullable|string|max:255',
            'business_type' => 'nullable|string|in:Dealer,Distributor,Service Partner,Other',
            'years_of_experience' => 'nullable|string|max:255',
            'area_of_interest' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'document_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/dealerships'), $fileName);
            $data['document_file'] = 'uploads/dealerships/' . $fileName;
        }

        $dealership = Dealership::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Your dealership application has been submitted successfully!',
            'data' => $dealership
        ], 201);
    }
}