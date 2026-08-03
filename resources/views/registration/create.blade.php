@extends('layouts.guest')

@section('title', 'Pendaftaran')

@section('content')

<section
    class="relative overflow-hidden bg-gradient-to-br from-slate-50 via-white to-blue-50 py-24">

    {{-- Background --}}
    <div
        class="absolute -left-40 top-0 h-[420px] w-[420px] rounded-full bg-blue-100 blur-3xl opacity-60">
    </div>

    <div
        class="absolute -right-40 bottom-0 h-[420px] w-[420px] rounded-full bg-indigo-100 blur-3xl opacity-60">
    </div>

    <div
        class="section-container relative max-w-6xl">

        {{-- Header --}}
        <div
            class="mx-auto max-w-3xl text-center"
            data-aos="fade-up">

            <span
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-5 py-2 font-semibold text-blue-700">

                <span
                    class="h-2 w-2 rounded-full bg-blue-600">
                </span>

                Formulir Pendaftaran

            </span>

            <h1
                class="mt-6 text-5xl font-black leading-tight text-slate-900">

                Daftar Menjadi Peserta
                <span
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">

                    {{ $setting->site_name }}

                </span>

            </h1>

            <p
                class="mt-6 text-lg leading-8 text-slate-600">

                Lengkapi data diri, unggah dokumen persyaratan,
                pilih program pelatihan, lalu kirim pendaftaran.
                Setelah berhasil, kamu akan memperoleh nomor
                registrasi untuk proses pembayaran.

            </p>

        </div>

        {{-- Main Card --}}
        <div
            class="mt-16 overflow-hidden rounded-[36px] border border-slate-200 bg-white shadow-[0_30px_80px_rgba(15,23,42,.08)]"
            data-aos="fade-up"
            data-aos-delay="150">

            {{-- Wizard --}}
            <div
                class="border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white px-10 py-8">

                <div
                    class="flex items-center">

                    {{-- STEP 1 --}}
                    <div
                        class="flex flex-col items-center">

                        <div
                            id="step-circle-1"
                            class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-600 text-lg font-bold text-white shadow-lg">

                            1

                        </div>

                        <span
                            class="mt-3 text-sm font-bold text-blue-600">

                            Data Diri

                        </span>

                    </div>

                    <div
                        class="mx-4 h-1 flex-1 rounded-full bg-slate-200">

                        <div
                            id="progress-1"
                            class="h-full w-0 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 transition-all duration-500">

                        </div>

                    </div>

                    {{-- STEP 2 --}}
                    <div
                        class="flex flex-col items-center">

                        <div
                            id="step-circle-2"
                            class="flex h-14 w-14 items-center justify-center rounded-full bg-slate-300 text-lg font-bold text-white">

                            2

                        </div>

                        <span
                            class="mt-3 text-sm font-bold text-slate-400">

                            Dokumen

                        </span>

                    </div>

                    <div
                        class="mx-4 h-1 flex-1 rounded-full bg-slate-200">

                        <div
                            id="progress-2"
                            class="h-full w-0 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 transition-all duration-500">

                        </div>

                    </div>

                    {{-- STEP 3 --}}
                    <div
                        class="flex flex-col items-center">

                        <div
                            id="step-circle-3"
                            class="flex h-14 w-14 items-center justify-center rounded-full bg-slate-300 text-lg font-bold text-white">

                            3

                        </div>

                        <span
                            class="mt-3 text-sm font-bold text-slate-400">

                            Program

                        </span>

                    </div>

                    <div
                        class="mx-4 h-1 flex-1 rounded-full bg-slate-200">

                        <div
                            id="progress-3"
                            class="h-full w-0 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 transition-all duration-500">

                        </div>

                    </div>

                    {{-- STEP 4 --}}
                    <div
                        class="flex flex-col items-center">

                        <div
                            id="step-circle-4"
                            class="flex h-14 w-14 items-center justify-center rounded-full bg-slate-300 text-lg font-bold text-white">

                            4

                        </div>

                        <span
                            class="mt-3 text-sm font-bold text-slate-400">

                            Konfirmasi

                        </span>

                    </div>

                </div>

            </div>

            <form
                action="{{ route('registration.store') }}"
                method="POST"
                enctype="multipart/form-data"
                id="registrationForm"
                class="p-10 lg:p-14">

                @csrf

                {{-- ========================================== --}}
                {{-- STEP 1 --}}
                {{-- ========================================== --}}

                <div
                    id="step-1"
                    class="step-content">

                    <div
                        class="mb-10">

                        <h2
                            class="text-3xl font-black text-slate-900">

                            Data Pribadi

                        </h2>

                        <p
                            class="mt-3 text-slate-500">

                            Pastikan seluruh data sesuai dengan identitas resmi.

                        </p>

                    </div>

                    <div
                        class="grid gap-7 md:grid-cols-2">

                        {{-- Nama --}}
                        <div>

                            <label
                                class="mb-2 block font-semibold text-slate-700">

                                Nama Lengkap

                            </label>

                            <input
                                type="text"
                                name="full_name"
                                value="{{ old('full_name') }}"
                                class="w-full rounded-2xl border-slate-300 px-5 py-4 focus:border-blue-600 focus:ring-blue-600">

                        </div>

                        {{-- Email --}}
                        <div>

                            <label
                                class="mb-2 block font-semibold text-slate-700">

                                Email

                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="w-full rounded-2xl border-slate-300 px-5 py-4 focus:border-blue-600 focus:ring-blue-600">

                        </div>

                        {{-- WA --}}
                        <div>

                            <label
                                class="mb-2 block font-semibold text-slate-700">

                                Nomor WhatsApp

                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                class="w-full rounded-2xl border-slate-300 px-5 py-4 focus:border-blue-600 focus:ring-blue-600">

                        </div>

                        {{-- Gender --}}
                        <div>

                            <label
                                class="mb-2 block font-semibold text-slate-700">

                                Jenis Kelamin

                            </label>

                            <select
                                name="gender"
                                class="w-full rounded-2xl border-slate-300 px-5 py-4 focus:border-blue-600 focus:ring-blue-600">

                                <option value="">
                                    Pilih Jenis Kelamin
                                </option>

                                <option value="Laki-laki">
                                    Laki-laki
                                </option>

                                <option value="Perempuan">
                                    Perempuan
                                </option>

                            </select>

                        </div>

                        {{-- Birth --}}
                        <div>

                            <label
                                class="mb-2 block font-semibold text-slate-700">

                                Tanggal Lahir

                            </label>

                            <input
                                type="date"
                                name="birth_date"
                                class="w-full rounded-2xl border-slate-300 px-5 py-4 focus:border-blue-600 focus:ring-blue-600">

                        </div>

                        {{-- Kota --}}
                        <div>

                            <label
                                class="mb-2 block font-semibold text-slate-700">

                                Kota Asal

                            </label>

                            <input
                                type="text"
                                name="city"
                                class="w-full rounded-2xl border-slate-300 px-5 py-4 focus:border-blue-600 focus:ring-blue-600">

                        </div>

                    </div>

                    {{-- Alamat --}}
                    <div
                        class="mt-7">

                        <label
                            class="mb-2 block font-semibold text-slate-700">

                            Alamat Lengkap

                        </label>

                        <textarea
                            rows="5"
                            name="address"
                            class="w-full rounded-2xl border-slate-300 px-5 py-4 focus:border-blue-600 focus:ring-blue-600"></textarea>

                    </div>

                    {{-- Navigation --}}
                    <div
                        class="mt-12 flex justify-end">

                        <button
                            type="button"
                            id="nextStep1"
                            class="rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:shadow-xl">

                            Lanjut ke Dokumen →

                        </button>

                    </div>

                </div>

                                {{-- ========================================== --}}
                {{-- STEP 2 --}}
                {{-- ========================================== --}}

                <div
                    id="step-2"
                    class="step-content hidden">

                    <div
                        class="mb-10">

                        <h2
                            class="text-3xl font-black text-slate-900">

                            Pendidikan & Dokumen

                        </h2>

                        <p
                            class="mt-3 text-slate-500">

                            Lengkapi informasi pendidikan terakhir dan unggah
                            seluruh dokumen persyaratan.

                        </p>

                    </div>

                    {{-- ========================= --}}
                    {{-- Pendidikan --}}
                    {{-- ========================= --}}

                    <div
                        class="rounded-3xl border border-slate-200 bg-slate-50 p-8">

                        <h3
                            class="text-xl font-bold text-slate-900">

                            Informasi Pendidikan

                        </h3>

                        <div
                            class="mt-8 grid gap-7 md:grid-cols-3">

                            {{-- Pendidikan --}}
                            <div>

                                <label
                                    class="mb-2 block font-semibold text-slate-700">

                                    Pendidikan Terakhir

                                </label>

                                <select
                                    name="last_education"
                                    class="w-full rounded-2xl border-slate-300 px-5 py-4 focus:border-blue-600 focus:ring-blue-600">

                                    <option value="">
                                        Pilih Pendidikan
                                    </option>

                                    <option>SMP / MTs</option>

                                    <option>SMA / SMK / MA</option>

                                    <option>D1</option>

                                    <option>D2</option>

                                    <option>D3</option>

                                    <option>D4</option>

                                    <option>S1</option>

                                    <option>S2</option>

                                    <option>S3</option>

                                    <option>Lainnya</option>

                                </select>

                            </div>

                            {{-- Sekolah --}}
                            <div>

                                <label
                                    class="mb-2 block font-semibold text-slate-700">

                                    Nama Sekolah / Kampus

                                </label>

                                <input
                                    type="text"
                                    name="school_name"
                                    class="w-full rounded-2xl border-slate-300 px-5 py-4 focus:border-blue-600 focus:ring-blue-600">

                            </div>

                            {{-- Tahun --}}
                            <div>

                                <label
                                    class="mb-2 block font-semibold text-slate-700">

                                    Tahun Lulus

                                </label>

                                <input
                                    type="number"
                                    min="1980"
                                    max="{{ date('Y') }}"
                                    name="graduation_year"
                                    class="w-full rounded-2xl border-slate-300 px-5 py-4 focus:border-blue-600 focus:ring-blue-600">

                            </div>

                        </div>

                    </div>

                    {{-- ========================= --}}
                    {{-- Upload --}}
                    {{-- ========================= --}}

                    <div
                        class="mt-10">

                        <h3
                            class="text-xl font-bold text-slate-900">

                            Upload Dokumen

                        </h3>

                        <p
                            class="mt-2 text-slate-500">

                            Format JPG, JPEG, PNG atau PDF.

                        </p>

                        <div
                            class="mt-8 grid gap-7 lg:grid-cols-3">

                            {{-- ========================= --}}
                            {{-- KTP --}}
                            {{-- ========================= --}}

                            <label
                                class="upload-card group cursor-pointer rounded-3xl border-2 border-dashed border-slate-300 bg-white p-8 text-center transition hover:border-blue-600 hover:bg-blue-50">

                                <input
                                    type="file"
                                    name="ktp_file"
                                    class="hidden upload-input"
                                    accept=".jpg,.jpeg,.png,.pdf">

                                <div
                                    class="text-5xl">

                                    🪪

                                </div>

                                <h4
                                    class="mt-5 text-xl font-bold text-slate-900">

                                    Upload KTP

                                </h4>

                                <p
                                    class="mt-3 text-sm leading-7 text-slate-500">

                                    JPG, PNG atau PDF
                                    <br>
                                    Maksimal 2 MB

                                </p>

                                <span
                                    class="file-name mt-5 block text-sm font-semibold text-blue-600">

                                    Belum ada file

                                </span>

                            </label>

                            {{-- ========================= --}}
                            {{-- IJAZAH --}}
                            {{-- ========================= --}}

                            <label
                                class="upload-card group cursor-pointer rounded-3xl border-2 border-dashed border-slate-300 bg-white p-8 text-center transition hover:border-emerald-600 hover:bg-emerald-50">

                                <input
                                    type="file"
                                    name="diploma_file"
                                    class="hidden upload-input"
                                    accept=".jpg,.jpeg,.png,.pdf">

                                <div
                                    class="text-5xl">

                                    🎓

                                </div>

                                <h4
                                    class="mt-5 text-xl font-bold text-slate-900">

                                    Upload Ijazah

                                </h4>

                                <p
                                    class="mt-3 text-sm leading-7 text-slate-500">

                                    JPG, PNG atau PDF
                                    <br>
                                    Maksimal 4 MB

                                </p>

                                <span
                                    class="file-name mt-5 block text-sm font-semibold text-emerald-600">

                                    Belum ada file

                                </span>

                            </label>

                            {{-- ========================= --}}
                            {{-- PAS FOTO --}}
                            {{-- ========================= --}}

                            <label
                                class="upload-card group cursor-pointer rounded-3xl border-2 border-dashed border-slate-300 bg-white p-8 text-center transition hover:border-orange-500 hover:bg-orange-50">

                                <input
                                    type="file"
                                    name="photo_file"
                                    class="hidden upload-input"
                                    accept=".jpg,.jpeg,.png">

                                <div
                                    class="text-5xl">

                                    📷

                                </div>

                                <h4
                                    class="mt-5 text-xl font-bold text-slate-900">

                                    Pas Foto

                                </h4>

                                <p
                                    class="mt-3 text-sm leading-7 text-slate-500">

                                    JPG / PNG
                                    <br>
                                    Maksimal 2 MB

                                </p>

                                <span
                                    class="file-name mt-5 block text-sm font-semibold text-orange-500">

                                    Belum ada file

                                </span>

                            </label>

                        </div>

                    </div>

                    {{-- Navigation --}}

                    <div
                        class="mt-12 flex justify-between">

                        <button
                            type="button"
                            id="backStep2"
                            class="rounded-2xl border border-slate-300 px-8 py-4 font-semibold text-slate-700 transition hover:bg-slate-100">

                            ← Kembali

                        </button>

                        <button
                            type="button"
                            id="nextStep2"
                            class="rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:shadow-xl">

                            Lanjut Pilih Program →

                        </button>

                    </div>

                </div>

                                {{-- ========================================== --}}
                {{-- STEP 3 --}}
                {{-- ========================================== --}}

                <div
                    id="step-3"
                    class="step-content hidden">

                    <div
                        class="mb-10">

                        <h2
                            class="text-3xl font-black text-slate-900">

                            Pilih Program Pelatihan

                        </h2>

                        <p
                            class="mt-3 text-slate-500">

                            Pilih program yang paling sesuai dengan tujuan
                            dan rencana kariermu.

                        </p>

                    </div>

                    <div
                        class="grid gap-7 lg:grid-cols-2">

                        @foreach ($classes as $class)

                            <label
                                class="course-card group cursor-pointer overflow-hidden rounded-[28px] border-2 border-slate-200 bg-white transition duration-300 hover:-translate-y-2 hover:border-blue-600 hover:shadow-2xl">

                                <input
                                    type="radio"
                                    name="course_class_id"
                                    value="{{ $class->id }}"
                                    class="course-radio hidden">

                                <div
                                    class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-7 text-white">

                                    <div
                                        class="flex items-start justify-between">

                                        <div>

                                            <h3
                                                class="text-2xl font-black">

                                                {{ $class->name }}

                                            </h3>

                                            <p
                                                class="mt-2 text-blue-100">

                                                Program Pelatihan LPK
                                                Bina Insani

                                            </p>

                                        </div>

                                        <div
                                        class="check-icon flex h-8 w-8 items-center justify-center rounded-full border-2 border-slate-300 bg-white transition-all duration-300">

                                        <svg
                                            class="hidden h-4 w-4 text-white check-svg"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="3">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 13l4 4L19 7"/>

                                        </svg>

                                    </div>

                                    </div>

                                </div>

                                <div
                                    class="p-8">

                                    @if ($class->description)

                                        <p
                                            class="leading-8 text-slate-600">

                                            {{ Str::limit($class->description, 180) }}

                                        </p>

                                    @endif

                                    <div
                                        class="mt-8 flex flex-wrap gap-3">

                                        <span
                                            class="rounded-full bg-blue-100 px-4 py-2 text-sm font-bold text-blue-700">

                                            💳 Rp {{ number_format($class->registration_fee, 0, ',', '.') }}

                                        </span>

                                        @if ($class->duration)

                                            <span
                                                class="rounded-full bg-emerald-100 px-4 py-2 text-sm font-bold text-emerald-700">

                                                ⏳ {{ $class->duration }}

                                            </span>

                                        @endif

                                        @if ($class->meeting_schedule)

                                            <span
                                                class="rounded-full bg-orange-100 px-4 py-2 text-sm font-bold text-orange-700">

                                                📅 {{ $class->meeting_schedule }}

                                            </span>

                                        @endif

                                    </div>

                                </div>

                            </label>

                        @endforeach

                    </div>

                    {{-- Navigation --}}

                    <div
                        class="mt-12 flex justify-between">

                        <button
                            type="button"
                            id="backStep3"
                            class="rounded-2xl border border-slate-300 px-8 py-4 font-semibold text-slate-700 transition hover:bg-slate-100">

                            ← Kembali

                        </button>

                        <button
                            type="button"
                            id="nextStep3"
                            class="rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:shadow-xl">

                            Lanjut Konfirmasi →

                        </button>

                    </div>

                </div>

                                {{-- ========================================== --}}
                {{-- STEP 4 --}}
                {{-- ========================================== --}}

                <div
                    id="step-4"
                    class="step-content hidden">

                    <div
                        class="mb-10">

                        <h2
                            class="text-3xl font-black text-slate-900">

                            Konfirmasi Pendaftaran

                        </h2>

                        <p
                            class="mt-3 text-slate-500">

                            Periksa kembali seluruh data sebelum mengirim
                            formulir pendaftaran.

                        </p>

                    </div>

                    <div
                        class="rounded-[32px] border border-slate-200 bg-slate-50 p-8">

                        <div
                            class="grid gap-8 md:grid-cols-2">

                            {{-- Nama --}}
                            <div>

                                <p
                                    class="text-sm text-slate-500">

                                    Nama Lengkap

                                </p>

                                <h3
                                    id="preview-name"
                                    class="mt-2 text-xl font-bold text-slate-900">

                                    -

                                </h3>

                            </div>

                            {{-- Email --}}
                            <div>

                                <p
                                    class="text-sm text-slate-500">

                                    Email

                                </p>

                                <h3
                                    id="preview-email"
                                    class="mt-2 text-xl font-bold text-slate-900">

                                    -

                                </h3>

                            </div>

                            {{-- Phone --}}
                            <div>

                                <p
                                    class="text-sm text-slate-500">

                                    Nomor WhatsApp

                                </p>

                                <h3
                                    id="preview-phone"
                                    class="mt-2 text-xl font-bold text-slate-900">

                                    -

                                </h3>

                            </div>

                            {{-- Gender --}}
                            <div>

                                <p
                                    class="text-sm text-slate-500">

                                    Jenis Kelamin

                                </p>

                                <h3
                                    id="preview-gender"
                                    class="mt-2 text-xl font-bold text-slate-900">

                                    -

                                </h3>

                            </div>

                            {{-- Birth --}}
                            <div>

                                <p
                                    class="text-sm text-slate-500">

                                    Tanggal Lahir

                                </p>

                                <h3
                                    id="preview-birth"
                                    class="mt-2 text-xl font-bold text-slate-900">

                                    -

                                </h3>

                            </div>

                            {{-- City --}}
                            <div>

                                <p
                                    class="text-sm text-slate-500">

                                    Kota Asal

                                </p>

                                <h3
                                    id="preview-city"
                                    class="mt-2 text-xl font-bold text-slate-900">

                                    -

                                </h3>

                            </div>

                        </div>

                        {{-- Address --}}
                        <div
                            class="mt-8">

                            <p
                                class="text-sm text-slate-500">

                                Alamat

                            </p>

                            <h3
                                id="preview-address"
                                class="mt-2 text-lg font-semibold text-slate-900">

                                -

                            </h3>

                        </div>

                        <hr class="my-10 border-slate-200">

                        {{-- Education --}}
                        <div
                            class="grid gap-8 md:grid-cols-3">

                            <div>

                                <p
                                    class="text-sm text-slate-500">

                                    Pendidikan Terakhir

                                </p>

                                <h3
                                    id="preview-education"
                                    class="mt-2 text-lg font-bold text-slate-900">

                                    -

                                </h3>

                            </div>

                            <div>

                                <p
                                    class="text-sm text-slate-500">

                                    Sekolah / Kampus

                                </p>

                                <h3
                                    id="preview-school"
                                    class="mt-2 text-lg font-bold text-slate-900">

                                    -

                                </h3>

                            </div>

                            <div>

                                <p
                                    class="text-sm text-slate-500">

                                    Tahun Lulus

                                </p>

                                <h3
                                    id="preview-year"
                                    class="mt-2 text-lg font-bold text-slate-900">

                                    -

                                </h3>

                            </div>

                        </div>

                        <hr class="my-10 border-slate-200">

                        {{-- Program --}}
                        <div>

                            <p
                                class="text-sm text-slate-500">

                                Program Dipilih

                            </p>

                            <h3
                                id="preview-class"
                                class="mt-3 text-2xl font-black text-blue-600">

                                -

                            </h3>

                        </div>

                    </div>

                    {{-- Agreement --}}

                    <div
                        class="mt-10 rounded-3xl border border-blue-200 bg-blue-50 p-7">

                        <label
                            class="flex cursor-pointer items-start gap-4">

                            <input
                                type="checkbox"
                                id="agreement"
                                class="mt-1 rounded border-slate-300 text-blue-600">

                            <span
                                class="leading-8 text-slate-700">

                                Saya menyatakan bahwa seluruh data dan dokumen
                                yang saya unggah adalah benar serta dapat
                                dipertanggungjawabkan. Saya bersedia mengikuti
                                seluruh ketentuan yang berlaku di

                                <strong>
                                    {{ $setting->site_name }}
                                </strong>.

                            </span>

                        </label>

                    </div>

                    {{-- Navigation --}}

                    <div
                        class="mt-12 flex justify-between">

                        <button
                            type="button"
                            id="backStep4"
                            class="rounded-2xl border border-slate-300 px-8 py-4 font-semibold text-slate-700 transition hover:bg-slate-100">

                            ← Kembali

                        </button>

                        <button
                            type="submit"
                            id="submitRegistration"
                            disabled
                            class="rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 font-semibold text-white shadow-lg transition hover:-translate-y-1 hover:shadow-xl disabled:cursor-not-allowed disabled:opacity-50">

                            Kirim Pendaftaran

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', () => {

    let currentStep = 1;
    const totalSteps = 4;

    // =========================
    // SHOW STEP
    // =========================

    function showStep(step) {

        document.querySelectorAll('.step-content').forEach(content => {
            content.classList.add('hidden');
        });

        document
            .getElementById(`step-${step}`)
            .classList.remove('hidden');

        for (let i = 1; i <= totalSteps; i++) {

            const circle =
                document.getElementById(`step-circle-${i}`);

            if (i <= step) {

                circle.classList.remove('bg-slate-300');
                circle.classList.add('bg-blue-600');

            } else {

                circle.classList.remove('bg-blue-600');
                circle.classList.add('bg-slate-300');

            }

        }

        document.getElementById('progress-1').style.width =
            step >= 2 ? '100%' : '0';

        document.getElementById('progress-2').style.width =
            step >= 3 ? '100%' : '0';

        document.getElementById('progress-3').style.width =
            step >= 4 ? '100%' : '0';

        currentStep = step;
        
        currentStep = step;

// Tunggu browser selesai render
setTimeout(() => {

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });

    if (typeof AOS !== 'undefined') {
        AOS.refreshHard();
    }

}, 50);

    }

    

    showStep(1);

    // =========================
    // VALIDATION
    // =========================

    function validateStep1() {

        const fields = [

            'full_name',
            'email',
            'phone',
            'gender',
            'birth_date',
            'city',
            'address',

        ];

        for (const field of fields) {

            const input =
                document.querySelector(`[name="${field}"]`);

            if (!input.value.trim()) {

                input.focus();
                return false;

            }

        }

        return true;

    }

    function validateStep2() {

        const fields = [

            'last_education',
            'school_name',
            'graduation_year',

        ];

        for (const field of fields) {

            const input =
                document.querySelector(`[name="${field}"]`);

            if (!input.value.trim()) {

                input.focus();
                return false;

            }

        }

        if (!document.querySelector('[name="ktp_file"]').files.length)
            return false;

        if (!document.querySelector('[name="diploma_file"]').files.length)
            return false;

        if (!document.querySelector('[name="photo_file"]').files.length)
            return false;

        return true;

    }

    function validateStep3() {

        return document.querySelector(
            'input[name="course_class_id"]:checked'
        );

    }

    // =========================
    // BUTTON
    // =========================

    document
        .getElementById('nextStep1')
        .addEventListener('click', () => {

            if (!validateStep1()) {

                alert('Lengkapi data diri terlebih dahulu.');
                return;

            }

            showStep(2);

        });

    document
        .getElementById('backStep2')
        .addEventListener('click', () => showStep(1));

    document
        .getElementById('nextStep2')
        .addEventListener('click', () => {

            if (!validateStep2()) {

                alert('Lengkapi pendidikan dan dokumen.');
                return;

            }

            showStep(3);

        });

    document
        .getElementById('backStep3')
        .addEventListener('click', () => showStep(2));

    document
        .getElementById('nextStep3')
        .addEventListener('click', () => {

            if (!validateStep3()) {

                alert('Pilih program terlebih dahulu.');
                return;

            }

            updatePreview();

            showStep(4);

        });

    document
        .getElementById('backStep4')
        .addEventListener('click', () => showStep(3));

    // =========================
    // PREVIEW
    // =========================

    function value(name) {

        return document.querySelector(`[name="${name}"]`).value;

    }

    document.getElementById('preview-name').textContent = '';
    function updatePreview() {

        document.getElementById('preview-name').textContent =
            value('full_name');

        document.getElementById('preview-email').textContent =
            value('email');

        document.getElementById('preview-phone').textContent =
            value('phone');

        document.getElementById('preview-gender').textContent =
            value('gender');

        document.getElementById('preview-birth').textContent =
            value('birth_date');

        document.getElementById('preview-city').textContent =
            value('city');

        document.getElementById('preview-address').textContent =
            value('address');

        document.getElementById('preview-education').textContent =
            value('last_education');

        document.getElementById('preview-school').textContent =
            value('school_name');

        document.getElementById('preview-year').textContent =
            value('graduation_year');

        const selected =
            document.querySelector(
                'input[name="course_class_id"]:checked'
            );

        if (selected) {

            document.getElementById('preview-class').textContent =
                selected.closest('.course-card')
                .querySelector('h3')
                .textContent.trim();

        }

    }

    // =========================
    // COURSE CARD
    // =========================

    document
    .querySelectorAll('.course-card')
    .forEach(card => {

        card.addEventListener('click', () => {

            document
                .querySelectorAll('.course-card')
                .forEach(item => {

                    item.classList.remove(
                        'border-blue-600',
                        'ring-4',
                        'ring-blue-100',
                        'shadow-xl'
                    );

                    item.classList.add(
                        'border-slate-200'
                    );

                    const icon =
                        item.querySelector('.check-icon');

                    const svg =
                        item.querySelector('.check-svg');

                    icon.classList.remove(
                        'bg-blue-600',
                        'border-blue-600'
                    );

                    icon.classList.add(
                        'bg-white',
                        'border-slate-300'
                    );

                    svg.classList.add('hidden');

                });

            card.classList.remove('border-slate-200');

            card.classList.add(
                'border-blue-600',
                'ring-4',
                'ring-blue-100',
                'shadow-xl'
            );

            const icon =
                card.querySelector('.check-icon');

            const svg =
                card.querySelector('.check-svg');

            icon.classList.remove(
                'bg-white',
                'border-slate-300'
            );

            icon.classList.add(
                'bg-blue-600',
                'border-blue-600'
            );

            svg.classList.remove('hidden');

            card.querySelector('.course-radio').checked = true;

        });

    });

    // =========================
    // FILE NAME
    // =========================

    document
        .querySelectorAll('.upload-input')
        .forEach(input => {

            input.addEventListener('change', function () {

                const label =
                    this.closest('.upload-card');

                const fileName =
                    label.querySelector('.file-name');

                if (this.files.length) {

                    fileName.textContent =
                        this.files[0].name;

                }

            });

        });

    // =========================
    // AGREEMENT
    // =========================

    document
        .getElementById('agreement')
        .addEventListener('change', function () {

            document
                .getElementById('submitRegistration')
                .disabled = !this.checked;

        });

});

</script>

@endpush