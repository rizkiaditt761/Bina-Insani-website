<?php


namespace App\Services\Gallery;


use App\Repositories\Gallery\GalleryRepository;
use App\Services\Activity\ActivityService;


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



    public function getAll()
    {
        return $this->galleryRepository->getAll();
    }



    public function findById(int $id)
    {
        return $this->galleryRepository->findById($id);
    }



    public function create(array $data)
    {
        $gallery = $this->galleryRepository->create($data);

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
                ],
            ]
        );

        return $gallery;
    }



    public function update(int $id, array $data)
    {
        $oldGallery = $this->galleryRepository->findById($id);

        $changes = [];

        $fields = [
            'title',
            'category',
            'description',
            'sort_order',
            'is_active',
        ];

        foreach ($fields as $field) {

            if (
                array_key_exists($field, $data) &&
                $oldGallery->$field != $data[$field]
            ) {

                $changes[] = [
                    'field' => $field,
                    'old'   => $oldGallery->$field,
                    'new'   => $data[$field],
                ];

            }

        }

        if (
            isset($data['image']) &&
            $oldGallery->image != $data['image']
        ) {

            $changes[] = [
                'field' => 'image',
                'old'   => $oldGallery->image,
                'new'   => $data['image'],
            ];

        }

        $gallery = $this->galleryRepository->update($id, $data);

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



    public function delete(int $id)
    {
        $gallery = $this->galleryRepository->findById($id);


        $this->activityService->log(
            'gallery',
            'delete',
            'Menghapus gallery: ' . $gallery->title,
            $gallery
        );


        return $this->galleryRepository->delete($id);
    }



    public function getActive()
    {
        return $this->galleryRepository->getActive();
    }
}