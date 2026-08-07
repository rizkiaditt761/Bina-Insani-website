<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Activity\ActivityService;
use App\Services\Setting\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected SettingService $settingService;
    protected ActivityService $activityService;

    public function __construct(
        SettingService $settingService,
        ActivityService $activityService
    ) {
        $this->settingService = $settingService;
        $this->activityService = $activityService;
    }

    public function index()
    {
        $setting = $this->settingService->getFirst();

        return view(
            'admin.settings.index',
            compact('setting')
        );
    }

    public function update(
        Request $request,
        int $id
        
    ) {
        $data = $request->validate([
            'site_name' => [
                'required',
                'string',
                'max:255',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:2048',
            ],

            'favicon' => [
                'nullable',
                'mimes:png,jpg,ico,webp',
                'max:1024',
            ],

            'hero_title' => [
                'required',
                'string',
                'max:255',
            ],

            'hero_subtitle' => [
                'nullable',
                'string',
            ],

            'hero_badge' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hero_success_number' => [
                'nullable',
                'string',
                'max:50',
            ],
            

            'description' => [
                'nullable',
                'string',
            ],

            'address' => [
                'nullable',
                'string',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:50',
            ],

            'whatsapp' => [
                'nullable',
                'string',
                'max:50',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'google_maps' => [
                'nullable',
                'string',
            ],

            'qris_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'facebook' => [
                'nullable',
                'url',
                'max:255',
            ],

            'instagram' => [
                'nullable',
                'url',
                'max:255',
            ],

            'youtube' => [
                'nullable',
                'url',
                'max:255',
            ],

            'tiktok' => [
                'nullable',
                'url',
                'max:255',
            ],

            'hero_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'about_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:7096',
            ],

            'about_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'about_description' => [
                'nullable',
                'string',
            ],

            'about_alumni_count' => [
                'nullable',
                'string',
                'max:4',
            ],

            'bank_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'bank_account_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'bank_account_number' => [
                'nullable',
                'string',
                'max:255',
            ],

            'footer_description' => [
                'nullable',
                'string',
            ],

            'copyright' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        $this->settingService->update(
            (int) $id,
            $data
        );

        

        return redirect()
            ->route('settings.index')
            ->with(
                'success',
                'Pengaturan website berhasil diperbarui.'
            );
    }
}