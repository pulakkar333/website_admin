<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $partners->transform(function ($partner) {
            $partner->image = url('uploads/partners/' . $partner->image);
            return $partner;
        });

        return response()->json($partners);
    }

    public function show($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->image = url('uploads/partners/' . $partner->image);

        return response()->json($partner);
    }
}
