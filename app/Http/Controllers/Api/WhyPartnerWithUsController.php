<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WhyPartnerWithUs;

class WhyPartnerWithUsController extends Controller
{
    public function index()
    {
        $items = WhyPartnerWithUs::orderBy('order', 'asc')->get();
        return response()->json($items);
    }

    public function show($id)
    {
        $item = WhyPartnerWithUs::findOrFail($id);
        return response()->json($item);
    }
}

