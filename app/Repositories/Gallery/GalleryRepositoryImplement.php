<?php

namespace App\Repositories\Gallery;

use App\Models\Gallery;

class GalleryRepositoryImplement implements GalleryRepository
{
    public function getAll(
        ?string $search = null,
        ?string $status = null
    ) {
        return Gallery::query()

            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })

            ->when(
                $status !== null && $status !== '',
                function ($query) use ($status) {
                    $query->where(
                        'is_active',
                        (bool) $status
                    );
                }
            )

            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();
    }


    public function findById(int $id)
    {
        return Gallery::findOrFail($id);
    }


    public function create(array $data)
    {
        return Gallery::create($data);
    }


    public function update(int $id, array $data)
    {
        $gallery = $this->findById($id);

        $gallery->update($data);

        return $gallery;
    }


    public function delete(int $id)
    {
        $gallery = $this->findById($id);

        return $gallery->delete();
    }


    public function getActive()
    {
        return Gallery::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }


    public function countTotal()
    {
        return Gallery::count();
    }


    public function countActive()
    {
        return Gallery::where('is_active', true)->count();
    }


    public function countInactive()
    {
        return Gallery::where('is_active', false)->count();
    }


    /**
     * Membuka satu posisi untuk gallery baru.
     *
     * Contoh:
     *
     * 1. Ruang Kelas
     * 2. Pelatihan
     * 3. Fasilitas
     *
     * insertAtPosition(2)
     *
     * menjadi:
     *
     * 1. Ruang Kelas
     * 2. [posisi kosong]
     * 3. Pelatihan
     * 4. Fasilitas
     */
    public function insertAtPosition(int $position)
    {
        Gallery::where(
            'sort_order',
            '>=',
            $position
        )->increment('sort_order');
    }


    /**
     * Memindahkan gallery dari posisi lama
     * ke posisi baru.
     */
    public function movePosition(
        int $id,
        int $oldPosition,
        int $newPosition
    ) {
        if ($oldPosition === $newPosition) {
            return;
        }


        /*
         * Gallery bergerak ke bawah.
         *
         * Contoh:
         *
         * 1. A
         * 2. B
         * 3. C
         * 4. D
         *
         * B: 2 -> 4
         *
         * hasil:
         *
         * 1. A
         * 2. C
         * 3. D
         * 4. B
         */
        if ($oldPosition < $newPosition) {

            Gallery::where('id', '!=', $id)
                ->whereBetween(
                    'sort_order',
                    [
                        $oldPosition + 1,
                        $newPosition
                    ]
                )
                ->decrement('sort_order');

            return;
        }


        /*
         * Gallery bergerak ke atas.
         *
         * Contoh:
         *
         * 1. A
         * 2. B
         * 3. C
         * 4. D
         *
         * D: 4 -> 2
         *
         * hasil:
         *
         * 1. A
         * 2. D
         * 3. B
         * 4. C
         */
        Gallery::where('id', '!=', $id)
            ->whereBetween(
                'sort_order',
                [
                    $newPosition,
                    $oldPosition - 1
                ]
            )
            ->increment('sort_order');
    }


    /**
     * Memastikan urutan selalu:
     *
     * 1, 2, 3, 4, 5, ...
     */
    public function normalizeOrder()
    {
        $galleries = Gallery::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        foreach ($galleries as $index => $gallery) {

            $position = $index + 1;

            if ($gallery->sort_order != $position) {

                $gallery->update([
                    'sort_order' => $position,
                ]);
            }
        }
    }

    public function shiftAfterDelete(int $position)
    {
        Gallery::where(
            'sort_order',
            '>',
            $position
        )->decrement('sort_order');
    }
}