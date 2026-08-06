@extends('layouts.app')

@section('title', 'Detail Program')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-2xl font-bold text-slate-900">

                Detail Program

            </h1>

            <p class="mt-2 text-sm text-slate-500">

                Informasi lengkap program pelatihan LPK Bina Insani.

            </p>

        </div>

        <div class="flex items-center gap-3">

            <a
                href="{{ route('classes.index') }}"
                class="rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">

                Kembali

            </a>

            <a
                href="{{ route('classes.edit', $class->id) }}"
                class="rounded-xl bg-amber-500 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-600">

                Edit Program

            </a>

        </div>

    </div>


    <div class="grid gap-6 lg:grid-cols-3">

        {{-- Informasi Program --}}
        <div
            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">

            <h2 class="mb-6 text-lg font-semibold text-slate-900">

                Informasi Program

            </h2>

            <div class="grid gap-6 md:grid-cols-2">

                <div>

                    <p class="text-sm text-slate-500">

                        Nama Program

                    </p>

                    <p class="mt-1 font-semibold text-slate-900">

                        {{ $class->name }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-slate-500">

                        Biaya Pendaftaran

                    </p>

                    <p class="mt-1 text-xl font-bold text-blue-600">

                        Rp {{ number_format($class->registration_fee, 0, ',', '.') }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-slate-500">

                        Durasi

                    </p>

                    <p class="mt-1 font-semibold text-slate-900">

                        {{ $class->duration ?: '-' }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-slate-500">

                        Jadwal Pertemuan

                    </p>

                    <p class="mt-1 font-semibold text-slate-900">

                        {{ $class->meeting_schedule ?: '-' }}

                    </p>

                </div>

            </div>

        </div>

                {{-- Status & Statistik --}}
        <div
            class="space-y-6">

            {{-- Status --}}
            <div
                class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <h2 class="mb-5 text-lg font-semibold text-slate-900">

                    Status Program

                </h2>

                @if($class->is_active)

                    <span class="inline-flex rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-700">

                        Aktif

                    </span>

                @else

                    <span class="inline-flex rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-700">

                        Tidak Aktif

                    </span>

                @endif

            </div>



            {{-- Statistik --}}
            <div
                class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <h2 class="mb-5 text-lg font-semibold text-slate-900">

                    Statistik

                </h2>

                <div>

                    <p class="text-sm text-slate-500">

                        Total Pendaftar

                    </p>

                    <p class="mt-2 text-3xl font-bold text-blue-600">

                        {{ $class->registrations_count }}

                    </p>

                    <p class="mt-1 text-sm text-slate-500">

                        Peserta

                    </p>

                </div>

            </div>

        </div>

    </div>



    {{-- Deskripsi --}}
    <div
        class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

        <h2 class="mb-5 text-lg font-semibold text-slate-900">

            Deskripsi Program

        </h2>

        @if($class->description)

            <div class="prose prose-slate max-w-none">

                <p class="leading-7 text-slate-700 whitespace-pre-line">

                    {{ $class->description }}

                </p>

            </div>

        @else

            <div
                class="rounded-xl border border-dashed border-slate-300 py-12 text-center">

                <p class="text-slate-500">

                    Belum ada deskripsi program.

                </p>

            </div>

        @endif

    </div>

</div>

@endsection