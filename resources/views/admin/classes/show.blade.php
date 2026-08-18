@extends('layouts.app')

@section('title', 'Detail Program')

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

                    Detail Program

                </h1>

                <p
                    class="mt-2 max-w-2xl text-sm leading-6 text-blue-100">

                    Informasi lengkap mengenai program pelatihan LPK Bina Insani.

                </p>

            </div>


            <div class="flex flex-wrap gap-2">

                <a
                    href="{{ route('classes.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-white/20 bg-white/10 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-white/20">

                    Kembali

                </a>

                <a
                    href="{{ route('classes.edit', $class->id) }}"
                    class="inline-flex items-center justify-center rounded-xl bg-white px-5 py-2.5 text-sm font-bold text-blue-700 shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-50 hover:shadow-md">

                    Edit Program

                </a>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- MAIN INFORMATION --}}
    {{-- ========================================================= --}}
    <div class="grid gap-5 lg:grid-cols-3">

        {{-- Informasi Program --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">

            <div
                class="mb-6 border-b border-slate-100 pb-5">

                <h2 class="text-base font-bold text-slate-800">

                    Informasi Program

                </h2>

                <p class="mt-1 text-xs text-slate-500">

                    Informasi utama mengenai program pelatihan.

                </p>

            </div>


            <div class="grid gap-6 sm:grid-cols-2">

                {{-- Nama Program --}}
                <div>

                    <p class="text-xs font-medium text-slate-500">
                        Nama Program
                    </p>

                    <p
                        class="mt-1.5 text-sm font-semibold leading-6 text-slate-800">

                        {{ $class->name }}

                    </p>

                </div>


                {{-- Biaya --}}
                <div>

                    <p class="text-xs font-medium text-slate-500">
                        Biaya Pendaftaran
                    </p>

                    <p
                        class="mt-1.5 text-lg font-bold text-blue-700">

                        Rp {{ number_format($class->registration_fee, 0, ',', '.') }}

                    </p>

                </div>


                {{-- Durasi --}}
                <div>

                    <p class="text-xs font-medium text-slate-500">
                        Durasi
                    </p>

                    <p
                        class="mt-1.5 text-sm font-semibold text-slate-800">

                        {{ $class->duration ?: '-' }}

                    </p>

                </div>


                {{-- Jadwal --}}
                <div>

                    <p class="text-xs font-medium text-slate-500">
                        Jadwal Pertemuan
                    </p>

                    <p
                        class="mt-1.5 text-sm font-semibold leading-6 text-slate-800">

                        {{ $class->meeting_schedule ?: '-' }}

                    </p>

                </div>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- STATUS & STATISTIK --}}
        {{-- ===================================================== --}}
        <div class="space-y-5">

            {{-- Status --}}
            <div
                class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                <h2
                    class="mb-5 text-base font-bold text-slate-800">

                    Status Program

                </h2>


                @if($class->is_active)

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-3 py-1.5 text-xs font-semibold text-emerald-700">

                        <span
                            class="h-1.5 w-1.5 rounded-full bg-emerald-500">
                        </span>

                        Aktif

                    </span>

                @else

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600">

                        <span
                            class="h-1.5 w-1.5 rounded-full bg-slate-400">
                        </span>

                        Nonaktif

                    </span>

                @endif

            </div>



            {{-- Statistik --}}
            <div
                class="rounded-3xl border border-blue-200 bg-blue-50 p-6 shadow-sm">

                <div
                    class="flex items-start justify-between">

                    <div>

                        <p class="text-xs font-medium text-blue-700">
                            Total Pendaftar
                        </p>

                        <p
                            class="mt-2 text-3xl font-black text-blue-700">

                            {{ $class->registrations_count }}

                        </p>

                        <p class="mt-1 text-xs text-blue-600">
                            Peserta terdaftar
                        </p>

                    </div>


                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/80 text-blue-600">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M17 20h5v-2a4 4 0 00-4-4h-1m-4 6H6a4 4 0 01-4-4v-2a4 4 0 014-4h7a4 4 0 014 4v2a4 4 0 01-4 4zM12 10a4 4 0 100-8 4 4 0 000 8z" />

                        </svg>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- DESCRIPTION --}}
    {{-- ========================================================= --}}
    <div
        class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

        <div
            class="mb-5 border-b border-slate-100 pb-5">

            <h2
                class="text-base font-bold text-slate-800">

                Deskripsi Program

            </h2>

            <p
                class="mt-1 text-xs text-slate-500">

                Penjelasan mengenai program pelatihan.

            </p>

        </div>


        @if($class->description)

            <div
                class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                <p
                    class="whitespace-pre-line text-sm leading-7 text-slate-700">

                    {{ $class->description }}

                </p>

            </div>

        @else

            <div
                class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 py-12 text-center">

                <p class="text-sm text-slate-500">

                    Belum ada deskripsi program.

                </p>

            </div>

        @endif

    </div>



    {{-- ========================================================= --}}
    {{-- FOOTER INFORMATION --}}
    {{-- ========================================================= --}}
    <div
        class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

        <div
            class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

            <div class="grid gap-4 sm:grid-cols-2">

                {{-- Dibuat --}}
                <div>

                    <p class="text-xs font-medium text-slate-500">
                        Dibuat Pada
                    </p>

                    <p
                        class="mt-1 text-sm font-semibold text-slate-800">

                        {{ $class->created_at?->format('d F Y, H:i') }}

                    </p>

                </div>


                {{-- Diperbarui --}}
                <div>

                    <p class="text-xs font-medium text-slate-500">
                        Terakhir Diperbarui
                    </p>

                    <p
                        class="mt-1 text-sm font-semibold text-slate-800">

                        {{ $class->updated_at?->format('d F Y, H:i') }}

                    </p>

                </div>

            </div>


            <form
                action="{{ route('classes.destroy', $class->id) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus program ini?')">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-red-500 to-red-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                    Hapus Program

                </button>

            </form>

        </div>

    </div>

</div>

@endsection