<?php

namespace App\Repositories\Activity;

interface ActivityRepository
{
    public function getAll();

    public function findById(int $id);

    public function create(array $data);

    public function delete(int $id);
}