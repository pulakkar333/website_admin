<?php

namespace App\Http\Controllers\admin;

use App\Models\EligibilityRequirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EligibilityRequirementController extends Controller
{
    public function index()
    {
        $requirements = EligibilityRequirement::orderBy('order', 'asc')->get();
        return view('admin.eligibility-requirement.index', compact('requirements'));
    }

    public function create()
    {
        return view('admin.eligibility-requirement.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $requirement = new EligibilityRequirement();
        $requirement->title = $request->title;
        $requirement->description = $request->description;
        $requirement->order = $request->order ?? 0;
        $requirement->save();

        return redirect()->route('eligibility-requirement.index')->with('successMsg', 'Requirement Successfully Saved');
    }

    public function edit($id)
    {
        $requirement = EligibilityRequirement::find($id);
        return view('admin.eligibility-requirement.edit', compact('requirement'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $requirement = EligibilityRequirement::find($id);
        $requirement->title = $request->title;
        $requirement->description = $request->description;
        $requirement->order = $request->order ?? 0;
        $requirement->save();

        return redirect()->route('eligibility-requirement.index')->with('successMsg', 'Requirement Successfully Updated');
    }

    public function destroy($id)
    {
        $requirement = EligibilityRequirement::find($id);
        $requirement->delete();
        return redirect()->back()->with('successMsg', 'Requirement Successfully Deleted');
    }
}

