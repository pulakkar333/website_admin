<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SoftwareProduct;
use App\Models\Setting;
use Illuminate\Http\Request;

class SoftwareProductController extends Controller
{
    /**
     * Display a listing of software products.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $software = SoftwareProduct::where('status', 1)
            ->orderBy('order', 'asc')
            ->get()
            ->map(function ($item) {
                if ($item->software_file) {
                    $item->download_url = url('/api/software/' . $item->id . '/download');
                }
                if ($item->pdf_manual_link) {
                    $item->pdf_download_url = url('/api/software/' . $item->id . '/download-pdf');
                }
                return $item;
            });

        // Get support settings
        $supportSettings = $this->getSupportSettings();

        return response()->json([
            'software' => $software,
            'support' => $supportSettings
        ]);
    }

    /**
     * Display the specified software product.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($slug)
    {
        $software = SoftwareProduct::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        // Get support settings
        $supportSettings = $this->getSupportSettings();

        // Add support settings to software object
        $software->installation_steps = $supportSettings['installation_steps'];
        $software->license_info = $supportSettings['license_info'];
        $software->download_link = $supportSettings['download_link'];
        $software->video_tutorial_link = $supportSettings['video_tutorial_link'];
        $software->support_email = $supportSettings['support_email'];
        $software->support_phone = $supportSettings['support_phone'];
        $software->support_hours = $supportSettings['support_hours'];

        // Add download URL if software file exists
        if ($software->software_file) {
            $software->download_url = url('/api/software/' . $software->id . '/download');
        }

        // Add PDF download URL if PDF manual exists
        if ($software->pdf_manual_link) {
            $software->pdf_download_url = url('/api/software/' . $software->id . '/download-pdf');
        }

        return response()->json($software);
    }

    /**
     * Get support settings from database
     *
     * @return array
     */
    private function getSupportSettings()
    {
        $settings = Setting::whereIn('key', [
            'software_installation_steps',
            'software_license_info',
            'software_download_link',
            'software_video_tutorial_link',
            'software_support_email',
            'software_support_phone',
            'software_support_hours'
        ])->pluck('value', 'key');

        return [
            'installation_steps' => $settings['software_installation_steps'] ?? null,
            'license_info' => $settings['software_license_info'] ?? null,
            'download_link' => $settings['software_download_link'] ?? null,
            'video_tutorial_link' => $settings['software_video_tutorial_link'] ?? null,
            'support_email' => $settings['software_support_email'] ?? null,
            'support_phone' => $settings['software_support_phone'] ?? null,
            'support_hours' => $settings['software_support_hours'] ?? null,
        ];
    }

    /**
     * Store a newly created software product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'version' => 'nullable|string|max:50',
            'icon' => 'nullable|string',
            'download_link' => 'nullable|string',
            'pdf_manual_link' => 'nullable|string',
            'video_tutorial_link' => 'nullable|string',
            'installation_steps' => 'nullable|string',
            'license_info' => 'nullable|string',
            'support_email' => 'nullable|email',
            'support_phone' => 'nullable|string',
            'support_hours' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean'
        ]);

        $software = SoftwareProduct::create($validated);

        return response()->json([
            'message' => 'Software product created successfully',
            'data' => $software
        ], 201);
    }

    /**
     * Update the specified software product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $software = SoftwareProduct::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'version' => 'nullable|string|max:50',
            'icon' => 'nullable|string',
            'download_link' => 'nullable|string',
            'pdf_manual_link' => 'nullable|string',
            'video_tutorial_link' => 'nullable|string',
            'installation_steps' => 'nullable|string',
            'license_info' => 'nullable|string',
            'support_email' => 'nullable|email',
            'support_phone' => 'nullable|string',
            'support_hours' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'nullable|boolean'
        ]);

        $software->update($validated);

        return response()->json([
            'message' => 'Software product updated successfully',
            'data' => $software
        ]);
    }

    /**
     * Remove the specified software product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $software = SoftwareProduct::findOrFail($id);
        $software->delete();

        return response()->json([
            'message' => 'Software product deleted successfully'
        ]);
    }

    /**
     * Get software support settings (Public API endpoint)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function supportSettings()
    {
        $supportSettings = $this->getSupportSettings();

        return response()->json([
            'success' => true,
            'data' => $supportSettings
        ]);
    }

    /**
     * Download software file (Public API endpoint)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function download($id)
    {
        $software = SoftwareProduct::where('id', $id)
            ->where('status', 1)
            ->first();

        if (!$software) {
            return response()->json([
                'success' => false,
                'message' => 'Software not found or inactive'
            ], 404);
        }

        if (!$software->software_file) {
            return response()->json([
                'success' => false,
                'message' => 'Software file not available'
            ], 404);
        }

        $filePath = public_path('uploads/software/files/' . $software->software_file);

        if (!file_exists($filePath)) {
            return response()->json([
                'success' => false,
                'message' => 'Software file not found on server'
            ], 404);
        }

        return response()->download($filePath, $software->name . '_' . $software->software_file, [
            'Content-Type' => 'application/octet-stream',
        ]);
    }

    /**
     * Download PDF manual (Public API endpoint)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function downloadPdf($id)
    {
        $software = SoftwareProduct::where('id', $id)
            ->where('status', 1)
            ->first();

        if (!$software) {
            return response()->json([
                'success' => false,
                'message' => 'Software not found or inactive'
            ], 404);
        }

        if (!$software->pdf_manual_link) {
            return response()->json([
                'success' => false,
                'message' => 'PDF manual not available'
            ], 404);
        }

        $filePath = public_path('uploads/software/manuals/' . $software->pdf_manual_link);

        if (!file_exists($filePath)) {
            return response()->json([
                'success' => false,
                'message' => 'PDF manual not found on server'
            ], 404);
        }

        return response()->download($filePath, $software->name . '_manual_' . $software->pdf_manual_link, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}