<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FooterAddress;

class FooterAddressController extends Controller
{
    public function index()
    {
        $addresses = FooterAddress::orderBy('order', 'asc')->get();
        return response()->json($addresses);
    }

    public function show($id)
    {
        $address = FooterAddress::findOrFail($id);
        return response()->json($address);
    }
}

