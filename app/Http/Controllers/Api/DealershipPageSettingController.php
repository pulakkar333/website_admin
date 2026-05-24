<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DealershipPageSetting;

class DealershipPageSettingController extends Controller
{
    public function index()
    {
        $setting = DealershipPageSetting::first();
        if (!$setting) {
            $setting = new DealershipPageSetting();
            $setting->heading_title = 'Dealership Application';
            $setting->save();
        }
        return response()->json($setting);
    }
}

