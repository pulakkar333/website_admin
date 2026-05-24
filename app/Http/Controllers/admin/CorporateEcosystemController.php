<?php

namespace App\Http\Controllers\admin;

use App\Models\CorporateEcosystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CorporateEcosystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecosystems = CorporateEcosystem::orderBy('order', 'ASC')->get();
        return view('admin.corporate-ecosystem.index', compact('ecosystems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.corporate-ecosystem.create');
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
            'description' => 'nullable|string',
            //'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            //'link' => 'nullable|string|max:255',
            //'order' => 'required|integer|min:0',
            //'status' => 'boolean',
        ]);

        $ecosystem = new CorporateEcosystem();
        $ecosystem->title = $request->title;
        $ecosystem->description = $request->description;
        $ecosystem->icon = $request->icon;
        $ecosystem->link = $request->link;
        $ecosystem->order = $request->order;
        $ecosystem->status = $request->has('status') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/corporate-ecosystem'), $imageName);
            $ecosystem->image = $imageName;
        }

        $ecosystem->save();

        return redirect()->route('admin.corporate-ecosystem.index')
            ->with('successMsg', 'Corporate ecosystem added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ecosystem = CorporateEcosystem::findOrFail($id);
        return view('admin.corporate-ecosystem.edit', compact('ecosystem'));
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
            'description' => 'nullable|string',
            //'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            //'link' => 'nullable|string|max:255',
            //'order' => 'required|integer|min:0',
            //'status' => 'boolean',
        ]);

        $ecosystem = CorporateEcosystem::findOrFail($id);
        $ecosystem->title = $request->title;
        $ecosystem->description = $request->description;
        $ecosystem->icon = $request->icon;
        $ecosystem->link = $request->link;
        $ecosystem->order = $request->order;
        $ecosystem->status = $request->has('status') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($ecosystem->image && File::exists(public_path('uploads/corporate-ecosystem/' . $ecosystem->image))) {
                File::delete(public_path('uploads/corporate-ecosystem/' . $ecosystem->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/corporate-ecosystem'), $imageName);
            $ecosystem->image = $imageName;
        }

        $ecosystem->save();

        return redirect()->route('admin.corporate-ecosystem.index')
            ->with('successMsg', 'Corporate ecosystem updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ecosystem = CorporateEcosystem::findOrFail($id);

        // Delete image if exists
        if ($ecosystem->image && File::exists(public_path('uploads/corporate-ecosystem/' . $ecosystem->image))) {
            File::delete(public_path('uploads/corporate-ecosystem/' . $ecosystem->image));
        }

        $ecosystem->delete();

        return redirect()->route('admin.corporate-ecosystem.index')
            ->with('successMsg', 'Corporate ecosystem deleted successfully');
    }
}

