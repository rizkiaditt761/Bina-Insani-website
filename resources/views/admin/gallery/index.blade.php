@extends('layouts.admin')

@section('title', 'Gallery')


@section('content')

<div>


    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Gallery
        </h1>

        <p class="text-gray-500">
            Kelola dokumentasi kegiatan LPK Bina Insani.
        </p>

    </div>




    {{-- Tambah Gallery --}}
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">


        <h2 class="text-lg font-semibold mb-4">
            Tambah Gallery
        </h2>


        <form method="POST"
            action="{{ route('galleries.store') }}">

            @csrf


            <div class="grid md:grid-cols-2 gap-4">


                <input
                    type="text"
                    name="title"
                    placeholder="Judul Gallery"
                    class="rounded-lg border-gray-300"
                    required
                >


                <input
                    type="text"
                    name="category"
                    placeholder="Kategori"
                    class="rounded-lg border-gray-300"
                >


                <input
                    type="text"
                    name="image"
                    placeholder="Path gambar"
                    class="rounded-lg border-gray-300"
                >


                <input
                    type="number"
                    name="sort_order"
                    placeholder="Urutan"
                    class="rounded-lg border-gray-300"
                >


            </div>



            <textarea
                name="description"
                rows="3"
                placeholder="Deskripsi"
                class="mt-4 w-full rounded-lg border-gray-300"
            ></textarea>



            <div class="mt-4">

                <label class="inline-flex items-center">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        checked
                        class="rounded border-gray-300"
                    >

                    <span class="ml-2">
                        Aktif
                    </span>

                </label>

            </div>



            <button
                class="mt-5 px-5 py-2 bg-blue-600 text-white rounded-lg">

                Simpan

            </button>


        </form>


    </div>






    {{-- Data Gallery --}}

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">


        <table class="w-full text-sm">


            <thead class="bg-gray-50">

                <tr>

                    <th class="px-6 py-3 text-left">
                        Judul
                    </th>


                    <th class="px-6 py-3 text-left">
                        Kategori
                    </th>


                    <th class="px-6 py-3 text-left">
                        Status
                    </th>


                    <th class="px-6 py-3 text-left">
                        Aksi
                    </th>

                </tr>

            </thead>



            <tbody>


            @forelse($galleries as $gallery)

                <tr class="border-t">


                    <td class="px-6 py-4">

                        {{ $gallery->title }}

                    </td>



                    <td class="px-6 py-4">

                        {{ $gallery->category ?? '-' }}

                    </td>



                    <td class="px-6 py-4">

                        @if($gallery->is_active)

                            <span class="text-green-600">
                                Aktif
                            </span>

                        @else

                            <span class="text-red-600">
                                Tidak Aktif
                            </span>

                        @endif

                    </td>




                    <td class="px-6 py-4 flex gap-2">


                        <a
                            href="{{ route('galleries.edit', $gallery->id) }}"
                            class="px-3 py-1 bg-yellow-500 text-white rounded">

                            Edit

                        </a>




                        <form method="POST"
                            action="{{ route('galleries.destroy', $gallery->id) }}">

                            @csrf
                            @method('DELETE')


                            <button
                                class="px-3 py-1 bg-red-600 text-white rounded">

                                Hapus

                            </button>


                        </form>


                    </td>


                </tr>


            @empty

                <tr>

                    <td colspan="4"
                        class="px-6 py-6 text-center text-gray-500">

                        Belum ada gallery

                    </td>

                </tr>

            @endforelse


            </tbody>


        </table>


    </div>



</div>


@endsection