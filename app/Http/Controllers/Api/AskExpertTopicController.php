<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AskExpertTopic;
use Illuminate\Http\Request;

class AskExpertTopicController extends Controller
{
    /**
     * Display a listing of expert consultation topics.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $topics = AskExpertTopic::where('status', 1)
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $topics
        ]);
    }

    /**
     * Display the specified topic.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $topic = AskExpertTopic::where('status', 1)->find($id);

        if (!$topic) {
            return response()->json([
                'success' => false,
                'message' => 'Topic not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $topic
        ]);
    }
}

