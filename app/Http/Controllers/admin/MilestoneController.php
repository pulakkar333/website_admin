<?php

namespace App\Http\Controllers\admin;

use App\Models\Milestone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MilestoneController extends Controller
{
    public function index()
    {
        $milestones = Milestone::orderBy('order', 'asc')->get();
        return view('admin.milestone.index', compact('milestones'));
    }

    public function create()
    {
        return view('admin.milestone.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'year' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $milestone = new Milestone();
        $milestone->year = $request->year;
        $milestone->title = $request->title;
        $milestone->description = $request->description;
        $milestone->order = $request->order ?? 0;
        $milestone->status = $request->status ?? 1;
        $milestone->save();

        return redirect()->route('milestone.index')->with('successMsg', 'Milestone Successfully Saved');
    }

    public function edit($id)
    {
        $milestone = Milestone::find($id);
        return view('admin.milestone.edit', compact('milestone'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'year' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $milestone = Milestone::find($id);
        $milestone->year = $request->year;
        $milestone->title = $request->title;
        $milestone->description = $request->description;
        $milestone->order = $request->order ?? 0;
        $milestone->status = $request->status ?? 1;
        $milestone->save();

        return redirect()->route('milestone.index')->with('successMsg', 'Milestone Successfully Updated');
    }

    public function destroy($id)
    {
        $milestone = Milestone::find($id);
        $milestone->delete();

        return redirect()->back()->with('successMsg', 'Milestone Successfully Deleted');
    }
}

