<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AskExpertExpert;
use Illuminate\Http\Request;

class AskExpertExpertController extends Controller
{
    /**
     * Display a listing of experts.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $experts = AskExpertExpert::where('status', 1)
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Transform image paths to full URLs
        $experts->transform(function ($expert) {
            if ($expert->image) {
                $expert->image = url($expert->image);
            }
            return $expert;
        });

        return response()->json([
            'success' => true,
            'data' => $experts
        ]);
    }

    /**
     * Display the specified expert.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $expert = AskExpertExpert::where('status', 1)->find($id);

        if (!$expert) {
            return response()->json([
                'success' => false,
                'message' => 'Expert not found'
            ], 404);
        }

        // Transform image path to full URL
        if ($expert->image) {
            $expert->image = url($expert->image);
        }

        return response()->json([
            'success' => true,
            'data' => $expert
        ]);
    }
}

