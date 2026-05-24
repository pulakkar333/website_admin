<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AskExpertPage;
use Illuminate\Http\Request;

class AskExpertPageController extends Controller
{
    /**
     * Display the ask expert page title.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $page = AskExpertPage::where('status', 1)->first();

        if (!$page) {
            return response()->json([
                'success' => false,
                'message' => 'Page not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $page
        ]);
    }
}

