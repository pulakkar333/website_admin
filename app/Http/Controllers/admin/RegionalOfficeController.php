<?php

namespace App\Http\Controllers\admin;

use App\Models\RegionalOffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionalOfficeController extends Controller
{
    public function index()
    {
        $regionalOffices = RegionalOffice::orderBy('id', 'asc')->get();
        return view('admin.regionaloffice.index', compact('regionalOffices'));
    }

    public function create()
    {
        return view('admin.regionaloffice.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
        ]);

        $office = new RegionalOffice();
        $office->title = $request->title;
        $office->details = $request->details;
        $office->save();

        return redirect()->route('regionaloffice.index')->with('successMsg', 'Regional Office Successfully Saved');
    }

    public function edit($id)
    {
        $office = RegionalOffice::find($id);
        return view('admin.regionaloffice.edit', compact('office'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
        ]);

        $office = RegionalOffice::find($id);
        $office->title = $request->title;
        $office->details = $request->details;
        $office->save();

        return redirect()->route('regionaloffice.index')->with('successMsg', 'Regional Office Successfully Updated');
    }

    public function destroy($id)
    {
        $office = RegionalOffice::find($id);
        $office->delete();

        return redirect()->back()->with('successMsg', 'Regional Office Successfully Deleted');
    }
}

