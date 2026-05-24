<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Item;
use App\Models\SubCategory;
use App\Slider;
use Illuminate\Http\Request;

class ItemController extends Controller
{

   public function index()
    {
        // Try to order by 'sl' if it exists, otherwise fallback to 'id'
        $query = Item::query();
        try {
            $items = $query->orderBy('product_brand', 'ASC')->get();
        } catch (\Exception $e) {
            $items = Item::orderBy('product_brand', 'ASC')->get();
        }

        $items->transform(function ($item) {
            $item->image = $item->image ? url('uploads/item/' . $item->image) : null;
            $item->brochure_url = $item->brochure ? url('uploads/brochure/' . $item->brochure) : null;
            $item->has_brochure = !empty($item->brochure);
            return $item;
        });
        return response()->json($items);
    }

    public function show($slug)
    {
        $categories = Item::where('model_name', $slug)->get();

        $categories->transform(function ($category) {
            $category->image = url('uploads/item/' . $category->image);
            $category->brochure_url = $category->brochure ? url('uploads/brochure/' . $category->brochure) : null;
            $category->has_brochure = !empty($category->brochure);
            return $category;
        });

        return response()->json($categories);
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
            return response()->json(['error' => 'Brochure not found'], 404);
        }

        $filePath = public_path('uploads/brochure/' . $item->brochure);
        return response()->download($filePath);
    }

     public function latestProducts()
    {
        $items = Item::where('is_latest', 1)
                     ->orderBy('sl', 'ASC')
                     ->orderBy('id', 'DESC')
                     ->get();

        $items->transform(function ($item) {
            $item->image = url('uploads/item/' . $item->image);
            $item->brochure_url = $item->brochure ? url('uploads/brochure/' . $item->brochure) : null;
            $item->has_brochure = !empty($item->brochure);
            return $item;
        });

        return response()->json($items);
    }

    /**
     * Get related products based on category_id
     *
     * @param  string|int  $identifier (slug or id)
     * @return \Illuminate\Http\Response
     */
   public function relatedProducts($id)
    {
        $item = Item::find($id);

        if (!$item) {
            // If not found by ID, try by slug
            $item = Item::where('slug', $id)->first();
        }

        if (!$item) {
            return response()->json([], 200);
        }

        $relatedItems = Item::where('category_id', $item->category_id)
            ->where('id', '!=', $item->id)
            ->limit(4)
            ->get();

        $relatedItems->transform(function ($relatedItem) {
            $relatedItem->image = $relatedItem->image ? url('uploads/item/' . $relatedItem->image) : null;
            $relatedItem->brochure_url = $relatedItem->brochure ? url('uploads/brochure/' . $relatedItem->brochure) : null;
            $relatedItem->has_brochure = !empty($relatedItem->brochure);
            return $relatedItem;
        });

        return response()->json($relatedItems);
    }
}