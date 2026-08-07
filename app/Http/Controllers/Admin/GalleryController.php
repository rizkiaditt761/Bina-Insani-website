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

        $total = $galleries->count();

        $active = $galleries->where('is_active', true)->count();

        $inactive = $galleries->where('is_active', false)->count();


        return view(
            'admin.gallery.index',
            compact(
                'galleries',
                'total',
                'active',
                'inactive'
            )
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
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
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


        if ($request->hasFile('image')) {

            $data['image'] = $request
                ->file('image')
                ->store('gallery', 'public');

        }


        $this->galleryService->create($data);


        return redirect()
             ->route('galleries.index')
            ->with(
                'success',
                'Gallery berhasil ditambahkan'
        );
    }


    public function edit(int $id)
    {
        $gallery = $this->galleryService->findById($id);

        return view(
            'admin.gallery.edit',
            compact('gallery')
        );
    }

    public function show(int $id)
    {
        $gallery = $this->galleryService->findById($id);

        return view(
            'admin.gallery.show',
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
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
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

        if ($request->hasFile('image')) {

            $data['image'] = $request
                ->file('image')
                ->store('gallery', 'public');

        }

        $this->galleryService->update(
            $id,
            $data
        );


        return redirect()
            ->route('galleries.index')
            ->with(
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

    public function create()
    {
        return view(
            'admin.gallery.create'
        );
    }
}