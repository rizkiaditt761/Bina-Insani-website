<?php

namespace App\Services\Gallery;

use App\Repositories\Gallery\GalleryRepository;

class GalleryServiceImplement implements GalleryService
{
    protected GalleryRepository $galleryRepository;


    public function __construct(
        GalleryRepository $galleryRepository
    ) {
        $this->galleryRepository = $galleryRepository;
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
        return $this->galleryRepository->create($data);
    }


    public function update(int $id, array $data)
    {
        return $this->galleryRepository->update($id, $data);
    }


    public function delete(int $id)
    {
        return $this->galleryRepository->delete($id);
    }

    public function getActive()
    {
        return $this->galleryRepository->getActive();
    }
}