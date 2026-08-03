<?php

namespace App\Repositories\Setting;

interface SettingRepository
{
    public function getFirst();

    /**
     * Get website setting.
     */
    public function getSetting();


    /**
     * Update website setting.
     */
    public function update(array $data);
}