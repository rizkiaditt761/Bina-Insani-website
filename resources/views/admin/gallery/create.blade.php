@extends('layouts.app')

@section('title', 'Tambah Galeri')

@section('content')

<div class="space-y-6 pb-8">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">

        <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-white/10 blur-3xl"></div>

        <div class="absolute -bottom-12 left-1/3 h-40 w-40 rounded-full bg-blue-400/10 blur-3xl"></div>

        <div class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <span
                    class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                    Gallery Management

                </span>

                <h1 class="mt-4 text-3xl font-black tracking-tight">

                    Tambah Galeri

                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-blue-100">

                    Tambahkan dokumentasi kegiatan LPK Bina Insani
                    yang akan ditampilkan pada website.

                </p>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- FORM --}}
    {{-- ========================================================= --}}
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-200 px-6 py-5">

            <h2 class="text-lg font-bold text-slate-800">
                Informasi Galeri
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Isi informasi dan upload foto dokumentasi.
            </p>

        </div>


        <div class="p-6">

            <form
                action="{{ route('galleries.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @include('admin.gallery.form')

            </form>

        </div>

    </div>

</div>

@endsection