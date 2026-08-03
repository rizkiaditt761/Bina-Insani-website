<?php

namespace App\Services\Setting;

interface SettingService
{
    public function getFirst();

    public function getSetting();

    public function update(array $data);
}