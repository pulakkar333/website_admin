<?php

namespace App\Http\Controllers\admin;

use App\Models\Dealership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealershipController extends Controller
{
    public function index()
    {
        $dealerships = Dealership::orderBy('created_at', 'desc')->get();
        return view('admin.dealership.index', compact('dealerships'));
    }

    public function show($id)
    {
        $dealership = Dealership::find($id);
        return view('admin.dealership.show', compact('dealership'));
    }

    public function destroy($id)
    {
        $dealership = Dealership::find($id);
        $dealership->delete();

        return redirect()->back()->with('successMsg', 'Dealership Application Successfully Deleted');
    }

    public function updateStatus($id)
    {
        $dealership = Dealership::find($id);
        $dealership->status = $dealership->status == 1 ? 0 : 1;
        $dealership->save();

        return redirect()->back()->with('successMsg', 'Status Successfully Updated');
    }
}

