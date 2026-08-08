@extends('layouts.app')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-slate-900">
            Profil Admin
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Kelola informasi akun dan keamanan profil administrator.
        </p>
    </div>


    {{-- Success Message --}}
    @if (session('success'))
        <div
            class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700">

            <svg
                class="h-5 w-5 shrink-0"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M5 13l4 4L19 7" />

            </svg>

            <span>
                {{ session('success') }}
            </span>
        </div>
    @endif


    {{-- Validation Errors --}}
    @if ($errors->any())
        <div
            class="rounded-xl border border-red-200 bg-red-50 px-5 py-4">

            <div class="flex items-start gap-3">

                <svg
                    class="mt-0.5 h-5 w-5 shrink-0 text-red-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v3m0 4h.01M10.29 3.86l-7.82 13.5A2 2 0 004.2 20.36h15.6a2 2 0 001.73-3L13.71 3.86a2 2 0 00-3.42 0z" />

                </svg>

                <div>

                    <p class="font-semibold text-red-700">
                        Ada data yang perlu diperbaiki.
                    </p>

                    <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-600">

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


    {{-- Profile Card --}}
    <div class="grid gap-6 lg:grid-cols-3">

        {{-- Left Profile --}}
        <div
            class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex flex-col items-center text-center">

                
                {{-- Avatar --}}
                <div
                    class="relative h-24 w-24">

                    @if ($user->profile_photo)
                        <img
                            src="{{ asset('storage/' . $user->profile_photo) }}"
                            alt="Foto Profil {{ $user->name }}"
                            class="h-24 w-24 rounded-full object-cover shadow-lg ring-4 ring-white">
                    @else
                        <div
                            class="flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-3xl font-bold text-white shadow-lg">

                            {{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}

                        </div>
                    @endif

                </div>




                {{-- Name --}}
                <h2 class="mt-5 text-xl font-bold text-slate-900">
                    {{ $user->name }}
                </h2>


                {{-- Email --}}
                <p class="mt-1 text-sm text-slate-500">
                    {{ $user->email }}
                </p>


                {{-- Role --}}
                <span
                    class="mt-4 inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">

                    Administrator

                </span>

            </div>


            {{-- Account Information --}}
            <div class="mt-8 border-t border-slate-100 pt-6">

                <h3 class="text-sm font-bold text-slate-800">
                    Informasi Akun
                </h3>

                <div class="mt-4 space-y-4">

                    <div>
                        <p class="text-xs text-slate-400">
                            Bergabung
                        </p>

                        <p class="mt-1 text-sm font-medium text-slate-700">
                            {{ $user->created_at?->format('d F Y') ?? '-' }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs text-slate-400">
                            Terakhir diperbarui
                        </p>

                        <p class="mt-1 text-sm font-medium text-slate-700">
                            {{ $user->updated_at?->format('d F Y H:i') ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>

        </div>


        {{-- Right Form --}}
        <div
            class="lg:col-span-2 rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- Form Header --}}
            <div
                class="border-b border-slate-100 px-6 py-5">

                <h2 class="text-lg font-bold text-slate-900">
                    Informasi Profil
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Perbarui nama dan alamat email akun administrator.
                </p>

            </div>


            {{-- Form --}}
            <form
                method="POST"
                action="{{ route('admin.profile.update') }}"
                enctype="multipart/form-data"
                class="p-6">

                @csrf
                @method('PUT')


                
                {{-- Profile Photo --}}
                <div class="mb-6">

                    <label
                        for="profile_photo"
                        class="block text-sm font-semibold text-slate-700">

                        Foto Profil

                    </label>

                    <div class="mt-3 flex flex-col gap-4 sm:flex-row sm:items-center">

                        {{-- Preview --}}
                        <div class="shrink-0">

                            @if ($user->profile_photo)

                                <img
                                    src="{{ asset('storage/' . $user->profile_photo) }}"
                                    alt="Foto Profil"
                                    class="h-20 w-20 rounded-full object-cover ring-2 ring-slate-200">

                            @else

                                <div
                                    class="flex h-20 w-20 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-2xl font-bold text-white">

                                    {{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}

                                </div>

                            @endif

                        </div>

                        {{-- Upload --}}
                        <div class="flex-1">

                            <input
                                id="profile_photo"
                                type="file"
                                name="profile_photo"
                                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                class="block w-full cursor-pointer rounded-xl border border-slate-300 bg-white text-sm text-slate-600
                                    file:mr-4 file:border-0
                                    file:bg-blue-50 file:px-4 file:py-3
                                    file:text-sm file:font-semibold
                                    file:text-blue-700
                                    hover:file:bg-blue-100">

                            <p class="mt-2 text-xs text-slate-400">
                                JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                            </p>

                            @error('profile_photo')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- Name --}}
                <div>

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
                        class="mt-2 block w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Email --}}
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
                        class="mt-2 block w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Save --}}
                <div class="mt-6 flex justify-end">

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md">

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


    {{-- Password Section --}}
    <div
        class="rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div
            class="border-b border-slate-100 px-6 py-5">

            <div class="flex items-center gap-3">

                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

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
                        Ubah password administrator.
                    </p>

                </div>

            </div>

        </div>


        <form
            method="POST"
            action="{{ route('admin.profile.update') }}"
            class="p-6">

            @csrf
            @method('PUT')


            {{-- Current Password --}}
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
                    class="mt-2 block w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                @error('current_password')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


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
                        class="mt-2 block w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

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
                        class="mt-2 block w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                </div>

            </div>


            {{-- Info --}}
            <div
                class="mt-5 rounded-xl border border-blue-100 bg-blue-50 px-4 py-3">

                <p class="text-sm text-blue-700">
                    Kosongkan bagian password jika kamu tidak ingin
                    mengganti password.
                </p>

            </div>


            {{-- Save Password --}}
            <div class="mt-6 flex justify-end">

                <button
                    type="submit"
                    class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800 hover:shadow-md">

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

@endsection