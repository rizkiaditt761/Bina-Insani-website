@extends('layouts.app')

@section('title', 'Detail Gallery')

@section('content')

<div class="space-y-6 pb-8">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}
    <div
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">

        <div
            class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-white/10 blur-3xl">
        </div>

        <div
            class="absolute -bottom-12 left-1/3 h-40 w-40 rounded-full bg-blue-400/10 blur-3xl">
        </div>

        <div
            class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <span
                    class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                    Gallery Management

                </span>

                <h1 class="mt-4 text-3xl font-black tracking-tight">

                    Detail Gallery

                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-blue-100">

                    Informasi lengkap dokumentasi kegiatan LPK Bina Insani.

                </p>

            </div>


            <div class="flex items-center gap-2">

                <a
                    href="{{ route('galleries.edit', $gallery->id) }}"
                    class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-blue-700 shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-50 hover:shadow-xl">

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.862 4.487l1.65-1.65a2.121 2.121 0 013 3l-1.65 1.65m-3-1.35L5.25 15.75a2.25 2.25 0 00-.56 1.03L4 20l3.22-.69a2.25 2.25 0 001.03-.56L18.5 8.01m-2.638-3.523l3 3" />

                    </svg>

                    Edit Gallery

                </a>


                <a
                    href="{{ route('galleries.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-white/30 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-white/10">

                    Kembali

                </a>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}
    <div class="grid gap-6 lg:grid-cols-3">

        {{-- ===================================================== --}}
        {{-- IMAGE --}}
        {{-- ===================================================== --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm lg:col-span-1">

            <div
                class="border-b border-slate-200 px-6 py-5">

                <h2 class="text-lg font-bold text-slate-800">

                    Preview Foto

                </h2>

                <p class="mt-1 text-sm text-slate-500">

                    Foto dokumentasi gallery.

                </p>

            </div>


            <div class="p-5">

                <div
                    class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-100">

                    @if($gallery->image)

                        <img
                            src="{{ Storage::url($gallery->image) }}"
                            alt="{{ $gallery->title }}"
                            class="h-[320px] w-full object-cover">

                    @else

                        <div
                            class="flex h-[320px] items-center justify-center text-sm text-slate-400">

                            Tidak ada foto

                        </div>

                    @endif

                </div>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- INFORMATION --}}
        {{-- ===================================================== --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm lg:col-span-2">

            <div
                class="flex flex-col gap-2 border-b border-slate-200 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h2 class="text-lg font-bold text-slate-800">

                        Informasi Gallery

                    </h2>

                    <p class="mt-1 text-sm text-slate-500">

                        Detail informasi dokumentasi.

                    </p>

                </div>


                {{-- Urutan --}}
                <div class="flex items-center gap-2 text-xs text-slate-500">

                    Urutan

                    <span
                        class="inline-flex min-w-8 items-center justify-center rounded-lg bg-slate-100 px-2.5 py-1 font-bold text-slate-700">

                        {{ $gallery->sort_order ?? 0 }}

                    </span>

                </div>

            </div>


            <div class="space-y-6 p-6">

                {{-- ================================================= --}}
                {{-- TITLE & CATEGORY --}}
                {{-- ================================================= --}}
                <div class="grid gap-5 sm:grid-cols-2">

                    {{-- Judul --}}
                    <div>

                        <p
                            class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                            Judul Gallery

                        </p>

                        <p
                            class="mt-2 text-base font-bold text-slate-800">

                            {{ $gallery->title }}

                        </p>

                    </div>


                    {{-- Kategori --}}
                    <div>

                        <p
                            class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                            Kategori

                        </p>

                        <div class="mt-2">

                            @if($gallery->category)

                                <span
                                    class="inline-flex rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700">

                                    {{ $gallery->category }}

                                </span>

                            @else

                                <span class="text-sm text-slate-400">

                                    -

                                </span>

                            @endif

                        </div>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- STATUS & ORDER --}}
                {{-- ================================================= --}}
                <div
                    class="grid gap-5 sm:grid-cols-2">

                    {{-- Status --}}
                    <div>

                        <p
                            class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                            Status

                        </p>

                        <div class="mt-2">

                            @if($gallery->is_active)

                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1 text-[11px] font-semibold text-emerald-700">

                                    <span
                                        class="h-1.5 w-1.5 rounded-full bg-emerald-500">
                                    </span>

                                    Aktif

                                </span>

                            @else

                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-slate-200 px-3 py-1 text-[11px] font-semibold text-slate-600">

                                    <span
                                        class="h-1.5 w-1.5 rounded-full bg-slate-400">
                                    </span>

                                    Nonaktif

                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- Urutan --}}
                    <div>

                        <p
                            class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                            Urutan Tampilan

                        </p>

                        <div class="mt-2">

                            <span
                                class="inline-flex min-w-9 items-center justify-center rounded-xl bg-slate-100 px-3 py-1.5 text-sm font-bold text-slate-700">

                                {{ $gallery->sort_order ?? 0 }}

                            </span>

                        </div>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- DESCRIPTION --}}
                {{-- ================================================= --}}
                <div>

                    <p
                        class="mb-2 text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                        Deskripsi

                    </p>

                    <div
                        class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-sm leading-6 text-slate-700">

                        {{ $gallery->description ?: 'Tidak ada deskripsi.' }}

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- TIMESTAMP --}}
                {{-- ================================================= --}}
                <div
                    class="grid gap-5 border-t border-slate-100 pt-5 sm:grid-cols-2">

                    <div>

                        <p
                            class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                            Dibuat Pada

                        </p>

                        <p class="mt-2 text-sm text-slate-700">

                            {{ $gallery->created_at?->format('d F Y, H:i') ?? '-' }}

                        </p>

                    </div>


                    <div>

                        <p
                            class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">

                            Terakhir Diperbarui

                        </p>

                        <p class="mt-2 text-sm text-slate-700">

                            {{ $gallery->updated_at?->format('d F Y, H:i') ?? '-' }}

                        </p>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- ACTION --}}
                {{-- ================================================= --}}
                <div
                    class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:justify-start">

                    <a
                        href="{{ route('galleries.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-400 hover:bg-slate-50">

                        Kembali

                    </a>


                    <a
                        href="{{ route('galleries.edit', $gallery->id) }}"
                        class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                        Edit Gallery

                    </a>


                    <form
                        method="POST"
                        action="{{ route('galleries.destroy', $gallery->id) }}"
                        onsubmit="return confirm('Yakin ingin menghapus gallery ini?')">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-red-500 to-red-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                            Hapus Gallery

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection