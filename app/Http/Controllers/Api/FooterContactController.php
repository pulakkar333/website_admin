<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FooterContact;

class FooterContactController extends Controller
{
    public function index()
    {
        $contact = FooterContact::first();
        return response()->json($contact ?? [
            'phone' => '',
            'mobile' => '',
            'email' => ''
        ]);
    }
}

