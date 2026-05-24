<?php

namespace App\Http\Controllers\admin;

use App\Models\PartnerSupportBenefit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerSupportBenefitController extends Controller
{
    public function index()
    {
        $benefits = PartnerSupportBenefit::orderBy('order', 'asc')->get();
        return view('admin.partner-support-benefit.index', compact('benefits'));
    }

    public function create()
    {
        return view('admin.partner-support-benefit.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'icon' => 'required',
            'title' => 'required',
        ]);

        $benefit = new PartnerSupportBenefit();
        $benefit->icon = $request->icon;
        $benefit->title = $request->title;
        $benefit->order = $request->order ?? 0;
        $benefit->save();

        return redirect()->route('partner-support-benefit.index')->with('successMsg', 'Benefit Successfully Saved');
    }

    public function edit($id)
    {
        $benefit = PartnerSupportBenefit::find($id);
        return view('admin.partner-support-benefit.edit', compact('benefit'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'icon' => 'required',
            'title' => 'required',
        ]);

        $benefit = PartnerSupportBenefit::find($id);
        $benefit->icon = $request->icon;
        $benefit->title = $request->title;
        $benefit->order = $request->order ?? 0;
        $benefit->save();

        return redirect()->route('partner-support-benefit.index')->with('successMsg', 'Benefit Successfully Updated');
    }

    public function destroy($id)
    {
        $benefit = PartnerSupportBenefit::find($id);
        $benefit->delete();
        return redirect()->back()->with('successMsg', 'Benefit Successfully Deleted');
    }
}

