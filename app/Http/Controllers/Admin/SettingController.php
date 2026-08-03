<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Setting\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected SettingService $settingService;


    public function __construct(
        SettingService $settingService
    ) {
        $this->settingService = $settingService;
    }


    public function index()
    {
        $setting = $this->settingService->getSetting();

        return view('admin.settings.index', compact('setting'));
    }


    public function update(Request $request)
    {
        $data = $request->validate([

    'site_name' => [
        'required',
        'string',
        'max:255'
    ],

    'description' => [
        'nullable',
        'string'
    ],

    'hero_title' => [
        'required',
        'string',
        'max:255'
    ],

    'hero_subtitle' => [
        'nullable',
        'string'
    ],

    'address' => [
        'nullable',
        'string'
    ],
]);

        $this->settingService->update($data);


        return back()->with(
            'success',
            'Pengaturan berhasil diperbarui'
        );
    }
}