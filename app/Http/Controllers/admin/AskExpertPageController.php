<?php

namespace App\Http\Controllers\admin;

use App\Models\AskExpertPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AskExpertPageController extends Controller
{
    public function index()
    {
        $page = AskExpertPage::first();
        return view('admin.askexpertpage.index', compact('page'));
    }

    public function create()
    {
        $page = AskExpertPage::first();
        return view('admin.askexpertpage.create', compact('page'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $page = AskExpertPage::first();

        if ($page) {
            $page->title = $request->title;
            $page->description = $request->description;
            $page->status = $request->status ?? 1;
            $page->save();
        } else {
            AskExpertPage::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status ?? 1,
            ]);
        }

        return redirect()->route('askexpertpage.index')->with('successMsg', 'Page Title Successfully Saved');
    }
}

