<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AskExpert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AskExpertController extends Controller
{
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'phone' => 'required|string|max:255',
    //         'organization' => 'nullable|string|max:255',
    //         'topicOfInquiry' => 'nullable|string|in:Product Info,Technical,Service,Training,Other',
    //         'subject' => 'required|string|max:255',
    //         'question' => 'required|string',
    //         'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240' // max 10MB
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'success' => false,
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }

    //     $data = $request->except('file');
    //     $fileName = null;

    //     // Handle file upload
    //     if ($request->hasFile('file')) {
    //         $file = $request->file('file');
    //         $uploadPath = 'uploads/ask-expert';

    //         // Create directory if it doesn't exist
    //         if (!file_exists(public_path($uploadPath))) {
    //             mkdir(public_path($uploadPath), 0755, true);
    //         }

    //         $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path($uploadPath), $fileName);
    //         $data['file'] = $uploadPath . '/' . $fileName;
    //     }

    //     $askExpert = AskExpert::create($data);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Your question has been submitted successfully! Our expert will contact you soon.',
    //         'data' => $askExpert
    //     ], 201);
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'topicOfInquiry' => 'nullable|string|in:Product Info,Technical,Service,Training,Other',
            'subject' => 'required|string|max:255',
            'question' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        //----- Only validated data is safe to take
        $data = $validator->validated();
        $data['mail_status'] = 'unsend';

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $uploadPath = 'uploads/ask-expert';

            //----- Clean up the file name further
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            //----- Move file
            $file->move(public_path($uploadPath), $fileName);
            $data['file'] = $uploadPath . '/' . $fileName;
        }

        $askExpert = AskExpert::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Your question has been submitted successfully!',
            'data' => $askExpert
        ], 201);
    }
}
