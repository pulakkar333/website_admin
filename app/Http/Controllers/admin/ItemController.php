<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\Models\ParentCategory;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import Str class
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('category')->orderBy('sl', 'ASC')->orderBy('id', 'DESC')->get();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = ParentCategory::all();
        $subCategories = SubCategory::all();
        return view('admin.item.create', compact('parentCategories', 'subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|exists:sub_categories,id',
            'name' => 'required|string|max:255',
            'model_name' => 'nullable|string|max:255', // CHANGED: Added validation
            'product_brand' => 'nullable|string|max:255', // CHANGED: Added validation
            'sub_title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,bmp,png,webp|max:2048',
            'brochure' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'sl' => 'nullable|integer',
            'title1' => 'nullable|string|max:255',
            'details1' => 'nullable|string',
            'title2' => 'nullable|string|max:255',
            'details2' => 'nullable|string',
            'title3' => 'nullable|string|max:255',
            'details3' => 'nullable|string',
            'title4' => 'nullable|string|max:255',
            'details4' => 'nullable|string',
        ]);

        $image = $request->file('image');
        $brochure = $request->file('brochure');
        $slug = Str::slug($request->model_name);

        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/item')) {
                mkdir('uploads/item', 0777, true);
            }

            $image->move('uploads/item', $imagename);
        } else {
            $imagename = "default.png";
        }

        // Handle brochure upload
        $brochurename = null;
        if ($brochure) {
            $currentDate = Carbon::now()->toDateString();
            $brochurename = $slug . '-brochure-' . $currentDate . '-' . uniqid() . '.' . $brochure->getClientOriginalExtension();

            if (!file_exists('uploads/brochure')) {
                mkdir('uploads/brochure', 0777, true);
            }

            $brochure->move('uploads/brochure', $brochurename);
        }

        $item = new Item();
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->model_name = $request->model_name; // CHANGED: Added assignment
        $item->product_brand = $request->product_brand; // CHANGED: Added assignment
        $item->slug = $slug;
        $item->sub_title = $request->sub_title;
        $item->description = $request->description;
        $item->sl = $request->sl ?? 0;
        $item->title1 = $request->title1;
        $item->details1 = $request->details1;
        $item->title2 = $request->title2;
        $item->details2 = $request->details2;
        $item->title3 = $request->title3;
        $item->details3 = $request->details3;
        $item->title4 = $request->title4;
        $item->details4 = $request->details4;
        $item->image = $imagename;
        $item->brochure = $brochurename;
        $item->save();

        return redirect()->route('item.index')->with('successMsg', 'Product Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Implementation for showing a specific resource
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $parentCategories = ParentCategory::all();
        $subCategories = SubCategory::all();
        return view('admin.item.edit', compact('item', 'parentCategories', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|exists:sub_categories,id',
            'name' => 'required|string|max:255',
            'model_name' => 'nullable|string|max:255', // CHANGED: Added validation
            'product_brand' => 'nullable|string|max:255', // CHANGED: Added validation
            'sub_title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,bmp,png,webp|max:2048',
            'brochure' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'sl' => 'nullable|integer',
            'title1' => 'nullable|string|max:255',
            'details1' => 'nullable|string',
            'title2' => 'nullable|string|max:255',
            'details2' => 'nullable|string',
            'title3' => 'nullable|string|max:255',
            'details3' => 'nullable|string',
            'title4' => 'nullable|string|max:255',
            'details4' => 'nullable|string',
        ]);

        $item = Item::findOrFail($id);
        $image = $request->file('image');
        $brochure = $request->file('brochure');
        $slug = Str::slug($request->model_name);

        if ($image) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/item')) {
                mkdir('uploads/item', 0777, true);
            }

            // Delete old image if it's not the default
            if ($item->image && file_exists('uploads/item/' . $item->image) && $item->image !== 'default.png') {
                unlink('uploads/item/' . $item->image);
            }

            $image->move('uploads/item', $imagename);
        } else {
            $imagename = $item->image;
        }

        // Handle brochure upload
        if ($brochure) {
            $currentDate = Carbon::now()->toDateString();
            $brochurename = $slug . '-brochure-' . $currentDate . '-' . uniqid() . '.' . $brochure->getClientOriginalExtension();

            if (!file_exists('uploads/brochure')) {
                mkdir('uploads/brochure', 0777, true);
            }

            // Delete old brochure if exists
            if ($item->brochure && file_exists('uploads/brochure/' . $item->brochure)) {
                unlink('uploads/brochure/' . $item->brochure);
            }

            $brochure->move('uploads/brochure', $brochurename);
        } else {
            $brochurename = $item->brochure;
        }

        // Update all fields
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->model_name = $request->model_name; // CHANGED: Added assignment
        $item->product_brand = $request->product_brand; // CHANGED: Added assignment
        $item->slug = $slug;
        $item->sub_title = $request->sub_title;
        $item->description = $request->description;
        $item->sl = $request->sl ?? $item->sl ?? 0;
        $item->title1 = $request->title1;
        $item->details1 = $request->details1;
        $item->title2 = $request->title2;
        $item->details2 = $request->details2;
        $item->title3 = $request->title3;
        $item->details3 = $request->details3;
        $item->title4 = $request->title4;
        $item->details4 = $request->details4;
        $item->image = $imagename;
        $item->brochure = $brochurename;

        $item->save();

        return redirect()->route('item.index')->with('successMsg', 'Product Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if (file_exists('uploads/item/' . $item->image)) {
            unlink('uploads/item/' . $item->image);
        }
        if ($item->brochure && file_exists('uploads/brochure/' . $item->brochure)) {
            unlink('uploads/brochure/' . $item->brochure);
        }
        $item->delete();
        return redirect()->back()->with('successMsg', 'Item Successfully Deleted');
    }

    /**
     * Download brochure for a specific item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadBrochure($id)
    {
        $item = Item::findOrFail($id);

        if (!$item->brochure || !file_exists(public_path('uploads/brochure/' . $item->brochure))) {
            return redirect()->back()->with('errorMsg', 'Brochure not found');
        }

        $filePath = public_path('uploads/brochure/' . $item->brochure);
        return response()->download($filePath);
    }


     public function toggleLatest($id)
    {
        $item = Item::findOrFail($id);
        $item->is_latest = $item->is_latest == 1 ? 0 : 1;
        $item->save();

        $message = $item->is_latest == 1 ? 'Product marked as latest!' : 'Product unmarked from latest!';
        return redirect()->back()->with('successMsg', $message);
    }
}