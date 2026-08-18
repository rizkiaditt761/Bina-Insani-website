<?php

namespace App\Services\Class;

interface ClassService
{
    public function getAll(array $filters = []);

    public function getStatistics();

    public function findById(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function getActive();
}