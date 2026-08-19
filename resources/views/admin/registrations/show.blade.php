@extends('layouts.app')

@section('title', 'Detail Pendaftaran')

@section('content')

<div class="space-y-6 pb-8">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}
    <div
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">

        <div
            class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10 blur-3xl">
        </div>

        <div
            class="absolute -bottom-16 left-1/3 h-40 w-40 rounded-full bg-blue-400/10 blur-3xl">
        </div>

        <div
            class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <span
                    class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                    Registration Management

                </span>

                <h1 class="mt-4 text-3xl font-black tracking-tight">

                    Detail Pendaftaran

                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-blue-100">

                    Informasi lengkap data peserta, program, status pembayaran,
                    dan dokumen pendaftaran.

                </p>

            </div>


            <div class="flex flex-col gap-3 sm:flex-row">

                <a
                    href="{{ route('registrations.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-bold text-white transition hover:bg-white/20">

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 19l-7-7 7-7" />

                    </svg>

                    Kembali

                </a>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- PERSONAL DATA + PROGRAM --}}
    {{-- ========================================================= --}}
    <div class="grid gap-6 lg:grid-cols-3">

        {{-- ===================================================== --}}
        {{-- PERSONAL DATA --}}
        {{-- ===================================================== --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white shadow-sm lg:col-span-2">

            <div
                class="border-b border-slate-200 px-6 py-5">

                <div class="flex items-start gap-4">

                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">

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

                        <h2 class="text-lg font-bold text-slate-800">

                            Informasi Peserta

                        </h2>

                        <p class="mt-1 text-sm text-slate-500">

                            Data pribadi peserta pendaftaran.

                        </p>

                    </div>

                </div>

            </div>


            <div class="grid gap-6 p-6 md:grid-cols-2">

                {{-- Nomor Registrasi --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                        Nomor Registrasi

                    </p>

                    <p class="mt-2 inline-flex rounded-xl bg-blue-50 px-3 py-2 text-sm font-bold text-blue-700">

                        {{ $registration->registration_number }}

                    </p>

                </div>


                {{-- Nama --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                        Nama Lengkap

                    </p>

                    <p class="mt-2 text-sm font-bold text-slate-800">

                        {{ $registration->full_name }}

                    </p>

                </div>


                {{-- Email --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                        Email

                    </p>

                    <p class="mt-2 break-all text-sm font-semibold text-slate-700">

                        {{ $registration->email }}

                    </p>

                </div>


                {{-- Phone --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                        Nomor HP

                    </p>

                    <p class="mt-2 text-sm font-semibold text-slate-700">

                        {{ $registration->phone }}

                    </p>

                </div>


                {{-- Gender --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                        Jenis Kelamin

                    </p>

                    <p class="mt-2 text-sm font-semibold text-slate-700">

                        {{ $registration->gender }}

                    </p>

                </div>


                {{-- Birth Date --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                        Tanggal Lahir

                    </p>

                    <p class="mt-2 text-sm font-semibold text-slate-700">

                        {{ $registration->birth_date?->format('d F Y') }}

                    </p>

                </div>


                {{-- Address --}}
                <div class="md:col-span-2">

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                        Alamat

                    </p>

                    <div
                        class="mt-2 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm leading-6 text-slate-700">

                        {{ $registration->address }}

                    </div>

                </div>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- PROGRAM --}}
        {{-- ===================================================== --}}
        <div
            class="rounded-3xl border border-blue-200 bg-gradient-to-br from-blue-50 via-white to-indigo-50 p-6 shadow-sm">

            <div class="flex items-start gap-4">

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-blue-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />

                    </svg>

                </div>

                <div>

                    <h2 class="text-lg font-bold text-slate-800">

                        Program

                    </h2>

                    <p class="mt-1 text-sm text-slate-500">

                        Program pelatihan yang dipilih peserta.

                    </p>

                </div>

            </div>


            <div class="mt-7 space-y-6">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                        Program Dipilih

                    </p>

                    <p class="mt-2 text-lg font-black leading-7 text-blue-700">

                        {{ $registration->courseClass?->name ?? '-' }}

                    </p>

                </div>


                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                        Biaya Pendaftaran

                    </p>

                    <p class="mt-2 text-2xl font-black text-slate-800">

                        Rp {{ number_format($registration->courseClass?->registration_fee ?? 0, 0, ',', '.') }}

                    </p>

                </div>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- EDUCATION --}}
    {{-- ========================================================= --}}
    <div
        class="rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div
            class="border-b border-slate-200 px-6 py-5">

            <div class="flex items-start gap-4">

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 14l9-5-9-5-9 5 9 5z" />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 14l6.16-3.422A12.083 12.083 0 0118 14.5c0 2.485-2.686 4.5-6 4.5s-6-2.015-6-4.5c0-.928.288-1.793.84-2.578L12 14z" />

                    </svg>

                </div>

                <div>

                    <h2 class="text-lg font-bold text-slate-800">

                        Informasi Pendidikan

                    </h2>

                    <p class="mt-1 text-sm text-slate-500">

                        Riwayat pendidikan terakhir peserta.

                    </p>

                </div>

            </div>

        </div>


        <div class="grid gap-6 p-6 md:grid-cols-3">

            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                    Pendidikan Terakhir

                </p>

                <p class="mt-2 text-sm font-bold text-slate-800">

                    {{ $registration->last_education ?: '-' }}

                </p>

            </div>


            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                    Nama Sekolah / Institusi

                </p>

                <p class="mt-2 text-sm font-bold text-slate-800">

                    {{ $registration->school_name ?: '-' }}

                </p>

            </div>


            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                    Tahun Lulus

                </p>

                <p class="mt-2 text-sm font-bold text-slate-800">

                    {{ $registration->graduation_year ?: '-' }}

                </p>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- STATUS & PAYMENT --}}
    {{-- ========================================================= --}}
    <div
        class="rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div
            class="border-b border-slate-200 px-6 py-5">

            <div class="flex items-start gap-4">

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.293 9 11.622C17.176 19.293 21 14.591 21 9c0-1.048-.134-2.064-.382-3.016z" />

                    </svg>

                </div>

                <div>

                    <h2 class="text-lg font-bold text-slate-800">

                        Status Pendaftaran

                    </h2>

                    <p class="mt-1 text-sm text-slate-500">

                        Status proses pendaftaran dan pembayaran peserta.

                    </p>

                </div>

            </div>

        </div>


        <div class="p-6">

            @php
                $payment = $registration->payment;
            @endphp


            {{-- Registration Status --}}
            <div>

                <p class="mb-3 text-xs font-semibold uppercase tracking-wide text-slate-400">

                    Status Pendaftaran

                </p>


                @if($payment && $payment->status === 'rejected')

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-700">

                        <span class="h-2 w-2 rounded-full bg-red-500"></span>

                        Payment Rejected

                    </span>

                @elseif($registration->status === 'waiting_payment')

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-amber-100 px-4 py-2 text-sm font-bold text-amber-700">

                        <span class="h-2 w-2 rounded-full bg-amber-500"></span>

                        Waiting Payment

                    </span>

                @elseif($registration->status === 'waiting_verification')

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-sm font-bold text-blue-700">

                        <span class="h-2 w-2 rounded-full bg-blue-500"></span>

                        Waiting Verification

                    </span>

                @elseif($registration->status === 'accepted')

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-4 py-2 text-sm font-bold text-emerald-700">

                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                        Accepted

                    </span>

                @elseif($registration->status === 'rejected')

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-700">

                        <span class="h-2 w-2 rounded-full bg-red-500"></span>

                        Rejected

                    </span>

                @else

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-sm font-bold text-slate-600">

                        <span class="h-2 w-2 rounded-full bg-slate-400"></span>

                        {{ ucfirst(str_replace('_', ' ', $registration->status)) }}

                    </span>

                @endif

            </div>



            {{-- Payment --}}
            @if($payment)

                <div
                    class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5">

                    <div class="flex items-center justify-between gap-3">

                        <h3 class="font-bold text-slate-800">

                            Informasi Pembayaran

                        </h3>

                        <span
                            class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-500">

                            {{ $payment->payment_method }}

                        </span>

                    </div>


                    <div class="mt-5 grid gap-5 md:grid-cols-3">

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                                Status Payment

                            </p>

                            <p class="mt-2 text-sm font-bold text-slate-800">

                                {{ ucfirst(str_replace('_', ' ', $payment->status)) }}

                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                                Nominal

                            </p>

                            <p class="mt-2 text-sm font-bold text-slate-800">

                                Rp {{ number_format($payment->amount, 0, ',', '.') }}

                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">

                                Metode

                            </p>

                            <p class="mt-2 text-sm font-bold text-slate-800">

                                {{ $payment->payment_method }}

                            </p>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- DOCUMENTS --}}
    {{-- ========================================================= --}}
    <div
        class="rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div
            class="border-b border-slate-200 px-6 py-5">

            <div class="flex items-start gap-4">

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-slate-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M13 3v6h6" />

                    </svg>

                </div>

                <div>

                    <h2 class="text-lg font-bold text-slate-800">

                        Dokumen Pendaftaran

                    </h2>

                    <p class="mt-1 text-sm text-slate-500">

                        Dokumen yang diupload peserta saat melakukan pendaftaran.

                    </p>

                </div>

            </div>

        </div>


        <div class="grid gap-6 p-6 lg:grid-cols-3">

            {{-- KTP --}}
            <div
                class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50">

                <div
                    class="flex items-center justify-between border-b border-slate-200 bg-white px-5 py-4">

                    <div>

                        <h3 class="font-bold text-slate-800">

                            KTP

                        </h3>

                        <p class="mt-1 text-xs text-slate-400">

                            Identitas peserta

                        </p>

                    </div>

                    <span
                        class="rounded-lg bg-slate-100 px-2.5 py-1 text-[11px] font-semibold text-slate-500">

                        Dokumen

                    </span>

                </div>


                @if($registration->ktp_file)

                    <img
                        src="{{ asset('storage/'.$registration->ktp_file) }}"
                        class="h-64 w-full object-cover"
                        alt="KTP">

                    <div class="bg-white p-4">

                        <a
                            href="{{ asset('storage/'.$registration->ktp_file) }}"
                            target="_blank"
                            class="inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                            Lihat KTP

                        </a>

                    </div>

                @else

                    <div
                        class="flex h-64 items-center justify-center bg-slate-100 text-sm text-slate-400">

                        Dokumen tidak tersedia

                    </div>

                @endif

            </div>



            {{-- IJAZAH --}}
            <div
                class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50">

                <div
                    class="flex items-center justify-between border-b border-slate-200 bg-white px-5 py-4">

                    <div>

                        <h3 class="font-bold text-slate-800">

                            Ijazah

                        </h3>

                        <p class="mt-1 text-xs text-slate-400">

                            Pendidikan terakhir

                        </p>

                    </div>

                    <span
                        class="rounded-lg bg-slate-100 px-2.5 py-1 text-[11px] font-semibold text-slate-500">

                        Dokumen

                    </span>

                </div>


                @if($registration->diploma_file)

                    <img
                        src="{{ asset('storage/'.$registration->diploma_file) }}"
                        class="h-64 w-full object-cover"
                        alt="Ijazah">

                    <div class="bg-white p-4">

                        <a
                            href="{{ asset('storage/'.$registration->diploma_file) }}"
                            target="_blank"
                            class="inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                            Lihat Ijazah

                        </a>

                    </div>

                @else

                    <div
                        class="flex h-64 items-center justify-center bg-slate-100 text-sm text-slate-400">

                        Dokumen tidak tersedia

                    </div>

                @endif

            </div>



            {{-- PAS FOTO --}}
            <div
                class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50">

                <div
                    class="flex items-center justify-between border-b border-slate-200 bg-white px-5 py-4">

                    <div>

                        <h3 class="font-bold text-slate-800">

                            Pas Foto

                        </h3>

                        <p class="mt-1 text-xs text-slate-400">

                            Foto peserta

                        </p>

                    </div>

                    <span
                        class="rounded-lg bg-slate-100 px-2.5 py-1 text-[11px] font-semibold text-slate-500">

                        Dokumen

                    </span>

                </div>


                @if($registration->photo_file)

                    <img
                        src="{{ asset('storage/'.$registration->photo_file) }}"
                        class="h-64 w-full object-cover"
                        alt="Pas Foto">

                    <div class="bg-white p-4">

                        <a
                            href="{{ asset('storage/'.$registration->photo_file) }}"
                            target="_blank"
                            class="inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                            Lihat Pas Foto

                        </a>

                    </div>

                @else

                    <div
                        class="flex h-64 items-center justify-center bg-slate-100 text-sm text-slate-400">

                        Dokumen tidak tersedia

                    </div>

                @endif

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- ADMIN NOTE --}}
    {{-- ========================================================= --}}
    @if($registration->notes)

        <div
            class="rounded-3xl border border-blue-200 bg-blue-50 p-6 shadow-sm">

            <div class="flex items-start gap-4">

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-blue-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-4l-4 4v-4z" />

                    </svg>

                </div>

                <div>

                    <h2 class="text-lg font-bold text-blue-800">

                        Catatan Admin

                    </h2>

                    <p class="mt-2 whitespace-pre-line text-sm leading-7 text-blue-700">

                        {{ $registration->notes }}

                    </p>

                </div>

            </div>

        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- BOTTOM ACTION --}}
    {{-- ========================================================= --}}
    <div
        class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-2 sm:flex-row sm:justify-between">

        <a
            href="{{ route('registrations.index') }}"
            class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">

            Kembali ke Data Pendaftar

        </a>

    </div>

</div>

@endsection