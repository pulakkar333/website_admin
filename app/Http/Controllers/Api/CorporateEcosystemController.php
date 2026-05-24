<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CorporateEcosystem;
use Illuminate\Http\Request;

class CorporateEcosystemController extends Controller
{
    /**
     * Display a listing of the corporate ecosystems.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $ecosystems = CorporateEcosystem::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        return response()->json($ecosystems);
    }

    /**
     * Display the specified corporate ecosystem.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */

    // public function show($id)
    // {
    //     $ecosystem = CorporateEcosystem::findOrFail($id);
    //     return response()->json($ecosystem);
    // }

    // /**
    //  * Store a newly created corporate ecosystem in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'icon' => 'nullable|string',
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'image' => 'nullable|string',
    //         'link' => 'nullable|string|max:255',
    //         'order' => 'nullable|integer',
    //         'status' => 'nullable|boolean'
    //     ]);

    //     $ecosystem = CorporateEcosystem::create($validated);

    //     return response()->json([
    //         'message' => 'Corporate ecosystem created successfully',
    //         'data' => $ecosystem
    //     ], 201);
    // }

    // /**
    //  * Update the specified corporate ecosystem in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function update(Request $request, $id)
    // {
    //     $ecosystem = CorporateEcosystem::findOrFail($id);

    //     $validated = $request->validate([
    //         'icon' => 'nullable|string',
    //         'title' => 'sometimes|required|string|max:255',
    //         'description' => 'nullable|string',
    //         'image' => 'nullable|string',
    //         'link' => 'nullable|string|max:255',
    //         'order' => 'nullable|integer',
    //         'status' => 'nullable|boolean'
    //     ]);

    //     $ecosystem->update($validated);

    //     return response()->json([
    //         'message' => 'Corporate ecosystem updated successfully',
    //         'data' => $ecosystem
    //     ]);
    // }

    // /**
    //  * Remove the specified corporate ecosystem from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function destroy($id)
    // {
    //     $ecosystem = CorporateEcosystem::findOrFail($id);
    //     $ecosystem->delete();

    //     return response()->json([
    //         'message' => 'Corporate ecosystem deleted successfully'
    //     ]);
    // }
}

