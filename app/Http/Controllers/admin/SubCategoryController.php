<?php

namespace App\Http\Controllers\Admin;

use App\Models\ParentCategory;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$categories = SubCategory::all();
        $categories = SubCategory::orderBy('id', 'DESC')->get();
        return view('admin.scategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.scategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_category_id' => 'required|exists:parent_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);
        $imagename = 'default.png';

        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/scategory')) {
                mkdir('uploads/scategory', 0777, true);
            }

            $image->move('uploads/scategory', $imagename);
        }

        $subcategory = new SubCategory();
        $subcategory->title = $request->name;
        $subcategory->slug = $slug;
        $subcategory->parent_category_id = $request->parent_category_id;
        $subcategory->image = $imagename;
        $subcategory->save();

        return redirect()->route('subcategory.index')
            ->with('successMsg', 'Sub Category Successfully Saved');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $scategory = SubCategory::findOrFail($id);
        return view('admin.scategory.edit', compact('scategory'));
    }

    /**
     * Update the specified resource in storage.
     */

   public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'parent_category_id' => 'required|exists:parent_categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $category = SubCategory::findOrFail($id);

    $slug = Str::slug($request->name);
    $image = $request->file('image');

    // Handle image upload
    if ($image) {
        $currentDate = Carbon::now()->toDateString();
        $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

        if (!file_exists('uploads/scategory')) {
            mkdir('uploads/scategory', 0777, true);
        }

        // delete old image (optional but recommended)
        if ($category->image && file_exists('uploads/scategory/' . $category->image)) {
            unlink('uploads/scategory/' . $category->image);
        }

        $image->move('uploads/scategory', $imagename);
    } else {
        $imagename = $category->image;
    }

    // Update fields
    $category->title = $request->name;
    $category->slug = $slug;
    $category->parent_category_id = $request->parent_category_id;
    $category->image = $imagename;

    $category->save();

    return redirect()->route('subcategory.index')
        ->with('successMsg', 'Sub Category Successfully Updated');
}


    /**
     * Remove the specified resource from storage.
     */
//    public function destroy($id)
//    {
//        $pcategory = ParentCategory::findOrFail($id);
//        $pcategory->delete();
//
//        return redirect()->back()->with('successMsg', 'Parent Category Successfully Deleted');
//    }

    public function destroy($id)
    {
        $pcategory = SubCategory::findOrFail($id);


//        if ($pcategory->subCategories()->exists()) {
//            return redirect()->back()->with('errorMsg', 'Cannot delete. This parent category has subcategories.');
//        }

        $pcategory->delete();

        return redirect()->back()->with('successMsg', 'Parent Category Successfully Deleted');
    }

}