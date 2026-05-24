<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display a listing of the statistics.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $statistics = Statistic::where('status', 1)
            ->orderBy('order', 'ASC')
            ->get(['id', 'label', 'value', 'order']);



          return response()->json($statistics);
    }

    /**
     * Get statistics in a formatted object for easy consumption
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function formatted()
    // {
    //     $statistics = Statistic::where('status', 1)
    //         ->orderBy('order', 'ASC')
    //         ->get(['key', 'label', 'value']);

    //     $formatted = [];
    //     foreach ($statistics as $stat) {
    //         $formatted[$stat->key] = [
    //             'label' => $stat->label,
    //             'value' => $stat->value
    //         ];
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'data' => $formatted
    //     ]);
    // }

    // /**
    //  * Display the specified statistic.
    //  *
    //  * @param  string  $key
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function show($key)
    // {
    //     $statistic = Statistic::where('key', $key)
    //         ->where('status', 1)
    //         ->first(['id', 'key', 'label', 'value', 'order']);

    //     if (!$statistic) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Statistic not found'
    //         ], 404);
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'data' => $statistic
    //     ]);
    // }
}

