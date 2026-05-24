<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TechnicalSupportService;
use Illuminate\Http\Request;

class TechnicalSupportServiceController extends Controller
{
    /**
     * Display a listing of technical support services.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $services = TechnicalSupportService::where('status', 1)
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $services
        ]);
    }

    /**
     * Display the specified technical support service.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $service = TechnicalSupportService::where('status', 1)->find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Support service not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $service
        ]);
    }
}

