<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ConsultationRequest;
use App\Jobs\SendExpertInquiryEmail; // Job ক্লাসটি ইম্পোর্ট করা হয়েছে
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class ConsultationRequestController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validation - Aligned with React field names
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'topicOfInquiry' => 'required|in:Product Info,Technical,Service,Training,Other',
            'question' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
            'g-recaptcha-response' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // 2. Verify reCAPTCHA with Google
        $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$recaptchaResponse->json('success')) {
            return response()->json([
                'success' => false, 
                'message' => 'reCAPTCHA verification failed.'
            ], 403);
        }

        // 3. Map React names to Database column names
        $data = [
            'full_name'         => $request->name,
            'organization_name' => $request->organization,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'topic_of_inquiry'  => $request->topicOfInquiry,
            'message'           => $request->question,
        ];

        // 4. Handle file upload
        if ($request->hasFile('file')) {
            $destinationPath = public_path('uploads/consultation-requests');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $data['file'] = 'uploads/consultation-requests/' . $fileName;
        }

        // 5. Save to Database
        $consultationRequest = ConsultationRequest::create($data);

        // --- NEW: Dispatch the Job to the 'jobs' table ---
        // এটি আপনার ইমেইল পাঠানোর কাজটি ব্যাকগ্রাউন্ডে পাঠিয়ে দিবে
        SendExpertInquiryEmail::dispatch($consultationRequest);

        return response()->json([
            'success' => true,
            'message' => 'Your consultation request has been submitted successfully!',
            'data' => $consultationRequest
        ], 201);
    }
}