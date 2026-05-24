<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return response()->json($settings);
    }

    public function show($key)
    {
        $setting = Setting::where('key', $key)->first();

        if (!$setting) {
            return response()->json([
                'success' => false,
                'message' => 'Setting not found'
            ], 404);
        }

        return response()->json([
            'key' => $setting->key,
            'value' => $setting->value
        ]);
    }

    public function getMultiple(Request $request)
    {
        $keys = $request->input('keys', []);

        if (empty($keys)) {
            return response()->json([
                'success' => false,
                'message' => 'No keys provided'
            ], 400);
        }

        $settings = Setting::whereIn('key', $keys)->get()->pluck('value', 'key');

        return response()->json($settings);
    }
}

