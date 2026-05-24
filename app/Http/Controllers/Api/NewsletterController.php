<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $newsletter = Newsletter::create([
            'email' => $request->email,
            'status' => 1
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Successfully subscribed to newsletter!',
            'data' => $newsletter
        ], 201);
    }
}
