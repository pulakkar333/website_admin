<?php

namespace App\Http\Controllers\admin;

use App\Models\ClientCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class ClientCategoryController extends Controller
{
    public function index()
    {
        $clientCategories = ClientCategory::orderBy('order', 'asc')->get();
        return view('admin.clientcategory.index', compact('clientCategories'));
    }

    public function create()
    {
        return view('admin.clientcategory.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,bmp,png,webp|max:2048',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);

        // Handle image upload
        $imagename = null;
        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/clientmanage')) {
                mkdir('uploads/clientmanage', 0777, true);
            }

            $image->move('uploads/clientmanage', $imagename);
        }

        $category = new ClientCategory();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->title = $request->title;
        $category->details = $request->details;
        $category->image = $imagename;
        $category->order = $request->order ?? 0;
        $category->status = $request->status ?? 1;
        $category->save();

        return redirect()->route('clientcategory.index')->with('successMsg', 'Client Category Successfully Saved');
    }

    public function edit($id)
    {
        $clientCategory = ClientCategory::find($id);
        return view('admin.clientcategory.edit', compact('clientCategory'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,bmp,png,webp|max:2048',
        ]);

        $category = ClientCategory::find($id);
        $image = $request->file('image');
        $slug = Str::slug($request->name);

        // Handle image upload
        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/clientmanage')) {
                mkdir('uploads/clientmanage', 0777, true);
            }

            // Delete old image if exists
            if ($category->image && file_exists('uploads/clientmanage/' . $category->image)) {
                unlink('uploads/clientmanage/' . $category->image);
            }

            $image->move('uploads/clientmanage', $imagename);
            $category->image = $imagename;
        }

        $category->name = $request->name;
        $category->slug = $slug;
        $category->title = $request->title;
        $category->details = $request->details;
        $category->order = $request->order ?? 0;
        $category->status = $request->status ?? 1;
        $category->save();

        return redirect()->route('clientcategory.index')->with('successMsg', 'Client Category Successfully Updated');
    }

    public function destroy($id)
    {
        $category = ClientCategory::find($id);

        // Delete image if exists
        if ($category->image && file_exists('uploads/clientmanage/' . $category->image)) {
            unlink('uploads/clientmanage/' . $category->image);
        }

        $category->delete();

        return redirect()->back()->with('successMsg', 'Client Category Successfully Deleted');
    }
}

