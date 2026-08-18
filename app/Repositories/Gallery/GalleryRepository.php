<?php

namespace App\Repositories\Gallery;

interface GalleryRepository
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

    public function insertAtPosition(int $position);

    public function movePosition(
        int $id,
        int $oldPosition,
        int $newPosition
    );

    public function normalizeOrder();

    public function shiftAfterDelete(int $position);
}