<?php

namespace App\Services\Setting;

interface SettingService
{
    public function getFirst();

    public function update(
        int $id,
        array $data
    );
}