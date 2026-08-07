@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<div class="space-y-6">

    {{-- Hero Header --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">

        <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-white/10 blur-3xl"></div>

        <div class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <span
                    class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                    Gallery Management

                </span>

                <h1
                    class="mt-4 text-3xl font-black">

                    Galeri

                </h1>

                <p
                    class="mt-2 max-w-2xl text-sm text-blue-100">

                    Kelola dokumentasi kegiatan LPK Bina Insani yang ditampilkan pada website.

                </p>

            </div>

            <div>

                <a
                    href="{{ route('galleries.create') }}"
                    class="rounded-2xl bg-white px-6 py-3 text-sm font-bold text-blue-700 shadow transition hover:-translate-y-0.5 hover:bg-blue-50">

                    + Tambah Foto

                </a>

            </div>

        </div>

    </div>



    {{-- Summary --}}
    <div class="grid gap-5 md:grid-cols-3">

        <div
            class="rounded-2xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-6 shadow-sm">

            <p class="text-sm font-medium text-blue-600">

                Total Foto

            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-900">

                {{ $total }}

            </h2>

        </div>



        <div
            class="rounded-2xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white p-6 shadow-sm">

            <p class="text-sm font-medium text-emerald-600">

                Foto Aktif

            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-900">

                {{ $active }}

            </h2>

        </div>



        <div
            class="rounded-2xl border border-red-100 bg-gradient-to-br from-red-50 to-white p-6 shadow-sm">

            <p class="text-sm font-medium text-red-600">

                Tidak Aktif

            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-900">

                {{ $inactive }}

            </h2>

        </div>

    </div>



    {{-- Search --}}
    <div
        class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

        <form
            method="GET"
            class="flex flex-col gap-3 lg:flex-row">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari judul galeri..."
                class="flex-1 rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500">

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700">

                    Cari

                </button>

                @if(request('search'))

                    <a
                        href="{{ route('galleries.index') }}"
                        class="rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-100">

                        Reset

                    </a>

                @endif

            </div>

        </form>

    </div>



    {{-- Table --}}
    <div
        class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <table class="min-w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">

                        Foto

                    </th>

                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">

                        Judul

                    </th>

                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">

                        Kategori

                    </th>

                    <th class="px-5 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">

                        Urutan

                    </th>

                    <th class="px-5 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">

                        Status

                    </th>

                    <th class="px-5 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">

                        Aksi

                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-200">

                @forelse($galleries as $gallery)
                <tr class="transition hover:bg-slate-50">

    {{-- Foto --}}
    <td class="px-5 py-4">

        @if($gallery->image)

            <img
                src="{{ Storage::url($gallery->image) }}"
                alt="{{ $gallery->title }}"
                class="h-16 w-16 rounded-xl border border-slate-200 object-cover">

        @else

            <div
                class="flex h-16 w-16 items-center justify-center rounded-xl border border-dashed border-slate-300 bg-slate-100 text-[10px] font-semibold text-slate-400">

                NO IMAGE

            </div>

        @endif

    </td>



    {{-- Judul --}}
    <td class="px-5 py-4">

        <div>

            <h3 class="text-sm font-semibold text-slate-800">

                {{ $gallery->title }}

            </h3>

            @if($gallery->description)

                <p class="mt-1 line-clamp-2 text-xs text-slate-500">

                    {{ $gallery->description }}

                </p>

            @endif

        </div>

    </td>



    {{-- Kategori --}}
    <td class="px-5 py-4 text-sm text-slate-600">

        {{ $gallery->category ?: '-' }}

    </td>



    {{-- Urutan --}}
    <td class="px-5 py-4 text-center text-sm font-semibold text-slate-700">

        {{ $gallery->sort_order ?? 0 }}

    </td>



    {{-- Status --}}
    <td class="px-5 py-4 text-center">

        @if($gallery->is_active)

            <span
                class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">

                Aktif

            </span>

        @else

            <span
                class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                Tidak Aktif

            </span>

        @endif

    </td>



    {{-- Aksi --}}
    <td class="px-5 py-4">

        <div class="flex items-center justify-center gap-2">

            <a
                href="{{ route('galleries.show', $gallery->id) }}"
                class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                Detail

            </a>

            <a
                href="{{ route('galleries.edit', $gallery->id) }}"
                class="rounded-xl bg-gradient-to-r from-yellow-500 to-yellow-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                Edit

            </a>

            <form
                action="{{ route('galleries.destroy', $gallery->id) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="rounded-xl bg-gradient-to-r from-red-500 to-red-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                    Hapus

                </button>

            </form>

        </div>

    </td>

</tr>
                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-16 text-center">

                            <div class="flex flex-col items-center">

                                <div
                                    class="flex h-20 w-20 items-center justify-center rounded-full bg-slate-100">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-10 w-10 text-slate-400"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2 1.586-1.586a2 2 0 012.828 0L20 14m-8-8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />

                                    </svg>

                                </div>

                                <h3
                                    class="mt-5 text-lg font-bold text-slate-800">

                                    Belum Ada Galeri

                                </h3>

                                <p
                                    class="mt-2 max-w-md text-sm text-slate-500">

                                    Belum ada dokumentasi kegiatan yang ditambahkan.
                                    Silakan tambahkan foto pertama untuk ditampilkan
                                    pada halaman website.

                                </p>

                                <a
                                    href="{{ route('galleries.create') }}"
                                    class="mt-6 rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">

                                    + Tambah Foto

                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Bottom Space --}}
    <div class="h-6"></div>

</div>

@endsection