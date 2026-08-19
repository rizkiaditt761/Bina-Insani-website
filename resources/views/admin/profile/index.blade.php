@extends('layouts.app')

@section('title', 'Profil Admin')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div>
        <div class="flex items-center gap-3">

            <div
                class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-100 text-blue-600">

                <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />

                </svg>

            </div>

            <div>

                <h1 class="text-2xl font-black tracking-tight text-slate-900">
                    Profil Admin
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola informasi akun dan keamanan profil administrator.
                </p>

            </div>

        </div>
    </div>


    {{-- =========================================================
        SUCCESS MESSAGE
    ========================================================== --}}
    @if (session('success'))

        <div
            class="flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 shadow-sm">

            <div
                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

                <svg
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7" />

                </svg>

            </div>

            <div>

                <p class="text-sm font-bold text-emerald-800">
                    Berhasil
                </p>

                <p class="mt-0.5 text-sm text-emerald-700">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    {{-- =========================================================
        VALIDATION ERRORS
    ========================================================== --}}
    @if ($errors->any())

        <div
            class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 shadow-sm">

            <div class="flex items-start gap-3">

                <div
                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v3m0 4h.01M10.29 3.86l-7.82 13.5A2 2 0 004.2 20.36h15.6a2 2 0 001.73-3L13.71 3.86a2 2 0 00-3.42 0z" />

                    </svg>

                </div>

                <div class="min-w-0">

                    <p class="text-sm font-bold text-red-800">
                        Ada data yang perlu diperbaiki.
                    </p>

                    <ul
                        class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-600">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- =========================================================
        PROFILE OVERVIEW + PROFILE FORM
    ========================================================== --}}
    <div class="grid gap-6 lg:grid-cols-3">


        {{-- =====================================================
            PROFILE OVERVIEW
        ====================================================== --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            {{-- Profile Header --}}
            <div
                class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 px-6 py-8 text-white">

                <div
                    class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-blue-400/20 blur-2xl">
                </div>

                <div
                    class="absolute -bottom-12 -left-10 h-32 w-32 rounded-full bg-indigo-400/10 blur-2xl">
                </div>


                <div class="relative flex flex-col items-center text-center">

                    {{-- Avatar --}}
                    <div
                        class="relative h-28 w-28">

                        @if ($user->profile_photo)

                            <img
                                src="{{ asset('storage/' . $user->profile_photo) }}"
                                alt="Foto Profil {{ $user->name }}"
                                class="h-28 w-28 rounded-full object-cover shadow-xl ring-4 ring-white/20">

                        @else

                            <div
                                class="flex h-28 w-28 items-center justify-center rounded-full bg-white/10 text-4xl font-black text-white shadow-xl ring-4 ring-white/20 backdrop-blur">

                                {{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}

                            </div>

                        @endif

                    </div>


                    {{-- Name --}}
                    <h2
                        class="mt-5 text-xl font-black">

                        {{ $user->name }}

                    </h2>


                    {{-- Email --}}
                    <p
                        class="mt-1 break-all text-sm text-blue-100">

                        {{ $user->email }}

                    </p>


                    {{-- Role --}}
                    <span
                        class="mt-4 inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1.5 text-xs font-bold text-blue-100 ring-1 ring-white/10">

                        <span
                            class="h-1.5 w-1.5 rounded-full bg-emerald-400">
                        </span>

                        Administrator

                    </span>

                </div>

            </div>


            {{-- Account Information --}}
            <div class="p-6">

                <div class="flex items-center gap-2">

                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100 text-slate-600">

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />

                        </svg>

                    </div>

                    <div>

                        <h3 class="text-sm font-bold text-slate-800">
                            Informasi Akun
                        </h3>

                        <p class="text-xs text-slate-400">
                            Detail akun administrator
                        </p>

                    </div>

                </div>


                <div
                    class="mt-6 divide-y divide-slate-100">


                    {{-- Joined --}}
                    <div class="py-4 first:pt-0">

                        <p class="text-xs font-medium text-slate-400">
                            Bergabung
                        </p>

                        <p
                            class="mt-1 text-sm font-semibold text-slate-700">

                            {{ $user->created_at?->format('d F Y') ?? '-' }}

                        </p>

                    </div>


                    {{-- Updated --}}
                    <div class="py-4 last:pb-0">

                        <p class="text-xs font-medium text-slate-400">
                            Terakhir diperbarui
                        </p>

                        <p
                            class="mt-1 text-sm font-semibold text-slate-700">

                            {{ $user->updated_at?->format('d F Y H:i') ?? '-' }}

                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            PROFILE FORM
        ====================================================== --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm lg:col-span-2">

            {{-- Form Header --}}
            <div
                class="border-b border-slate-100 px-6 py-5">

                <div class="flex items-start gap-3">

                    <div
                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />

                        </svg>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-900">
                            Informasi Profil
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Perbarui nama, email, dan foto profil administrator.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('admin.profile.update') }}"
                enctype="multipart/form-data"
                class="p-6">

                @csrf
                @method('PUT')

                {{-- Form Type --}}
                <input
                    type="hidden"
                    name="form_type"
                    value="profile">


                {{-- =================================================
                    PROFILE PHOTO
                ================================================== --}}
                <div>

                    <label
                        for="profile_photo"
                        class="block text-sm font-semibold text-slate-700">

                        Foto Profil

                    </label>


                    <div
                        class="mt-3 rounded-2xl border border-slate-200 bg-slate-50 p-4">

                        <div
                            class="flex flex-col gap-4 sm:flex-row sm:items-center">


                            {{-- Preview --}}
                            <div class="shrink-0">

                                @if ($user->profile_photo)

                                    <img
                                        id="profilePreview"
                                        src="{{ asset('storage/' . $user->profile_photo) }}"
                                        alt="Preview Foto Profil"
                                        class="h-24 w-24 rounded-2xl object-cover shadow-sm ring-2 ring-white">

                                @else

                                    <div
                                        id="profileFallback"
                                        class="flex h-24 w-24 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 text-3xl font-black text-white shadow-sm">

                                        {{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}

                                    </div>

                                    <img
                                        id="profilePreview"
                                        src=""
                                        alt="Preview Foto Profil"
                                        class="hidden h-24 w-24 rounded-2xl object-cover shadow-sm ring-2 ring-white">

                                @endif

                            </div>


                            {{-- Upload --}}
                            <div class="min-w-0 flex-1">

                                <input
                                    id="profile_photo"
                                    type="file"
                                    name="profile_photo"
                                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                    class="block w-full cursor-pointer rounded-xl border border-slate-300 bg-white text-sm text-slate-600 transition
                                        file:mr-4
                                        file:border-0
                                        file:bg-blue-50
                                        file:px-4
                                        file:py-3
                                        file:text-sm
                                        file:font-semibold
                                        file:text-blue-700
                                        hover:file:bg-blue-100">

                                <div
                                    class="mt-2 flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">

                                    <p class="text-xs text-slate-400">
                                        JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                                    </p>

                                    <button
                                        id="removePhoto"
                                        type="button"
                                        class="hidden text-left text-xs font-semibold text-red-600 transition hover:text-red-700 sm:text-right">

                                        Hapus pilihan

                                    </button>

                                </div>

                                @error('profile_photo')

                                    <p class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </p>

                                @enderror

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    NAME
                ================================================== --}}
                <div class="mt-6">

                    <label
                        for="name"
                        class="block text-sm font-semibold text-slate-700">

                        Nama Lengkap

                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        required
                        autocomplete="name"
                        class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-50">

                    @error('name')

                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- =================================================
                    EMAIL
                ================================================== --}}
                <div class="mt-5">

                    <label
                        for="email"
                        class="block text-sm font-semibold text-slate-700">

                        Email

                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        required
                        autocomplete="email"
                        class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-50">

                    @error('email')

                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- =================================================
                    ACTION
                ================================================== --}}
                <div
                    class="mt-6 flex flex-col gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:items-center sm:justify-between">

                    <p class="text-xs text-slate-400">
                        Perubahan profil akan langsung diterapkan ke akun.
                    </p>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-blue-700 hover:shadow-md focus:outline-none focus:ring-4 focus:ring-blue-100">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 13l4 4L19 7" />

                        </svg>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- =========================================================
        SECURITY
    ========================================================== --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Header --}}
        <div
            class="border-b border-slate-100 px-6 py-5">

            <div class="flex items-start gap-3">

                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-7a2 2 0 00-2-2H6a2 2 0 00-2 2v7a2 2 0 002 2zm10-11V7a4 4 0 00-8 0v1h8z" />

                    </svg>

                </div>

                <div>

                    <h2 class="text-lg font-bold text-slate-900">
                        Keamanan Akun
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Ubah password administrator untuk menjaga keamanan akun.
                    </p>

                </div>

            </div>

        </div>


        {{-- Password Form --}}
        <form
            method="POST"
            action="{{ route('admin.profile.update') }}"
            class="p-6">

            @csrf
            @method('PUT')

            {{-- Form Type --}}
            <input
                type="hidden"
                name="form_type"
                value="password">


            {{-- =================================================
                CURRENT PASSWORD
            ================================================== --}}
            <div>

                <label
                    for="current_password"
                    class="block text-sm font-semibold text-slate-700">

                    Password Saat Ini

                </label>

                <input
                    id="current_password"
                    type="password"
                    name="current_password"
                    autocomplete="current-password"
                    class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-50">

                @error('current_password')

                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- =================================================
                NEW PASSWORD
            ================================================== --}}
            <div class="mt-5 grid gap-5 md:grid-cols-2">


                {{-- New Password --}}
                <div>

                    <label
                        for="password"
                        class="block text-sm font-semibold text-slate-700">

                        Password Baru

                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-50">

                    @error('password')

                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>

                    @enderror

                    <p class="mt-2 text-xs text-slate-400">
                        Minimal 8 karakter.
                    </p>

                </div>


                {{-- Confirmation --}}
                <div>

                    <label
                        for="password_confirmation"
                        class="block text-sm font-semibold text-slate-700">

                        Konfirmasi Password Baru

                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        autocomplete="new-password"
                        class="mt-2 block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-50">

                </div>

            </div>


            {{-- =================================================
                SECURITY INFO
            ================================================== --}}
            <div
                class="mt-6 flex items-start gap-3 rounded-2xl border border-blue-100 bg-blue-50 px-4 py-4">

                <div
                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z" />

                    </svg>

                </div>

                <p class="text-sm leading-6 text-blue-700">

                    Masukkan password saat ini sebelum membuat password baru.
                    Gunakan password yang kuat dan mudah kamu ingat.

                </p>

            </div>


            {{-- =================================================
                ACTION
            ================================================== --}}
            <div
                class="mt-6 flex justify-end border-t border-slate-100 pt-6">

                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-slate-800 hover:shadow-md focus:outline-none focus:ring-4 focus:ring-slate-200">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-7a2 2 0 00-2-2H6a2 2 0 00-2 2v7a2 2 0 002 2zm10-11V7a4 4 0 00-8 0v1h8z" />

                    </svg>

                    Ubah Password

                </button>

            </div>

        </form>

    </div>

