<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Gallery\GalleryService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected GalleryService $galleryService;


    public function __construct(
        GalleryService $galleryService
    ) {
        $this->galleryService = $galleryService;
    }


    public function index()
    {
        $galleries = $this->galleryService->getAll();

        return view(
            'admin.gallery.index',
            compact('galleries')
        );
    }


    public function store(Request $request)
    {
        $data = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'category' => [
                'nullable',
                'string'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'image' => [
                'nullable',
                'string'
            ],

            'sort_order' => [
                'nullable',
                'integer'
            ],

            'is_active' => [
                'nullable',
                'boolean'
            ],
        ]);


        $data['is_active'] = $request->has('is_active');


        $this->galleryService->create($data);


        return back()->with(
            'success',
            'Gallery berhasil ditambahkan'
        );
    }


    public function edit(int $id)
    {
        $gallery = $this->galleryService->findById($id);

        return view(
            'admin.galleries.edit',
            compact('gallery')
        );
    }


    public function update(
        Request $request,
        int $id
    ) {

        $data = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'category' => [
                'nullable',
                'string'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'image' => [
                'nullable',
                'string'
            ],

            'sort_order' => [
                'nullable',
                'integer'
            ],

            'is_active' => [
                'nullable',
                'boolean'
            ],
        ]);


        $this->galleryService->update(
            $id,
            $data
        );


        return back()->with(
            'success',
            'Gallery berhasil diperbarui'
        );
    }


    public function destroy(int $id)
    {
        $this->galleryService->delete($id);


        return back()->with(
            'success',
            'Gallery berhasil dihapus'
        );
    }
}