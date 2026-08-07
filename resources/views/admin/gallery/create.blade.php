@extends('layouts.app')

@section('title', 'Tambah Gallery')


@section('content')

<div class="space-y-6">


    {{-- Header --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">


        <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-white/10 blur-3xl"></div>



        <div class="relative">


            <span
                class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                Gallery Management

            </span>



            <h1 class="mt-4 text-3xl font-black">

                Tambah Gallery

            </h1>



            <p class="mt-2 max-w-2xl text-sm text-blue-100">

                Tambahkan dokumentasi kegiatan yang akan tampil pada website LPK Bina Insani.

            </p>


        </div>


    </div>





    {{-- Form --}}
    <div class="rounded-3xl bg-white p-8 shadow-sm">


        <form
            action="{{ route('galleries.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            @include(
                'admin.gallery.form'
            )


        </form>


    </div>


</div>


@endsection