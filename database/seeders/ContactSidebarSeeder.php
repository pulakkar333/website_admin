<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'key' => 'contact_sidebar_whatsapp',
                'value' => '+8801404003501',
                'type' => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact_sidebar_phone',
                'value' => '+8801404003501',
                'type' => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact_sidebar_email',
                'value' => 'info@gmebd.com',
                'type' => 'email',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact_sidebar_wechat_label',
                'value' => 'WeChat',
                'type' => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact_sidebar_wechat_link',
                'value' => 'https://weixin.qq.com/',
                'type' => 'url',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact_sidebar_status',
                'value' => '1',
                'type' => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert only if they don't exist
        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}

