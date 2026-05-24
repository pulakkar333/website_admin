<?php

namespace App\Http\Controllers\admin;

use App\Models\DealershipCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealershipCategoryController extends Controller
{
    public function index()
    {
        $categories = DealershipCategory::orderBy('order', 'asc')->get();
        return view('admin.dealership-category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.dealership-category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
        ]);

        $category = new DealershipCategory();
        $category->title = $request->title;
        $category->details = $request->details;
        $category->order = $request->order ?? 0;
        $category->save();

        return redirect()->route('dealership-category.index')->with('successMsg', 'Category Successfully Saved');
    }

    public function edit($id)
    {
        $category = DealershipCategory::find($id);
        return view('admin.dealership-category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
        ]);

        $category = DealershipCategory::find($id);
        $category->title = $request->title;
        $category->details = $request->details;
        $category->order = $request->order ?? 0;
        $category->save();

        return redirect()->route('dealership-category.index')->with('successMsg', 'Category Successfully Updated');
    }

    public function destroy($id)
    {
        $category = DealershipCategory::find($id);
        $category->delete();
        return redirect()->back()->with('successMsg', 'Category Successfully Deleted');
    }
}

