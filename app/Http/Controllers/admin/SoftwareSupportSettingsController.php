<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoftwareSupportSettingsController extends Controller
{
    /**
     * Show the form for editing software support settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // Get or create settings
        $installationSteps = Setting::firstOrCreate(
            ['key' => 'software_installation_steps'],
            ['value' => '', 'type' => 'textarea']
        );

        $licenseInfo = Setting::firstOrCreate(
            ['key' => 'software_license_info'],
            ['value' => '', 'type' => 'textarea']
        );

        $supportEmail = Setting::firstOrCreate(
            ['key' => 'software_support_email'],
            ['value' => '', 'type' => 'text']
        );

        $supportPhone = Setting::firstOrCreate(
            ['key' => 'software_support_phone'],
            ['value' => '', 'type' => 'text']
        );

        $supportHours = Setting::firstOrCreate(
            ['key' => 'software_support_hours'],
            ['value' => '', 'type' => 'text']
        );

        $downloadLink = Setting::firstOrCreate(
            ['key' => 'software_download_link'],
            ['value' => '', 'type' => 'text']
        );

        $videoTutorialLink = Setting::firstOrCreate(
            ['key' => 'software_video_tutorial_link'],
            ['value' => '', 'type' => 'text']
        );

        return view('admin.software.support-settings', compact(
            'installationSteps',
            'licenseInfo',
            'supportEmail',
            'supportPhone',
            'supportHours',
            'downloadLink',
            'videoTutorialLink'
        ));
    }

    /**
     * Update software support settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'installation_steps' => 'nullable|string',
            'license_info' => 'nullable|string',
            'download_link' => 'nullable|url',
            'video_tutorial_link' => 'nullable|url',
            'support_email' => 'nullable|email',
            'support_phone' => 'nullable|string',
            'support_hours' => 'nullable|string',
        ]);

        // Update or create installation steps
        Setting::updateOrCreate(
            ['key' => 'software_installation_steps'],
            ['value' => $request->installation_steps ?? '', 'type' => 'textarea']
        );

        // Update or create license info
        Setting::updateOrCreate(
            ['key' => 'software_license_info'],
            ['value' => $request->license_info ?? '', 'type' => 'textarea']
        );

        // Update or create support email
        Setting::updateOrCreate(
            ['key' => 'software_support_email'],
            ['value' => $request->support_email ?? '', 'type' => 'text']
        );

        // Update or create support phone
        Setting::updateOrCreate(
            ['key' => 'software_support_phone'],
            ['value' => $request->support_phone ?? '', 'type' => 'text']
        );

        // Update or create support hours
        Setting::updateOrCreate(
            ['key' => 'software_support_hours'],
            ['value' => $request->support_hours ?? '', 'type' => 'text']
        );

        // Update or create download link
        Setting::updateOrCreate(
            ['key' => 'software_download_link'],
            ['value' => $request->download_link ?? '', 'type' => 'text']
        );

        // Update or create video tutorial link
        Setting::updateOrCreate(
            ['key' => 'software_video_tutorial_link'],
            ['value' => $request->video_tutorial_link ?? '', 'type' => 'text']
        );

        return redirect()->route('admin.software-support-settings.edit')
            ->with('successMsg', 'Software Support Settings updated successfully');
    }
}

