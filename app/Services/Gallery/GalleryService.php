<?php

namespace App\Services\Gallery;

interface GalleryService
{
    public function getAll(
        ?string $search = null,
        ?string $status = null
    );

    public function findById(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function getActive();

    public function countTotal();

    public function countActive();

    public function countInactive();
}