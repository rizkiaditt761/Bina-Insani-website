<?php

namespace App\Repositories\Setting;

use App\Models\Setting;

class SettingRepositoryImplement implements SettingRepository
{
    public function getFirst()
    {
        return Setting::first();
    }

    public function findById(int $id)
    {
        return Setting::findOrFail($id);
    }

    public function update(
        int $id,
        array $data
    ) {
        
        $setting = Setting::findOrFail($id);

        $setting->update($data);

        return $setting;
    }
}