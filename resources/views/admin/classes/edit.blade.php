@extends('layouts.app')

@section('title', 'Edit Program')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-2xl font-bold text-slate-800">

                Edit Program

            </h1>

            <p class="mt-1 text-sm text-slate-500">

                Perbarui informasi program pelatihan LPK Bina Insani.

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
        action="{{ route('classes.update', $class->id) }}"
        method="POST"
        class="space-y-6">

        @csrf
        @method('PUT')

        @include('admin.classes.form')

    </form>

</div>

@endsection