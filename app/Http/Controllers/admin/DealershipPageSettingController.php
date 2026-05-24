<?php

namespace App\Http\Controllers\admin;

use App\Models\DealershipPageSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealershipPageSettingController extends Controller
{
    public function edit()
    {
        $setting = DealershipPageSetting::first();
        if (!$setting) {
            $setting = new DealershipPageSetting();
            $setting->heading_title = 'Dealership Application';
            $setting->save();
        }
        return view('admin.dealership-setting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'heading_title' => 'required',
        ]);

        $setting = DealershipPageSetting::first();
        if (!$setting) {
            $setting = new DealershipPageSetting();
        }

        $setting->heading_title = $request->heading_title;
        $setting->save();

        return redirect()->route('dealership-setting.edit')->with('successMsg', 'Page Heading Successfully Updated');
    }
}

