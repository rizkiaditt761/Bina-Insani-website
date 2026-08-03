<?php

namespace App\Repositories\Gallery;

use App\Models\Gallery;

class GalleryRepositoryImplement implements GalleryRepository
{
    public function getAll()
    {
        return Gallery::orderBy('sort_order')->get();
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
}