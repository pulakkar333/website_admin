<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'key' => 'required|unique:settings,key',
            //'value' => 'required',
        ]);

        $setting = new Setting();
        $setting->key = $request->key;
        $setting->value = $request->value;
        $setting->type = $request->type ?? 'text';
        $setting->save();

        return redirect()->route('setting.index')->with('successMsg', 'Setting Successfully Saved');
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'key' => 'required|unique:settings,key,' . $id,
            //'value' => 'required',
        ]);

        $setting = Setting::find($id);
        $setting->key = $request->key;
        $setting->value = $request->value;
        $setting->type = $request->type ?? 'text';
        $setting->save();

        return redirect()->route('setting.index')->with('successMsg', 'Setting Successfully Updated');
    }

    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();

        return redirect()->back()->with('successMsg', 'Setting Successfully Deleted');
    }
}

