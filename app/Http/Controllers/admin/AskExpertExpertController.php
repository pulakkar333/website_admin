<?php

namespace App\Http\Controllers\admin;

use App\Models\AskExpertExpert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AskExpertExpertController extends Controller
{
    public function index()
    {
        $experts = AskExpertExpert::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.askexpertexpert.index', compact('experts'));
    }

    public function create()
    {
        return view('admin.askexpertexpert.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $expert = new AskExpertExpert();
        $expert->name = $request->name;
        $expert->designation = $request->designation;
        $expert->order = $request->order ?? 0;
        $expert->status = $request->status ?? 1;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadPath = 'uploads/ask-expert-experts';

            if (!file_exists(public_path($uploadPath))) {
                mkdir(public_path($uploadPath), 0755, true);
            }

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($uploadPath), $filename);
            $expert->image = $uploadPath . '/' . $filename;
        }

        $expert->save();

        return redirect()->route('askexpertexpert.index')->with('successMsg', 'Expert Successfully Saved');
    }

    public function edit($id)
    {
        $expert = AskExpertExpert::findOrFail($id);
        return view('admin.askexpertexpert.edit', compact('expert'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $expert = AskExpertExpert::findOrFail($id);
        $expert->name = $request->name;
        $expert->designation = $request->designation;
        $expert->order = $request->order ?? 0;
        $expert->status = $request->status ?? 1;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($expert->image && file_exists(public_path($expert->image))) {
                unlink(public_path($expert->image));
            }

            $file = $request->file('image');
            $uploadPath = 'uploads/ask-expert-experts';

            if (!file_exists(public_path($uploadPath))) {
                mkdir(public_path($uploadPath), 0755, true);
            }

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($uploadPath), $filename);
            $expert->image = $uploadPath . '/' . $filename;
        }

        $expert->save();

        return redirect()->route('askexpertexpert.index')->with('successMsg', 'Expert Successfully Updated');
    }

    public function destroy($id)
    {
        $expert = AskExpertExpert::findOrFail($id);

        // Delete image if exists
        if ($expert->image && file_exists(public_path($expert->image))) {
            unlink(public_path($expert->image));
        }

        $expert->delete();

        return redirect()->back()->with('successMsg', 'Expert Successfully Deleted');
    }
}

