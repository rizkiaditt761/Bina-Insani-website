<?php

namespace App\Services\Gallery;

use App\Repositories\Gallery\GalleryRepository;
use App\Services\Activity\ActivityService;
use Illuminate\Support\Facades\Storage;

class GalleryServiceImplement implements GalleryService
{
    protected GalleryRepository $galleryRepository;

    protected ActivityService $activityService;


    public function __construct(
        GalleryRepository $galleryRepository,
        ActivityService $activityService
    ) {
        $this->galleryRepository = $galleryRepository;
        $this->activityService = $activityService;
    }


    public function getAll(
        ?string $search = null,
        ?string $status = null
    ) {
        return $this->galleryRepository->getAll(
            $search,
            $status
        );
    }


    public function findById(int $id)
    {
        return $this->galleryRepository->findById($id);
    }


    /**
     * CREATE
     *
     * Foto baru akan dimasukkan ke posisi
     * yang dipilih user.
     */
    public function create(array $data)
    {
        $total = $this->galleryRepository->countTotal();


        /*
         * Posisi minimum = 1
         *
         * Posisi maksimum = total + 1
         *
         * Misalnya sudah ada 3 foto:
         *
         * 1, 2, 3
         *
         * Foto baru boleh:
         *
         * 1, 2, 3, atau 4
         */
        $position = (int) ($data['sort_order'] ?? 1);

        $position = max(
            1,
            min(
                $position,
                $total + 1
            )
        );


        /*
         * Geser semua gallery
         * yang berada di posisi tersebut
         * ke bawah.
         */
        $this->galleryRepository->insertAtPosition(
            $position
        );


        /*
         * Simpan posisi gallery baru.
         */
        $data['sort_order'] = $position;


        $gallery = $this->galleryRepository->create(
            $data
        );


        /*
         * Rapikan kembali urutan.
         */
        $this->galleryRepository->normalizeOrder();


        /*
         * Activity Log
         */
        $this->activityService->log(
            'gallery',
            'create',
            'Menambahkan gallery: ' . $gallery->title,
            $gallery,
            [
                'changes' => [
                    [
                        'field' => 'title',
                        'old' => null,
                        'new' => $gallery->title,
                    ],
                    [
                        'field' => 'category',
                        'old' => null,
                        'new' => $gallery->category,
                    ],
                    [
                        'field' => 'description',
                        'old' => null,
                        'new' => $gallery->description,
                    ],
                    [
                        'field' => 'image',
                        'old' => null,
                        'new' => $gallery->image,
                    ],
                    [
                        'field' => 'sort_order',
                        'old' => null,
                        'new' => $gallery->sort_order,
                    ],
                    [
                        'field' => 'is_active',
                        'old' => null,
                        'new' => $gallery->is_active,
                    ],
                ],
            ]
        );


        return $gallery;
    }


    /**
     * UPDATE
     */
    public function update(
        int $id,
        array $data
    ) {
        $gallery = $this->galleryRepository->findById(
            $id
        );


        $oldPosition = (int) $gallery->sort_order;

        $newPosition = array_key_exists(
            'sort_order',
            $data
        )
            ? (int) $data['sort_order']
            : $oldPosition;


        /*
         * Batasi posisi agar tidak keluar
         * dari jumlah gallery.
         */
        $total = $this->galleryRepository->countTotal();

        $newPosition = max(
            1,
            min(
                $newPosition,
                $total
            )
        );


        /*
         * Simpan perubahan untuk Activity Log.
         */
        $changes = [];


        $fields = [
            'title',
            'category',
            'description',
            'is_active',
        ];


        foreach ($fields as $field) {

            if (
                array_key_exists($field, $data) &&
                $gallery->$field != $data[$field]
            ) {

                $changes[] = [
                    'field' => $field,
                    'old' => $gallery->$field,
                    'new' => $data[$field],
                ];
            }
        }


        /*
         * Track perubahan posisi.
         */
        if ($oldPosition !== $newPosition) {

            $changes[] = [
                'field' => 'sort_order',
                'old' => $oldPosition,
                'new' => $newPosition,
            ];
        }


        /*
         * Handle image replacement.
         */
        if (
            isset($data['image']) &&
            $gallery->image !== $data['image']
        ) {

            $changes[] = [
                'field' => 'image',
                'old' => $gallery->image,
                'new' => $data['image'],
            ];


            /*
             * Hapus foto lama setelah
             * foto baru berhasil disimpan.
             */
            if (
                $gallery->image &&
                Storage::disk('public')->exists(
                    $gallery->image
                )
            ) {

                Storage::disk('public')->delete(
                    $gallery->image
                );
            }
        }


        /*
         * Reorder sebelum update gallery.
         *
         * Gallery masih berada di posisi lama.
         */
        if ($oldPosition !== $newPosition) {

            $this->galleryRepository->movePosition(
                $id,
                $oldPosition,
                $newPosition
            );
        }


        /*
         * Tetapkan posisi baru.
         */
        $data['sort_order'] = $newPosition;


        /*
         * Update gallery.
         */
        $gallery = $this->galleryRepository->update(
            $id,
            $data
        );


        /*
         * Pastikan urutan kembali rapi.
         */
        $this->galleryRepository->normalizeOrder();


        /*
         * Activity Log
         */
        $this->activityService->log(
            'gallery',
            'update',
            'Mengubah gallery: ' . $gallery->title,
            $gallery,
            [
                'changes' => $changes,
            ]
        );


        return $gallery;
    }


    /**
     * DELETE
     */
    public function delete(int $id)
    {
        $gallery = $this->galleryRepository->findById($id);

        $position = (int) $gallery->sort_order;


        /*
        * Hapus file gambar dari storage.
        */
        if (
            $gallery->image &&
            Storage::disk('public')->exists($gallery->image)
        ) {

            Storage::disk('public')->delete(
                $gallery->image
            );
        }


        /*
        * Activity Log sebelum data dihapus.
        */
        $this->activityService->log(
            'gallery',
            'delete',
            'Menghapus gallery: ' . $gallery->title,
            $gallery
        );


        /*
        * Hapus gallery dari database.
        */
        $result = $this->galleryRepository->delete($id);


        /*
        * Naikkan semua gallery
        * yang berada setelah posisi yang dihapus.
        *
        * Contoh:
        *
        * 1. A
        * 2. B <- dihapus
        * 3. C
        * 4. D
        *
        * menjadi:
        *
        * 1. A
        * 2. C
        * 3. D
        */
        $this->galleryRepository->shiftAfterDelete(
            $position
        );


        /*
        * Pastikan urutan tetap rapat.
        */
        $this->galleryRepository->normalizeOrder();


        return $result;
    }


    public function getActive()
    {
        return $this->galleryRepository->getActive();
    }


    public function countTotal()
    {
        return $this->galleryRepository->countTotal();
    }


    public function countActive()
    {
        return $this->galleryRepository->countActive();
    }


    public function countInactive()
    {
        return $this->galleryRepository->countInactive();
    }
}