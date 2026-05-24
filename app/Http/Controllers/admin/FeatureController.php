<?php

namespace App\Http\Controllers\admin;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::orderBy('order', 'asc')->get();
        return view('admin.feature.index', compact('features'));
    }

    public function create()
    {
        return view('admin.feature.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $feature = new Feature();
        $feature->title = $request->title;
        $feature->icon = $request->icon;
        $feature->description = $request->description;
        $feature->order = $request->order ?? 0;
        $feature->status = $request->status ?? 1;
        $feature->save();

        return redirect()->route('feature.index')->with('successMsg', 'Feature Successfully Saved');
    }

    public function edit($id)
    {
        $feature = Feature::find($id);
        return view('admin.feature.edit', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $feature = Feature::find($id);
        $feature->title = $request->title;
        $feature->icon = $request->icon;
        $feature->description = $request->description;
        $feature->order = $request->order ?? 0;
        $feature->status = $request->status ?? 1;
        $feature->save();

        return redirect()->route('feature.index')->with('successMsg', 'Feature Successfully Updated');
    }

    public function destroy($id)
    {
        $feature = Feature::find($id);
        $feature->delete();

        return redirect()->back()->with('successMsg', 'Feature Successfully Deleted');
    }
}

