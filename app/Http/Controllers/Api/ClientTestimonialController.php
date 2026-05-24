<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClientTestimonial;
use Illuminate\Http\Request;

class ClientTestimonialController extends Controller
{
    /**
     * Display a listing of client testimonials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $testimonials = ClientTestimonial::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        return response()->json($testimonials);
    }

    /**
     * Display the specified client testimonial.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $testimonial = ClientTestimonial::findOrFail($id);
        return response()->json($testimonial);
    }

    /**
     * Store a newly created client testimonial.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean'
        ]);

        $testimonial = ClientTestimonial::create($validated);

        return response()->json([
            'message' => 'Client testimonial created successfully',
            'data' => $testimonial
        ], 201);
    }

    /**
     * Update the specified client testimonial.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $testimonial = ClientTestimonial::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'details' => 'sometimes|required|string',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean'
        ]);

        $testimonial->update($validated);

        return response()->json([
            'message' => 'Client testimonial updated successfully',
            'data' => $testimonial
        ]);
    }

    /**
     * Remove the specified client testimonial.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $testimonial = ClientTestimonial::findOrFail($id);
        $testimonial->delete();

        return response()->json([
            'message' => 'Client testimonial deleted successfully'
        ]);
    }
}

