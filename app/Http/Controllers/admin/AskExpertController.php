<?php

namespace App\Http\Controllers\admin;

use App\Models\AskExpert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AskExpertController extends Controller
{
    public function index()
    {
        $askExperts = AskExpert::orderBy('created_at', 'desc')->get();
        return view('admin.askexpert.index', compact('askExperts'));
    }

    public function show($id)
    {
        $expert = AskExpert::find($id);
        return view('admin.askexpert.show', compact('expert'));
    }

    public function destroy($id)
    {
        $expert = AskExpert::find($id);
        $expert->delete();

        return redirect()->back()->with('successMsg', 'Ask Expert Request Successfully Deleted');
    }

    public function updateStatus($id)
    {
        $expert = AskExpert::find($id);
        $expert->status = $expert->status == 1 ? 0 : 1;
        $expert->save();

        return redirect()->back()->with('successMsg', 'Status Successfully Updated');
    }
}

