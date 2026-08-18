@extends('layouts.app')

@section('title', 'Edit Program')

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

                    Classes Management

                </span>

                <h1
                    class="mt-4 text-3xl font-black tracking-tight">

                    Edit Program

                </h1>

                <p
                    class="mt-2 max-w-2xl text-sm leading-6 text-blue-100">

                    Perbarui informasi program pelatihan LPK Bina Insani
                    sesuai kebutuhan.

                </p>

            </div>


            <div>

                <a
                    href="{{ route('classes.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-white/20 bg-white/10 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-white/20">

                    Kembali

                </a>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- FORM --}}
    {{-- ========================================================= --}}
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