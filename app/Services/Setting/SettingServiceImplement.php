<?php

namespace App\Services\Setting;

use App\Repositories\Setting\SettingRepository;
use Illuminate\Support\Facades\Storage;

class SettingServiceImplement implements SettingService
{
    protected SettingRepository $settingRepository;

    public function __construct(
        SettingRepository $settingRepository
    ) {
        $this->settingRepository = $settingRepository;
    }

    public function getFirst()
    {
        return $this->settingRepository->getFirst();
    }

    public function update(
        int $id,
        array $data
    ) {
        $setting = $this->settingRepository->findById($id);

        /*
        |--------------------------------------------------------------------------
        | Logo
        |--------------------------------------------------------------------------
        */
        if (isset($data['logo']) && $data['logo']) {

            if (
                $setting->logo &&
                Storage::disk('public')->exists($setting->logo)
            ) {
                Storage::disk('public')->delete($setting->logo);
            }

            $data['logo'] = $data['logo']->store(
                'settings/logo',
                'public'
            );
        } else {
            unset($data['logo']);
        }

        /*
        |--------------------------------------------------------------------------
        | Favicon
        |--------------------------------------------------------------------------
        */
        if (isset($data['favicon']) && $data['favicon']) {

            if (
                $setting->favicon &&
                Storage::disk('public')->exists($setting->favicon)
            ) {
                Storage::disk('public')->delete($setting->favicon);
            }

            $data['favicon'] = $data['favicon']->store(
                'settings/favicon',
                'public'
            );
        } else {
            unset($data['favicon']);
        }

        /*
        |--------------------------------------------------------------------------
        | Hero Image
        |--------------------------------------------------------------------------
        */
        if (isset($data['hero_image']) && $data['hero_image']) {

            if (
                $setting->hero_image &&
                Storage::disk('public')->exists($setting->hero_image)
            ) {
                Storage::disk('public')->delete($setting->hero_image);
            }


            $data['hero_image'] = $data['hero_image']->store(
                'settings/hero',
                'public'
            );


        } else {

            unset($data['hero_image']);

        }

        /*
        |--------------------------------------------------------------------------
        | About Image
        |--------------------------------------------------------------------------
        */
        if (isset($data['about_image']) && $data['about_image']) {

            if (
                $setting->about_image &&
                Storage::disk('public')->exists($setting->about_image)
            ) {
                Storage::disk('public')->delete($setting->about_image);
            }

            $data['about_image'] = $data['about_image']->store(
                'settings/about',
                'public'
            );

        } else {

            unset($data['about_image']);

        }

        /*
        |--------------------------------------------------------------------------
        | QRIS
        |--------------------------------------------------------------------------
        */
        if (isset($data['qris_image']) && $data['qris_image']) {

            if (
                $setting->qris_image &&
                Storage::disk('public')->exists($setting->qris_image)
            ) {
                Storage::disk('public')->delete($setting->qris_image);
            }

            $data['qris_image'] = $data['qris_image']->store(
                'settings/qris',
                'public'
            );
        } else {
            unset($data['qris_image']);
        }

        return $this->settingRepository->update(
            $id,
            $data
        );
    }
}