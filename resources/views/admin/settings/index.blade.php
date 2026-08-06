@extends('layouts.app')

@section('title', 'Pengaturan Website')

@section('content')

<form
    action="{{ route('settings.update', $setting->id) }}"
    method="POST"
    enctype="multipart/form-data"
    class="space-y-8">

    @csrf
    @method('PUT')



    {{-- ========================================================= --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================================= --}}
    <section
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-indigo-600 to-sky-600 p-8 text-white shadow-xl">

        <div
            class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
        </div>

        <div
            class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

            <div>

                

                <h1
                    class="text-3xl font-bold">

                    Pengaturan Website

                </h1>

                <p
                    class="mt-3 max-w-2xl text-sm leading-7 text-blue-100">

                    Kelola seluruh informasi website LPK Bina Insani mulai dari
                    identitas website, landing page, kontak, pembayaran,
                    sosial media hingga footer dalam satu halaman.

                </p>

            </div>



            <div
                class="grid grid-cols-2 gap-4">

                <div
                    class="rounded-2xl border border-white/20 bg-white/10 p-5 backdrop-blur">

                    <p
                        class="text-xs uppercase tracking-widest text-blue-100">

                        Status

                    </p>

                    <h3
                        class="mt-2 text-lg font-semibold">

                        Aktif

                    </h3>

                </div>

                <div
                    class="rounded-2xl border border-white/20 bg-white/10 p-5 backdrop-blur">

                    <p
                        class="text-xs uppercase tracking-widest text-blue-100">

                        Module

                    </p>

                    <h3
                        class="mt-2 text-lg font-semibold">

                        Settings

                    </h3>

                </div>

            </div>

        </div>

    </section>





    {{-- ========================================================= --}}
    {{-- QUICK NAVIGATION --}}
    {{-- ========================================================= --}}
    <section
        class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

        <div
            class="mb-5 flex items-center gap-3">

            <div
                class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16"/>

                </svg>

            </div>

            <div>

                <h2
                    class="font-semibold text-slate-800">

                    Navigasi Pengaturan

                </h2>

                <p
                    class="text-sm text-slate-500">

                    Lompat ke bagian yang ingin Anda ubah.

                </p>

            </div>

        </div>



        <div
            class="grid gap-3 sm:grid-cols-2 xl:grid-cols-4">

            <a
                href="#identity"
                class="group rounded-2xl border border-slate-200 p-4 transition hover:border-blue-500 hover:bg-blue-50">

                <p
                    class="font-semibold text-slate-800 group-hover:text-blue-700">

                    🏢 Website Identity

                </p>

                <span
                    class="mt-1 block text-xs text-slate-500">

                    Nama Website, Logo & Favicon

                </span>

            </a>



            <a
                href="#hero"
                class="group rounded-2xl border border-slate-200 p-4 transition hover:border-blue-500 hover:bg-blue-50">

                <p
                    class="font-semibold text-slate-800 group-hover:text-blue-700">

                    🏠 Hero Section

                </p>

                <span
                    class="mt-1 block text-xs text-slate-500">

                    Banner Landing Page

                </span>

            </a>



            <a
                href="#about"
                class="group rounded-2xl border border-slate-200 p-4 transition hover:border-blue-500 hover:bg-blue-50">

                <p
                    class="font-semibold text-slate-800 group-hover:text-blue-700">

                    📖 Tentang Kami

                </p>

                <span
                    class="mt-1 block text-xs text-slate-500">

                    Informasi LPK

                </span>

            </a>



            <a
                href="#contact"
                class="group rounded-2xl border border-slate-200 p-4 transition hover:border-blue-500 hover:bg-blue-50">

                <p
                    class="font-semibold text-slate-800 group-hover:text-blue-700">

                    📞 Kontak

                </p>

                <span
                    class="mt-1 block text-xs text-slate-500">

                    Alamat & Media

                </span>

            </a>

        </div>

    </section>
        {{-- ========================================================= --}}
    {{-- WEBSITE IDENTITY --}}
    {{-- ========================================================= --}}
    <section
        id="identity"
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Header --}}
        <div
            class="border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white px-8 py-6">

            <div
                class="flex items-center gap-4">

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-100 text-blue-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 7l9-4 9 4v10l-9 4-9-4V7z"/>

                    </svg>

                </div>

                <div>

                    <h2
                        class="text-xl font-bold text-slate-800">

                        Website Identity

                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500">

                        Informasi utama website yang akan tampil pada halaman
                        publik.

                    </p>

                </div>

            </div>

        </div>





        <div
            class="grid gap-8 p-8 lg:grid-cols-2">

            {{-- ========================================== --}}
            {{-- LEFT --}}
            {{-- ========================================== --}}
            <div
                class="space-y-6">

                {{-- Site Name --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Nama Website

                    </label>

                    <input
                        type="text"
                        name="site_name"
                        value="{{ old('site_name', $setting->site_name) }}"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    @error('site_name')

                        <p
                            class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>





                {{-- Logo --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Logo Website

                    </label>

                    <input
                        id="logoInput"
                        type="file"
                        name="logo"
                        accept="image/*"
                        class="hidden">

                    <label
                        for="logoInput"
                        class="flex cursor-pointer items-center justify-center gap-3 rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-5 py-4 transition hover:border-blue-500 hover:bg-blue-50">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-blue-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0L8 12m4-4v12"/>

                        </svg>

                        <div>

                            <p
                                class="font-medium text-slate-700">

                                Upload Logo

                            </p>

                            <p
                                class="text-xs text-slate-500">

                                PNG, JPG, WEBP, SVG

                            </p>

                        </div>

                    </label>

                    @error('logo')

                        <p
                            class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>





                {{-- Favicon --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Favicon

                    </label>

                    <input
                        id="faviconInput"
                        type="file"
                        name="favicon"
                        accept="image/*"
                        class="hidden">

                    <label
                        for="faviconInput"
                        class="flex cursor-pointer items-center justify-center gap-3 rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-5 py-4 transition hover:border-blue-500 hover:bg-blue-50">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-blue-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 4v16m8-8H4"/>

                        </svg>

                        <div>

                            <p
                                class="font-medium text-slate-700">

                                Upload Favicon

                            </p>

                            <p
                                class="text-xs text-slate-500">

                                PNG / ICO / WEBP

                            </p>

                        </div>

                    </label>

                    @error('favicon')

                        <p
                            class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>

            </div>





            {{-- ========================================== --}}
            {{-- RIGHT --}}
            {{-- ========================================== --}}
            <div
                class="space-y-6">

                {{-- Logo Preview --}}
                <div>

                    <p
                        class="mb-3 text-sm font-semibold text-slate-700">

                        Preview Logo

                    </p>

                    <div
                        class="flex h-60 items-center justify-center rounded-3xl border border-dashed border-slate-300 bg-slate-50">

                        <img
                            id="logoPreview"
                            src="{{ $setting->logo ? asset('storage/'.$setting->logo) : '' }}"
                            class="h-full w-full object-contain {{ $setting->logo ? '' : 'hidden' }}">

                        <div
                            id="logoPlaceholder"
                            class="{{ $setting->logo ? 'hidden' : 'flex' }} h-full items-center justify-center">

                            <span
                                class="text-sm text-slate-400">

                                Logo belum tersedia

                            </span>

                        </div>

                    </div>

                </div>





                {{-- Favicon Preview --}}
                <div>

                    <p
                        class="mb-3 text-sm font-semibold text-slate-700">

                        Preview Favicon

                    </p>

                    <div
                        class="flex h-28 items-center justify-center rounded-3xl border border-dashed border-slate-300 bg-slate-50">

                        <img
                            id="faviconPreview"
                            src="{{ $setting->favicon ? asset('storage/'.$setting->favicon) : '' }}"
                            class="h-24 w-24 rounded-xl object-contain {{ $setting->favicon ? '' : 'hidden' }}">

                        <div
                            id="faviconPlaceholder"
                            class="{{ $setting->favicon ? 'hidden' : 'flex' }} h-full items-center justify-center">

                            <span
                                class="text-sm text-slate-400">

                                Favicon belum tersedia

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
        {{-- ========================================================= --}}
    {{-- HERO SECTION --}}
    {{-- ========================================================= --}}
    <section
        id="hero"
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Header --}}
        <div
            class="border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white px-8 py-6">

            <div
                class="flex items-center gap-4">

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-100 text-indigo-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 5h18M3 19h18M5 7v10m14-10v10M8 9h8v6H8V9z"/>

                    </svg>

                </div>

                <div>

                    <h2
                        class="text-xl font-bold text-slate-800">

                        Hero Landing Page

                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500">

                        Atur tampilan pertama yang akan dilihat pengunjung ketika
                        membuka website.

                    </p>

                </div>

            </div>

        </div>





        <div
            class="grid gap-8 p-8 lg:grid-cols-2">

            {{-- ====================================== --}}
            {{-- LEFT --}}
            {{-- ====================================== --}}
            <div
                class="space-y-6">

                {{-- Hero Badge --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Hero Badge

                    </label>

                    <input
                        type="text"
                        name="hero_badge"
                        value="{{ old('hero_badge', $setting->hero_badge) }}"
                        placeholder="Contoh: PROGRAM PELATIHAN JEPANG"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">


                    @error('hero_badge')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                {{-- Hero Title --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Hero Title

                    </label>

                    <input
                        type="text"
                        name="hero_title"
                        value="{{ old('hero_title', $setting->hero_title) }}"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    @error('hero_title')

                        <p
                            class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>





                {{-- Hero Subtitle --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Hero Subtitle

                    </label>

                    <textarea
                        rows="6"
                        name="hero_subtitle"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">{{ old('hero_subtitle', $setting->hero_subtitle) }}</textarea>

                    @error('hero_subtitle')

                        <p
                            class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>

                {{-- Hero Success Number --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Hero Success Number

                    </label>


                    <input
                        type="text"
                        name="hero_success_number"
                        value="{{ old('hero_success_number', $setting->hero_success_number) }}"
                        placeholder="Contoh: 95%"
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">


                    @error('hero_success_number')

                        <p class="mt-2 text-sm red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                {{-- Upload Hero --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Hero Background

                    </label>

                    <input
                        id="heroInput"
                        type="file"
                        name="hero_image"
                        accept="image/*"
                        class="hidden">

                    <label
                        for="heroInput"
                        class="flex cursor-pointer items-center justify-center gap-3 rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-5 py-5 transition hover:border-blue-500 hover:bg-blue-50">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-blue-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12"/>

                        </svg>

                        <div>

                            <p
                                class="font-medium text-slate-700">

                                Upload Hero Image

                            </p>

                            <p
                                class="text-xs text-slate-500">

                                JPG, PNG atau WEBP • Maksimal 4 MB

                            </p>

                        </div>

                    </label>

                    @error('hero_image')

                        <p
                            class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>

            </div>





            {{-- ====================================== --}}
            {{-- RIGHT --}}
            {{-- ====================================== --}}
            <div>

                <p
                    class="mb-3 text-sm font-semibold text-slate-700">

                    Preview Hero Banner

                </p>

                <div
                    class="overflow-hidden rounded-3xl border border-dashed border-slate-300 bg-slate-50">

                    <img
                        id="heroPreview"
                        src="{{ $setting->hero_image ? asset('storage/'.$setting->hero_image) : '' }}"
                        class="h-[320px] w-full object-cover {{ $setting->hero_image ? '' : 'hidden' }}">

                    <div
                        id="heroPlaceholder"
                        class="{{ $setting->hero_image ? 'hidden' : 'flex' }} h-[320px] flex-col items-center justify-center">

                        <div
                            class="mb-5 flex h-20 w-20 items-center justify-center rounded-full bg-slate-200">

                            ...

                        </div>

                        <h3
                            class="text-lg font-semibold text-slate-700">

                            Hero Image Preview

                        </h3>

                        <p
                            class="mt-2 max-w-sm text-center text-sm text-slate-400">

                            Banner utama landing page akan muncul di sini.

                        </p>

                    </div>

                </div>

                <div
                    class="mt-5 rounded-2xl border border-blue-100 bg-blue-50 p-5">

                    <h4
                        class="font-semibold text-blue-700">

                        Tips Hero Image

                    </h4>

                    <ul
                        class="mt-3 space-y-2 text-sm text-slate-600">

                        <li>• Gunakan gambar resolusi minimal 1920×1080 px.</li>

                        <li>• Pilih foto berkualitas tinggi dengan pencahayaan yang baik.</li>

                        <li>• Hindari gambar yang terlalu ramai agar teks tetap mudah dibaca.</li>

                        <li>• Format yang disarankan adalah JPG atau WEBP.</li>

                    </ul>

                </div>

            </div>

        </div>

    </section>
        {{-- ========================================================= --}}
    {{-- ABOUT SECTION --}}
    {{-- ========================================================= --}}
    <section
        id="about"
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Header --}}
        <div
            class="border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white px-8 py-6">

            <div
                class="flex items-center gap-4">

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19 11H5m14-7H5m14 14H5"/>

                    </svg>

                </div>

                <div>

                    <h2
                        class="text-xl font-bold text-slate-800">

                        Tentang LPK

                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500">

                        Informasi mengenai LPK Bina Insani yang ditampilkan pada
                        halaman landing.

                    </p>

                </div>

            </div>

        </div>





        <div
            class="grid gap-8 p-8 lg:grid-cols-2">

            {{-- LEFT --}}
            <div
                class="space-y-6">

                {{-- About Title --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Judul Tentang

                    </label>

                    <input
                        type="text"
                        name="about_title"
                        value="{{ old('about_title', $setting->about_title) }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    @error('about_title')

                        <p class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>





                {{-- About Description --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Deskripsi

                    </label>

                    <textarea
                        rows="10"
                        name="about_description"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">{{ old('about_description', $setting->about_description) }}</textarea>

                    

                    @error('about_description')

                        <p class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>
                {{-- Alumni Count --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Jumlah Alumni

                    </label>


                    <input
                        type="text"
                        name="about_alumni_count"
                        value="{{ old('about_alumni_count', $setting->about_alumni_count) }}"
                        placeholder="Contoh: 100+"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outlinekan-none focus:ring-4 focus:ring-blue-100">


                    @error('about_alumni_count')

                        <p class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>





                {{-- Upload --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Gambar Tentang

                    </label>

                    <input
                        id="aboutInput"
                        type="file"
                        name="about_image"
                        accept="image/*"
                        class="hidden">

                    <label
                        for="aboutInput"
                        class="flex cursor-pointer items-center justify-center gap-3 rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-5 py-5 transition hover:border-blue-500 hover:bg-blue-50">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-blue-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12"/>

                        </svg>

                        <div>

                            <p
                                class="font-medium text-slate-700">

                                Upload About Image

                            </p>

                            <p
                                class="text-xs text-slate-500">

                                JPG, PNG atau WEBP

                            </p>

                        </div>

                    </label>

                    @error('about_image')

                        <p class="mt-2 text-sm text-red-500">

                            {{ $message }}

                        </p>

                    @enderror

                </div>

            </div>





            {{-- RIGHT --}}
            <div
                class="space-y-5">

                <p
                    class="text-sm font-semibold text-slate-700">

                    Preview About Image

                </p>

                <div
                    class="overflow-hidden rounded-3xl border border-dashed border-slate-300 bg-slate-50">

                    <img
                        id="aboutPreview"
                        src="{{ $setting->about_image ? asset('storage/'.$setting->about_image) : '' }}"
                        class="h-[380px] w-full object-cover {{ $setting->about_image ? '' : 'hidden' }}">

                    <div
                        id="aboutPlaceholder"
                        class="{{ $setting->about_image ? 'hidden' : 'flex' }} h-[380px] flex-col items-center justify-center">

                        ...
                    </div>

                </div>

                <div
                    class="rounded-2xl border border-emerald-100 bg-emerald-50 p-5">

                    <h4
                        class="font-semibold text-emerald-700">

                        Tips Gambar

                    </h4>

                    <ul
                        class="mt-3 space-y-2 text-sm text-slate-600">

                        <li>• Gunakan foto aktivitas pelatihan.</li>

                        <li>• Hindari gambar yang blur.</li>

                        <li>• Resolusi minimal 1200 × 800 px.</li>

                        <li>• Disarankan menggunakan format WEBP.</li>

                    </ul>

                </div>

            </div>

        </div>

    </section>
        {{-- ========================================================= --}}
    {{-- CONTACT & LOCATION --}}
    {{-- ========================================================= --}}
    <section
        id="contact"
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Header --}}
        <div
            class="border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white px-8 py-6">

            <div
                class="flex items-center gap-4">

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-100 text-orange-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

                    </svg>

                </div>

                <div>

                    <h2
                        class="text-xl font-bold text-slate-800">

                        Kontak & Lokasi

                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500">

                        Informasi kontak yang ditampilkan pada landing page.

                    </p>

                </div>

            </div>

        </div>





        <div
            class="grid gap-8 p-8 lg:grid-cols-2">

            {{-- LEFT --}}
            <div
                class="space-y-6">

                {{-- Address --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Alamat

                    </label>

                    <textarea
                        rows="4"
                        name="address"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">{{ old('address',$setting->address) }}</textarea>

                    @error('address')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>





                {{-- Phone --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Nomor Telepon

                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone',$setting->phone) }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    @error('phone')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>





                {{-- WhatsApp --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        WhatsApp

                    </label>

                    <input
                        type="text"
                        name="whatsapp"
                        value="{{ old('whatsapp',$setting->whatsapp) }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    @error('whatsapp')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>





                {{-- Email --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email',$setting->email) }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                    @error('email')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>

            </div>





            {{-- RIGHT --}}
            <div
                class="space-y-6">

                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Google Maps Embed

                    </label>

                    <textarea
                        rows="12"
                        name="google_maps"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 font-mono text-sm shadow-sm focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100"
                        placeholder="<iframe ...></iframe>">{{ old('google_maps',$setting->google_maps) }}</textarea>

                    @error('google_maps')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>



                <div
                    class="rounded-2xl border border-orange-100 bg-orange-50 p-5">

                    <h4
                        class="font-semibold text-orange-700">

                        Tips Google Maps

                    </h4>

                    <ul
                        class="mt-3 space-y-2 text-sm text-slate-600">

                        <li>• Gunakan menu <strong>Share → Embed a Map</strong>.</li>

                        <li>• Salin seluruh kode iframe.</li>

                        <li>• Paste langsung tanpa diubah.</li>

                        <li>• Peta akan otomatis tampil di landing page.</li>

                    </ul>

                </div>

            </div>

        </div>

    </section>
        {{-- ========================================================= --}}
    {{-- PAYMENT INFORMATION --}}
    {{-- ========================================================= --}}
    <section
        id="payment"
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Header --}}
        <div
            class="border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white px-8 py-6">

            <div
                class="flex items-center gap-4">

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-2xl bg-violet-100 text-violet-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 9V7a5 5 0 00-10 0v2M5 9h14v10H5V9z"/>

                    </svg>

                </div>

                <div>

                    <h2
                        class="text-xl font-bold text-slate-800">

                        Informasi Pembayaran

                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500">

                        Kelola metode pembayaran QRIS dan Transfer Bank.

                    </p>

                </div>

            </div>

        </div>





        <div
            class="grid gap-8 p-8 lg:grid-cols-2">

            {{-- LEFT --}}
            <div
                class="space-y-6">

                {{-- QRIS --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        QRIS

                    </label>

                    <input
                        id="qrisInput"
                        type="file"
                        name="qris_image"
                        accept="image/*"
                        class="hidden">

                    <label
                        for="qrisInput"
                        class="flex cursor-pointer items-center justify-center gap-3 rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-5 py-5 transition hover:border-blue-500 hover:bg-blue-50">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-blue-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0l-4 4m4-4v12"/>

                        </svg>

                        <div>

                            <p
                                class="font-medium text-slate-700">

                                Upload QRIS

                            </p>

                            <p
                                class="text-xs text-slate-500">

                                JPG, PNG atau WEBP

                            </p>

                        </div>

                    </label>

                    @error('qris_image')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>





                {{-- Bank --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Nama Bank

                    </label>

                    <input
                        type="text"
                        name="bank_name"
                        value="{{ old('bank_name',$setting->bank_name) }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                </div>





                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Atas Nama

                    </label>

                    <input
                        type="text"
                        name="bank_account_name"
                        value="{{ old('bank_account_name',$setting->bank_account_name) }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                </div>





                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Nomor Rekening

                    </label>

                    <input
                        type="text"
                        name="bank_account_number"
                        value="{{ old('bank_account_number',$setting->bank_account_number) }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                </div>

            </div>





            {{-- RIGHT --}}
            <div
                class="space-y-6">

                <p
                    class="text-sm font-semibold text-slate-700">

                    Preview QRIS

                </p>

                <div
                    class="overflow-hidden rounded-3xl border border-dashed border-slate-300 bg-slate-50">

                    <img
                        id="qrisPreview"
                        src="{{ $setting->qris_image ? asset('storage/'.$setting->qris_image) : '' }}"
                        class="h-[340px] w-full object-contain bg-white p-6 {{ $setting->qris_image ? '' : 'hidden' }}">

                    <div
                        id="qrisPlaceholder"
                        class="{{ $setting->qris_image ? 'hidden' : 'flex' }} h-[340px] flex-col items-center justify-center">
                    </div>
                </div>

                <div
                    class="rounded-2xl border border-violet-100 bg-violet-50 p-5">

                    <h4
                        class="font-semibold text-violet-700">

                        Informasi

                    </h4>

                    <ul
                        class="mt-3 space-y-2 text-sm text-slate-600">

                        <li>• QRIS muncul pada halaman pembayaran pendaftar.</li>

                        <li>• Data rekening menjadi alternatif pembayaran.</li>

                        <li>• Pastikan nomor rekening benar sebelum disimpan.</li>

                    </ul>

                </div>

            </div>

        </div>

    </section>
        {{-- ========================================================= --}}
    {{-- SOCIAL MEDIA & FOOTER --}}
    {{-- ========================================================= --}}
    <section
        id="social"
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Header --}}
        <div
            class="border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white px-8 py-6">

            <div
                class="flex items-center gap-4">

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-2xl bg-pink-100 text-pink-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 8h2a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2v-8a2 2 0 012-2h2m3-5h4m-2 0v6"/>

                    </svg>

                </div>

                <div>

                    <h2
                        class="text-xl font-bold text-slate-800">

                        Sosial Media & Footer

                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500">

                        Kelola media sosial dan informasi footer website.

                    </p>

                </div>

            </div>

        </div>





        <div
            class="grid gap-8 p-8 lg:grid-cols-2">

            {{-- LEFT --}}
            <div
                class="space-y-6">

                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Facebook

                    </label>

                    <input
                        type="url"
                        name="facebook"
                        value="{{ old('facebook',$setting->facebook) }}"
                        placeholder="https://facebook.com/..."
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                </div>





                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Instagram

                    </label>

                    <input
                        type="url"
                        name="instagram"
                        value="{{ old('instagram',$setting->instagram) }}"
                        placeholder="https://instagram.com/..."
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                </div>





                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        YouTube

                    </label>

                    <input
                        type="url"
                        name="youtube"
                        value="{{ old('youtube',$setting->youtube) }}"
                        placeholder="https://youtube.com/..."
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                </div>





                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        TikTok

                    </label>

                    <input
                        type="url"
                        name="tiktok"
                        value="{{ old('tiktok',$setting->tiktok) }}"
                        placeholder="https://tiktok.com/@..."
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                </div>

            </div>





            {{-- RIGHT --}}
            <div
                class="space-y-6">

                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Deskripsi Footer

                    </label>

                    <textarea
                        rows="6"
                        name="footer_description"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">{{ old('footer_description',$setting->footer_description) }}</textarea>

                </div>





                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700">

                        Copyright

                    </label>

                    <input
                        type="text"
                        name="copyright"
                        value="{{ old('copyright',$setting->copyright) }}"
                        placeholder="© 2026 LPK Bina Insani. All Rights Reserved."
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-100">

                </div>





                <div
                    class="rounded-2xl border border-pink-100 bg-pink-50 p-5">

                    <h4
                        class="font-semibold text-pink-700">

                        Informasi

                    </h4>

                    <ul
                        class="mt-3 space-y-2 text-sm text-slate-600">

                        <li>• Gunakan URL lengkap (https://...).</li>

                        <li>• Kosongkan jika tidak digunakan.</li>

                        <li>• Footer akan otomatis mengikuti data ini.</li>

                    </ul>

                </div>

            </div>

        </div>

    </section>





    {{-- ========================================================= --}}
    {{-- SAVE --}}
    {{-- ========================================================= --}}
    <section
        class="sticky bottom-4 z-20">

        <div
            class="mx-auto flex max-w items-center justify-between rounded-2xl border border-slate-200 bg-white/95 px-5 py-3 shadow-lg backdrop-blur">

            <div>

                <h3
                    class="text-sm font-semibold text-slate-800">

                    Simpan Perubahan

                </h3>

                <p
                    class="text-xs text-slate-500">

                    Klik tombol simpan untuk memperbarui website.

                </p>

            </div>



            <button
                type="submit"
                class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:scale-[1.02] hover:shadow-lg">

                Simpan

            </button>

        </div>

    </section>

</form>

@endsection
@push('scripts')

<script>

    function previewImage(
        inputId,
        imageId,
        placeholderId
    ) {

        const input = document.getElementById(inputId);
        const preview = document.getElementById(imageId);
        const placeholder = document.getElementById(placeholderId);

        if (!input || !preview || !placeholder) {
            return;
        }

        input.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            const reader = new FileReader();

            reader.onload = function (e) {

                preview.src = e.target.result;

                preview.classList.remove('hidden');

                placeholder.classList.add('hidden');

            };

            reader.readAsDataURL(file);

        });

    }






    /*
    |--------------------------------------------------------------------------
    | Register Preview
    |--------------------------------------------------------------------------
    */

    previewImage(
        'logoInput',
        'logoPreview',
        'logoPlaceholder'
    );

    previewImage(
        'faviconInput',
        'faviconPreview',
        'faviconPlaceholder'
    );

    previewImage(
        'heroInput',
        'heroPreview',
        'heroPlaceholder'
    );

    previewImage(
        'aboutInput',
        'aboutPreview',
        'aboutPlaceholder'
    );

    previewImage(
        'qrisInput',
        'qrisPreview',
        'qrisPlaceholder'
    );

</script>

@endpush