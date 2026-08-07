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


    public function getFirst()
    {
        return $this->settingRepository->getFirst();
    }


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

            'site_name',
            'hero_badge',
            'hero_title',
            'hero_subtitle',
            'about_title',
            'about_description',
            'address',
            'phone',
            'whatsapp',
            'email',
            'bank_name',
            'bank_account_name',
            'bank_account_number',
            'footer_description',

        ];



        foreach ($textFields as $field) {


            if (
                isset($data[$field]) &&
                $setting->$field != $data[$field]
            ) {


                $changes[] = [

                    'field' => $field,

                    'old' => $setting->$field,

                    'new' => $data[$field],

                ];

            }

        }




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

                

            }



            $data['logo'] = $data['logo']->store(
                'settings/logo',
                'public'
            );



            $changes[] = [

                'field' => 'logo',

                'old' => $setting->logo,

                'new' => $data['logo'],

            ];


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

                

            }



            $data['favicon'] = $data['favicon']->store(
                'settings/favicon',
                'public'
            );



            $changes[] = [

                'field' => 'favicon',

                'old' => $setting->favicon,

                'new' => $data['favicon'],

            ];


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

            

            }



            $data['hero_image'] = $data['hero_image']->store(
                'settings/hero',
                'public'
            );



            $changes[] = [

                'field' => 'hero_image',

                'old' => $setting->hero_image,

                'new' => $data['hero_image'],

            ];


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

                

            }



            $data['about_image'] = $data['about_image']->store(
                'settings/about',
                'public'
            );



            $changes[] = [

                'field' => 'about_image',

                'old' => $setting->about_image,

                'new' => $data['about_image'],

            ];


        } else {

            unset($data['about_image']);

        }





        /*
        |--------------------------------------------------------------------------
        | QRIS Image
        |--------------------------------------------------------------------------
        */

        if (isset($data['qris_image']) && $data['qris_image']) {


            if (
                $setting->qris_image &&
                Storage::disk('public')->exists($setting->qris_image)
            ) {

            

            }



            $data['qris_image'] = $data['qris_image']->store(
                'settings/qris',
                'public'
            );



            $changes[] = [

                'field' => 'qris_image',

                'old' => $setting->qris_image,

                'new' => $data['qris_image'],

            ];


        } else {

            unset($data['qris_image']);

        }





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
            count($changes)
        ) {


            $this->activityService->log(

                'setting',

                'update',

                'Memperbarui pengaturan website',

                $updatedSetting,

                [

                    'changes' => $changes

                ]

            );

        }




        return $updatedSetting;

    }
}