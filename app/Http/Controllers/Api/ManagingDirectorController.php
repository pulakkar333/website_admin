<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ManagingDirector;
use Illuminate\Http\Request;

class ManagingDirectorController extends Controller
{
    /**
     * Display the managing director information.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $md = ManagingDirector::where('status', 1)->first();

        if (!$md) {
            return response()->json([
                'success' => false,
                'message' => 'Managing Director information not found'
            ], 404);
        }

        // Add full image URLs
        if ($md->image) {
            $md->image_url = asset('uploads/managing_director/' . $md->image);
        } else {
            $md->image_url = null;
        }

        if ($md->signature) {
            $md->signature_url = asset('uploads/managing_director/' . $md->signature);
        } else {
            $md->signature_url = null;
        }

        return response()->json([
            'success' => true,
            'data' => $md
        ]);
    }
}

