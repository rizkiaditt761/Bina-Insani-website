@extends('layouts.app')

@section('title', 'Tambah Program')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-2xl font-bold text-slate-800">

                Tambah Program

            </h1>

            <p class="mt-1 text-sm text-slate-500">

                Tambahkan program pelatihan baru yang akan ditampilkan pada website LPK Bina Insani.

            </p>

        </div>

        <a
            href="{{ route('classes.index') }}"
            class="rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">

            Kembali

        </a>

    </div>


    {{-- Form --}}
    <form
        action="{{ route('classes.store') }}"
        method="POST"
        class="space-y-6">

        @csrf

        @include('admin.classes.form')

    </form>

</div>

@endsection