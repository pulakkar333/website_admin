<?php

namespace App\Http\Controllers\admin;

use App\Models\ClientTestimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientTestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = ClientTestimonial::orderBy('order', 'ASC')->get();
        return view('admin.client-testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client-testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'order' => 'required|integer|min:0',
            'status' => 'boolean',
        ]);

        $testimonial = new ClientTestimonial();
        $testimonial->title = $request->title;
        $testimonial->details = $request->details;
        $testimonial->order = $request->order;
        $testimonial->status = $request->has('status') ? 1 : 0;
        $testimonial->save();

        return redirect()->route('admin.client-testimonial.index')
            ->with('successMsg', 'Client testimonial added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = ClientTestimonial::findOrFail($id);
        return view('admin.client-testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'order' => 'required|integer|min:0',
            'status' => 'boolean',
        ]);

        $testimonial = ClientTestimonial::findOrFail($id);
        $testimonial->title = $request->title;
        $testimonial->details = $request->details;
        $testimonial->order = $request->order;
        $testimonial->status = $request->has('status') ? 1 : 0;
        $testimonial->save();

        return redirect()->route('admin.client-testimonial.index')
            ->with('successMsg', 'Client testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = ClientTestimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('admin.client-testimonial.index')
            ->with('successMsg', 'Client testimonial deleted successfully');
    }
}

