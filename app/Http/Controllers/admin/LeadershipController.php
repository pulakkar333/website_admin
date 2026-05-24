<?php

namespace App\Http\Controllers\admin;

use App\Leadership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class LeadershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaderships = Leadership::orderBy('order', 'ASC')->get();
        return view('admin.leadership.index', compact('leaderships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.leadership.create');
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
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'required|integer|min:0',
            'status' => 'boolean',
        ]);

        $leadership = new Leadership();
        $leadership->name = $request->name;
        $leadership->designation = $request->designation;
        $leadership->details = $request->details;
        $leadership->order = $request->order;
        $leadership->status = $request->has('status') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/leadership'), $imageName);
            $leadership->image = $imageName;
        }

        $leadership->save();

        return redirect()->route('admin.leadership.index')
            ->with('successMsg', 'Leadership member added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leadership = Leadership::findOrFail($id);
        return view('admin.leadership.edit', compact('leadership'));
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
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'required|integer|min:0',
            'status' => 'boolean',
        ]);

        $leadership = Leadership::findOrFail($id);
        $leadership->name = $request->name;
        $leadership->designation = $request->designation;
        $leadership->details = $request->details;
        $leadership->order = $request->order;
        $leadership->status = $request->has('status') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($leadership->image && File::exists(public_path('uploads/leadership/' . $leadership->image))) {
                File::delete(public_path('uploads/leadership/' . $leadership->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/leadership'), $imageName);
            $leadership->image = $imageName;
        }

        $leadership->save();

        return redirect()->route('admin.leadership.index')
            ->with('successMsg', 'Leadership member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leadership = Leadership::findOrFail($id);

        // Delete image if exists
        if ($leadership->image && File::exists(public_path('uploads/leadership/' . $leadership->image))) {
            File::delete(public_path('uploads/leadership/' . $leadership->image));
        }

        $leadership->delete();

        return redirect()->route('admin.leadership.index')
            ->with('successMsg', 'Leadership member deleted successfully');
    }
}

