<?php

namespace App\Services\Setting;

use App\Repositories\Setting\SettingRepository;
use App\Services\Activity\ActivityService;
use Illuminate\Support\Facades\Storage;

class SettingServiceImplement implements SettingService
{
    protected SettingRepository $settingRepository;

    protected ActivityService $activityService;

    public function __construct(
        SettingRepository $settingRepository,
        ActivityService $activityService
    ) {
        $this->settingRepository = $settingRepository;
        $this->activityService = $activityService;
    }


    /*
    |--------------------------------------------------------------------------
    | Get Setting
    |--------------------------------------------------------------------------
    */

    public function getFirst()
    {
        return $this->settingRepository->getFirst();
    }


    /*
    |--------------------------------------------------------------------------
    | Update Setting
    |--------------------------------------------------------------------------
    */

    public function update(
        int $id,
        array $data
    ) {
        $setting = $this->settingRepository->findById($id);

        $changes = [];


        /*
        |--------------------------------------------------------------------------
        | Text Fields
        |--------------------------------------------------------------------------
        */

        $textFields = [

            // Website Identity
            'site_name',

            // Hero
            'hero_badge',
            'hero_title',
            'hero_subtitle',
            'hero_success_number',

            // About
            'about_title',
            'about_description',
            'about_alumni_count',

            // Contact
            'address',
            'phone',
            'whatsapp',
            'email',
            'google_maps',

            // Payment
            'bank_name',
            'bank_account_name',
            'bank_account_number',

            // Social Media
            'facebook',
            'instagram',
            'youtube',
            'tiktok',

            // Footer
            'footer_description',
            'copyright',

        ];


        foreach ($textFields as $field) {

            if (
                array_key_exists($field, $data) &&
                $setting->{$field} != $data[$field]
            ) {
                $changes[] = [
                    'field' => $field,
                    'old' => $setting->{$field},
                    'new' => $data[$field],
                ];
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Image Upload Helper
        |--------------------------------------------------------------------------
        |
        | File baru disimpan terlebih dahulu.
        | Setelah berhasil, file lama baru dihapus.
        |
        */

        $handleImageUpload = function (
            string $field,
            string $directory
        ) use (
            &$data,
            &$changes,
            $setting
        ) {

            if (
                !isset($data[$field]) ||
                !$data[$field]
            ) {
                unset($data[$field]);

                return;
            }


            $oldFile = $setting->{$field};


            /*
            |--------------------------------------------------------------------------
            | Store New File
            |--------------------------------------------------------------------------
            */

            $newFile = $data[$field]->store(
                $directory,
                'public'
            );


            /*
            |--------------------------------------------------------------------------
            | Update Data
            |--------------------------------------------------------------------------
            */

            $data[$field] = $newFile;


            /*
            |--------------------------------------------------------------------------
            | Activity Change
            |--------------------------------------------------------------------------
            */

            $changes[] = [
                'field' => $field,
                'old' => $oldFile,
                'new' => $newFile,
            ];


            /*
            |--------------------------------------------------------------------------
            | Delete Old File
            |--------------------------------------------------------------------------
            */

            if (
                $oldFile &&
                $oldFile !== $newFile &&
                Storage::disk('public')->exists($oldFile)
            ) {
                Storage::disk('public')->delete($oldFile);
            }
        };


        /*
        |--------------------------------------------------------------------------
        | Logo
        |--------------------------------------------------------------------------
        */

        $handleImageUpload(
            'logo',
            'settings/logo'
        );


        /*
        |--------------------------------------------------------------------------
        | Favicon
        |--------------------------------------------------------------------------
        */

        $handleImageUpload(
            'favicon',
            'settings/favicon'
        );


        /*
        |--------------------------------------------------------------------------
        | Hero Image
        |--------------------------------------------------------------------------
        */

        $handleImageUpload(
            'hero_image',
            'settings/hero'
        );


        /*
        |--------------------------------------------------------------------------
        | About Image
        |--------------------------------------------------------------------------
        */

        $handleImageUpload(
            'about_image',
            'settings/about'
        );


        /*
        |--------------------------------------------------------------------------
        | QRIS Image
        |--------------------------------------------------------------------------
        */

        $handleImageUpload(
            'qris_image',
            'settings/qris'
        );


        /*
        |--------------------------------------------------------------------------
        | Update Database
        |--------------------------------------------------------------------------
        */

        $updatedSetting = $this->settingRepository->update(
            $id,
            $data
        );


        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */

        if (
            $updatedSetting &&
            count($changes) > 0
        ) {

            $this->activityService->log(

                'setting',

                'update',

                'Memperbarui pengaturan website',

                $updatedSetting,

                [
                    'changes' => $changes,
                ]

            );
        }


        return $updatedSetting;
    }
}