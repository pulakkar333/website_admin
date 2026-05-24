<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Complain;
use App\Mail\ComplainMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ComplainController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'complaintCategory' => 'nullable|string|in:product,service,delivery,billing,others',
            'complaint' => 'required|string',
           // 'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:1048'
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->except('attachment');

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/complains'), $filename);
            $data['attachment'] = $filename;
        }

        $complain = Complain::create($data);

        // Send email notification
       // Mail::to('taruncse12@gmail.com')->send(new ComplainMail($data));

        return response()->json([
            'success' => true,
            'message' => 'Your complaint has been submitted successfully!',
            'data' => $complain
        ], 201);
    }
}