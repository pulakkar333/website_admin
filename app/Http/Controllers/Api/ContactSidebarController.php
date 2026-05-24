<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactSidebarController extends Controller
{
    /**
     * Get contact sidebar information
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Fetch settings using specific keys for contact sidebar
        $settings = Setting::whereIn('key', [
            'contact_sidebar_whatsapp',
            'contact_sidebar_phone',
            'contact_sidebar_email',
            'contact_sidebar_wechat_label',
            'contact_sidebar_wechat_link',
            'contact_sidebar_status'
        ])->pluck('value', 'key');

        // Build response with default values
        $response = [
            'whatsapp' => [
                'number' => $settings['contact_sidebar_whatsapp'] ?? '+8801404003501',
                'link' => 'https://wa.me/' . preg_replace('/[^0-9]/', '', $settings['contact_sidebar_whatsapp'] ?? '+8801404003501'),
                'enabled' => true
            ],
            'phone' => [
                'number' => $settings['contact_sidebar_phone'] ?? '+8801404003501',
                'link' => 'tel:' . ($settings['contact_sidebar_phone'] ?? '+8801404003501'),
                'enabled' => true
            ],
            'email' => [
                'email' => $settings['contact_sidebar_email'] ?? 'info@gmebd.com',
                'link' => 'mailto:' . ($settings['contact_sidebar_email'] ?? 'info@gmebd.com'),
                'enabled' => true
            ],
            'wechat' => [
                'label' => $settings['contact_sidebar_wechat_label'] ?? 'WeChat',
                'link' => $settings['contact_sidebar_wechat_link'] ?? 'https://weixin.qq.com/',
                'enabled' => true
            ],
            'status' => $settings['contact_sidebar_status'] ?? '1'
        ];

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }
}

