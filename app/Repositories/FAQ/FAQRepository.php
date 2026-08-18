<?php

namespace App\Repositories\FAQ;

interface FAQRepository
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

    public function shiftForCreate(int $sortOrder);

    public function shiftForUpdate(
        int $id,
        int $oldSortOrder,
        int $newSortOrder
    );

    public function normalizeOrder();
}