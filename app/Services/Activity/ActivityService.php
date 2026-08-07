<?php

namespace App\Services\Activity;

interface ActivityService
{
    public function getAll();

    public function findById(int $id);

    public function create(array $data);

    public function delete(int $id);

    public function log(
        string $module,
        string $action,
        string $description,
        $subject = null,
        array $properties = []
    );
}