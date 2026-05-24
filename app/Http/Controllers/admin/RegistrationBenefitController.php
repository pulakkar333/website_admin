<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RegistrationBenefit;
use Illuminate\Http\Request;

class RegistrationBenefitController extends Controller
{
    public function index()
    {
        $benefits = RegistrationBenefit::orderBy('order', 'asc')->get();
        return view('admin.registration-benefit.index', compact('benefits'));
    }

    public function create()
    {
        return view('admin.registration-benefit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0'
        ]);

        RegistrationBenefit::create($request->all());

        return redirect()->route('registration-benefit.index')->with('successMsg', 'Registration Benefit Successfully Created');
    }

    public function edit($id)
    {
        $benefit = RegistrationBenefit::findOrFail($id);
        return view('admin.registration-benefit.edit', compact('benefit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0'
        ]);

        $benefit = RegistrationBenefit::findOrFail($id);
        $benefit->update($request->all());

        return redirect()->route('registration-benefit.index')->with('successMsg', 'Registration Benefit Successfully Updated');
    }

    public function destroy($id)
    {
        $benefit = RegistrationBenefit::findOrFail($id);
        $benefit->delete();

        return redirect()->back()->with('successMsg', 'Registration Benefit Successfully Deleted');
    }
}
