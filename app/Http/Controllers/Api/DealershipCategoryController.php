<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DealershipCategory;

class DealershipCategoryController extends Controller
{
    public function index()
    {
        $categories = DealershipCategory::orderBy('order', 'asc')->get();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = DealershipCategory::findOrFail($id);
        return response()->json($category);
    }
}

