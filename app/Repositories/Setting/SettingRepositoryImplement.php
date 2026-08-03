<?php

namespace App\Repositories\Setting;

use App\Models\Setting;

class SettingRepositoryImplement implements SettingRepository
{
    
    public function getFirst()
    {
        return Setting::first();
    }


    /**
     * Get website setting.
     */
    public function getSetting()
    {
        return Setting::first();
    }


    /**
     * Update website setting.
     */
    public function update(array $data)
    {
        $setting = Setting::first();

        if (!$setting) {
            return null;
        }

        $setting->update($data);

        return $setting;
    }
}