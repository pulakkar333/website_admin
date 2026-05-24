<?php

namespace App\Http\Controllers\admin;

use App\Models\ApplicationProcess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationProcessController extends Controller
{
    public function index()
    {
        $processes = ApplicationProcess::orderBy('order', 'asc')->get();
        return view('admin.application-process.index', compact('processes'));
    }

    public function create()
    {
        return view('admin.application-process.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $process = new ApplicationProcess();
        $process->title = $request->title;
        $process->description = $request->description;
        $process->order = $request->order ?? 0;
        $process->save();

        return redirect()->route('application-process.index')->with('successMsg', 'Process Successfully Saved');
    }

    public function edit($id)
    {
        $process = ApplicationProcess::find($id);
        return view('admin.application-process.edit', compact('process'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $process = ApplicationProcess::find($id);
        $process->title = $request->title;
        $process->description = $request->description;
        $process->order = $request->order ?? 0;
        $process->save();

        return redirect()->route('application-process.index')->with('successMsg', 'Process Successfully Updated');
    }

    public function destroy($id)
    {
        $process = ApplicationProcess::find($id);
        $process->delete();
        return redirect()->back()->with('successMsg', 'Process Successfully Deleted');
    }
}

