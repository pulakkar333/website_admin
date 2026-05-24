<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactSidebarController extends Controller
{
    public function edit()
    {
        $settings = Setting::whereIn('key', [
            'contact_sidebar_whatsapp',
            'contact_sidebar_phone',
            'contact_sidebar_email',
            'contact_sidebar_wechat_label',
            'contact_sidebar_wechat_link',
            'contact_sidebar_facebook', // New
            'contact_sidebar_status',
        ])->pluck('value', 'key');

        $whatsapp    = $settings['contact_sidebar_whatsapp'] ?? '+8801404003501';
        $phone       = $settings['contact_sidebar_phone'] ?? '+8801404003501';
        $email       = $settings['contact_sidebar_email'] ?? 'info@gmebd.com';
        $wechatLabel = $settings['contact_sidebar_wechat_label'] ?? 'WeChat';
        $wechatLink  = $settings['contact_sidebar_wechat_link'] ?? 'https://weixin.qq.com/';
        $facebook    = $settings['contact_sidebar_facebook'] ?? 'https://facebook.com/'; // New
        $status      = $settings['contact_sidebar_status'] ?? '1';

        return view('admin.contact-sidebar.edit', compact('whatsapp', 'phone', 'email', 'wechatLabel', 'wechatLink', 'facebook', 'status'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'whatsapp'     => 'required|string|max:255',
            'phone'        => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'wechat_label' => 'required|string|max:255',
            'wechat_link'  => 'required|url|max:500',
            'facebook'     => 'nullable|url|max:500', // New
            'status'       => 'nullable|in:0,1',
        ]);

        $settingsData = [
            'contact_sidebar_whatsapp'     => $request->whatsapp,
            'contact_sidebar_phone'        => $request->phone,
            'contact_sidebar_email'        => $request->email,
            'contact_sidebar_wechat_label' => $request->wechat_label,
            'contact_sidebar_wechat_link'  => $request->wechat_link,
            'contact_sidebar_facebook'     => $request->facebook, // New
            'contact_sidebar_status'       => $request->status ?? '1',
        ];

        foreach ($settingsData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                [
                    'value'      => $value,
                    'type'       => $this->getSettingType($key),
                    'updated_at' => now(),
                ]
            );
        }

        return redirect()->route('contact-sidebar.edit')->with('successMsg', 'Contact Sidebar Settings Successfully Updated');
    }

    private function getSettingType($key)
    {
        $typeMap = [
            'contact_sidebar_whatsapp'     => 'text',
            'contact_sidebar_phone'        => 'text',
            'contact_sidebar_email'        => 'email',
            'contact_sidebar_wechat_label' => 'text',
            'contact_sidebar_wechat_link'  => 'url',
            'contact_sidebar_facebook'     => 'url', // New
            'contact_sidebar_status'       => 'text',
        ];

        return $typeMap[$key] ?? 'text';
    }
}
