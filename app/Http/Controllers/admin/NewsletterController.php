<?php

namespace App\Http\Controllers\admin;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::orderBy('created_at', 'desc')->get();
        return view('admin.newsletter.index', compact('newsletters'));
    }

    public function show($id)
    {
        $newsletter = Newsletter::find($id);
        return view('admin.newsletter.show', compact('newsletter'));
    }

    public function destroy($id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();

        return redirect()->back()->with('successMsg', 'Newsletter Subscriber Successfully Deleted');
    }

    public function updateStatus($id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->status = $newsletter->status == 1 ? 0 : 1;
        $newsletter->save();

        return redirect()->back()->with('successMsg', 'Status Successfully Updated');
    }
}