</div>


{{-- =========================================================
    PHOTO PREVIEW SCRIPT
========================================================== --}}
@push('scripts')

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const input = document.getElementById('profile_photo');
        const preview = document.getElementById('profilePreview');
        const fallback = document.getElementById('profileFallback');
        const removeButton = document.getElementById('removePhoto');

        if (!input || !preview) {
            return;
        }


        let originalPreview = preview.getAttribute('src') || '';


        input.addEventListener('change', function (event) {

            const file = event.target.files[0];

            if (!file) {
                return;
            }


            const reader = new FileReader();


            reader.onload = function (e) {

                preview.src = e.target.result;

                preview.classList.remove('hidden');

                if (fallback) {
                    fallback.classList.add('hidden');
                }

                if (removeButton) {
                    removeButton.classList.remove('hidden');
                }

            };


            reader.readAsDataURL(file);

        });


        if (removeButton) {

            removeButton.addEventListener('click', function () {

                input.value = '';

                preview.src = originalPreview;

                if (originalPreview) {

                    preview.classList.remove('hidden');

                    if (fallback) {
                        fallback.classList.add('hidden');
                    }

                } else {

                    preview.classList.add('hidden');

                    if (fallback) {
                        fallback.classList.remove('hidden');
                    }

                }

                removeButton.classList.add('hidden');

            });

        }

    });

</script>

@endpush

@endsection