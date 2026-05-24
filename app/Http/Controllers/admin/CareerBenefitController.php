<?php

namespace App\Http\Controllers\admin;

use App\Models\CareerBenefit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerBenefitController extends Controller
{
    public function index()
    {
        $careerBenefits = CareerBenefit::orderBy('order', 'asc')->get();
        return view('admin.careerbenefit.index', compact('careerBenefits'));
    }

    public function create()
    {
        return view('admin.careerbenefit.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $benefit = new CareerBenefit();
        $benefit->title = $request->title;
        $benefit->icon = $request->icon;
        $benefit->description = $request->description;
        $benefit->order = $request->order ?? 0;
        $benefit->status = $request->status ?? 1;
        $benefit->save();

        return redirect()->route('careerbenefit.index')->with('successMsg', 'Career Benefit Successfully Saved');
    }

    public function edit($id)
    {
        $benefit = CareerBenefit::find($id);
        return view('admin.careerbenefit.edit', compact('benefit'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $benefit = CareerBenefit::find($id);
        $benefit->title = $request->title;
        $benefit->icon = $request->icon;
        $benefit->description = $request->description;
        $benefit->order = $request->order ?? 0;
        $benefit->status = $request->status ?? 1;
        $benefit->save();

        return redirect()->route('careerbenefit.index')->with('successMsg', 'Career Benefit Successfully Updated');
    }

    public function destroy($id)
    {
        $benefit = CareerBenefit::find($id);
        $benefit->delete();

        return redirect()->back()->with('successMsg', 'Career Benefit Successfully Deleted');
    }
}

