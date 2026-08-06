<?php

namespace App\Repositories\Setting;

interface SettingRepository
{
    public function getFirst();

    public function findById(int $id);

    public function update(
        int $id,
        array $data
    );
}