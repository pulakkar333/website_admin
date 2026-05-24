<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Leadership;
use Illuminate\Http\Request;

class LeadershipController extends Controller
{
    /**
     * Display a listing of the leadership team.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $leaderships = Leadership::where('status', 1)
            ->orderBy('order', 'ASC')
            ->get();

        // Add full image URL
        $leaderships->transform(function ($leadership) {
            if ($leadership->image) {
                $leadership->image_url = asset('uploads/leadership/' . $leadership->image);
            } else {
                $leadership->image_url = null;
            }
            return $leadership;
        });

        return response()->json([
            'success' => true,
            'data' => $leaderships
        ]);
    }

    /**
     * Display the specified leadership member.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $leadership = Leadership::where('id', $id)
            ->where('status', 1)
            ->first();

        if (!$leadership) {
            return response()->json([
                'success' => false,
                'message' => 'Leadership member not found'
            ], 404);
        }

        // Add full image URL
        if ($leadership->image) {
            $leadership->image_url = asset('uploads/leadership/' . $leadership->image);
        }

        return response()->json([
            'success' => true,
            'data' => $leadership
        ]);
    }
}

