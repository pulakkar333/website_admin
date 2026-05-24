<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DealershipContact;

class DealershipContactController extends Controller
{
    public function index()
    {
        $contact = DealershipContact::first();
        return response()->json($contact ?? ['email' => '', 'phone' => '', 'office_hours' => '']);
    }
}

