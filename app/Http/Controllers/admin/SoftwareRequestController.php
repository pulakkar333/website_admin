<?php

namespace App\Http\Controllers\admin;

use App\Models\SoftwareRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoftwareRequestController extends Controller
{
    public function index()
    {
        $softwareRequests = SoftwareRequest::orderBy('created_at', 'desc')->get();
        return view('admin.softwarerequest.index', compact('softwareRequests'));
    }

    public function show($id)
    {
        $request = SoftwareRequest::find($id);
        return view('admin.softwarerequest.show', compact('request'));
    }

    public function destroy($id)
    {
        $request = SoftwareRequest::find($id);
        $request->delete();

        return redirect()->back()->with('successMsg', 'Software Request Successfully Deleted');
    }

    public function updateStatus($id)
    {
        $request = SoftwareRequest::find($id);
        $request->status = $request->status == 1 ? 0 : 1;
        $request->save();

        return redirect()->back()->with('successMsg', 'Status Successfully Updated');
    }
}

