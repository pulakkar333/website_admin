<?php

namespace App\Http\Controllers\admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('order', 'asc')->get();
        return view('admin.department.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'icon' => 'required',
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->icon = $request->icon;
        $department->order = $request->order ?? 0;
        $department->status = $request->status ?? 1;
        $department->save();

        return redirect()->route('department.index')->with('successMsg', 'Department Successfully Saved');
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'icon' => 'required',
        ]);

        $department = Department::find($id);
        $department->name = $request->name;
        $department->icon = $request->icon;
        $department->order = $request->order ?? 0;
        $department->status = $request->status ?? 1;
        $department->save();

        return redirect()->route('department.index')->with('successMsg', 'Department Successfully Updated');
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();

        return redirect()->back()->with('successMsg', 'Department Successfully Deleted');
    }
}

