<?php

namespace App\Http\Controllers\admin;

use App\Models\AskExpertTopic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AskExpertTopicController extends Controller
{
    public function index()
    {
        $topics = AskExpertTopic::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.askexperttopic.index', compact('topics'));
    }

    public function create()
    {
        return view('admin.askexperttopic.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        $topic = new AskExpertTopic();
        $topic->icon = $request->icon;
        $topic->title = $request->title;
        $topic->details = $request->details;
        $topic->order = $request->order ?? 0;
        $topic->status = $request->status ?? 1;
        $topic->save();

        return redirect()->route('askexperttopic.index')->with('successMsg', 'Topic Successfully Saved');
    }

    public function edit($id)
    {
        $topic = AskExpertTopic::findOrFail($id);
        return view('admin.askexperttopic.edit', compact('topic'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        $topic = AskExpertTopic::findOrFail($id);
        $topic->icon = $request->icon;
        $topic->title = $request->title;
        $topic->details = $request->details;
        $topic->order = $request->order ?? 0;
        $topic->status = $request->status ?? 1;
        $topic->save();

        return redirect()->route('askexperttopic.index')->with('successMsg', 'Topic Successfully Updated');
    }

    public function destroy($id)
    {
        $topic = AskExpertTopic::findOrFail($id);
        $topic->delete();

        return redirect()->back()->with('successMsg', 'Topic Successfully Deleted');
    }
}

