<?php

namespace App\Http\Controllers\admin;

use App\Models\CoreValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoreValueController extends Controller
{
    public function index()
    {
        $coreValues = CoreValue::orderBy('order', 'asc')->get();
        return view('admin.corevalue.index', compact('coreValues'));
    }

    public function create()
    {
        return view('admin.corevalue.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $coreValue = new CoreValue();
        $coreValue->title = $request->title;
        $coreValue->icon = $request->icon;
        $coreValue->description = $request->description;
        $coreValue->order = $request->order ?? 0;
        $coreValue->status = $request->status ?? 1;
        $coreValue->save();

        return redirect()->route('corevalue.index')->with('successMsg', 'Core Value Successfully Saved');
    }

    public function edit($id)
    {
        $coreValue = CoreValue::find($id);
        return view('admin.corevalue.edit', compact('coreValue'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $coreValue = CoreValue::find($id);
        $coreValue->title = $request->title;
        $coreValue->icon = $request->icon;
        $coreValue->description = $request->description;
        $coreValue->order = $request->order ?? 0;
        $coreValue->status = $request->status ?? 1;
        $coreValue->save();

        return redirect()->route('corevalue.index')->with('successMsg', 'Core Value Successfully Updated');
    }

    public function destroy($id)
    {
        $coreValue = CoreValue::find($id);
        $coreValue->delete();

        return redirect()->back()->with('successMsg', 'Core Value Successfully Deleted');
    }
}

