<?php

namespace App\Http\Controllers\admin;

use App\Models\Complain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplainController extends Controller
{
    public function index()
    {
        $complains = Complain::orderBy('created_at', 'desc')->get();
        return view('admin.complain.index', compact('complains'));
    }

    public function show($id)
    {
        $complain = Complain::findOrFail($id);
        return view('admin.complain.show', compact('complain'));
    }

    public function destroy($id)
    {
        $complain = Complain::findOrFail($id);

        // Delete attachment if exists
        if ($complain->attachment && file_exists(public_path('uploads/complains/' . $complain->attachment))) {
            unlink(public_path('uploads/complains/' . $complain->attachment));
        }

        $complain->delete();

        return redirect()->back()->with('successMsg', 'Complaint Successfully Deleted');
    }

    public function updateStatus($id)
    {
        $complain = Complain::findOrFail($id);
        $complain->status = $complain->status == 1 ? 0 : 1;
        $complain->save();

        return redirect()->back()->with('successMsg', 'Status Successfully Updated');
    }
}

