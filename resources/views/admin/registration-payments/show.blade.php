@extends('layouts.app')

@section('title', 'Detail Pembayaran')

@section('content')

<div class="space-y-8">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}
    <div
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-6 text-white shadow-xl">

        <div
            class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10 blur-3xl">
        </div>

        <div
            class="absolute -bottom-12 left-1/3 h-40 w-40 rounded-full bg-blue-400/10 blur-3xl">
        </div>

        <div
            class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <span
                    class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                    Payment Management

                </span>

                <h1
                    class="mt-4 text-3xl font-black tracking-tight">

                    Detail Pembayaran

                </h1>

                <p
                    class="mt-2 max-w-2xl text-sm leading-6 text-blue-100">

                    Informasi lengkap pembayaran dan data pendaftar
                    yang terkait dengan transaksi ini.

                </p>

            </div>


            <div>

                <a
                    href="{{ route('registration-payments.index') }}"
                    class="inline-flex items-center gap-2 rounded-2xl bg-white px-6 py-3 text-sm font-bold text-blue-700 shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-50 hover:shadow-xl">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                    </svg>

                    Kembali

                </a>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- PAYMENT SUMMARY --}}
    {{-- ========================================================= --}}
    <div class="grid gap-5 md:grid-cols-3">

        {{-- Status --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Status Pembayaran
                    </p>

                    <div class="mt-3">

                        @switch($payment->status)

                            @case('waiting_verification')

                                <span
                                    class="inline-flex items-center gap-2 rounded-full bg-amber-100 px-4 py-2 text-xs font-bold text-amber-700">

                                    <span
                                        class="h-2 w-2 rounded-full bg-amber-500">
                                    </span>

                                    Menunggu Verifikasi

                                </span>

                            @break

                            @case('verified')

                                <span
                                    class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-4 py-2 text-xs font-bold text-emerald-700">

                                    <span
                                        class="h-2 w-2 rounded-full bg-emerald-500">
                                    </span>

                                    Terverifikasi

                                </span>

                            @break

                            @case('rejected')

                                <span
                                    class="inline-flex items-center gap-2 rounded-full bg-red-100 px-4 py-2 text-xs font-bold text-red-700">

                                    <span
                                        class="h-2 w-2 rounded-full bg-red-500">
                                    </span>

                                    Ditolak

                                </span>

                            @break

                            @default

                                <span
                                    class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-xs font-bold text-slate-600">

                                    <span
                                        class="h-2 w-2 rounded-full bg-slate-400">
                                    </span>

                                    {{ ucfirst(str_replace('_', ' ', $payment->status)) }}

                                </span>

                        @endswitch

                    </div>

                </div>


                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 8c-2.21 0-4 1.12-4 2.5S9.79 13 12 13s4 1.12 4 2.5S14.21 18 12 18m0-10V6m0 12v-2m0-10a6 6 0 100 12 6 6 0 000-12z" />

                    </svg>

                </div>

            </div>

        </div>


        {{-- Nominal --}}
        <div
            class="rounded-3xl border border-blue-200 bg-blue-50 p-6 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-blue-700">
                        Nominal Pembayaran
                    </p>

                    <h2
                        class="mt-3 text-2xl font-black text-blue-700">

                        Rp {{ number_format($payment->amount, 0, ',', '.') }}

                    </h2>

                </div>


                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/80 text-blue-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2m-3-3h9m0 0l-3-3m3 3l-3 3" />

                    </svg>

                </div>

            </div>

        </div>


        {{-- Metode --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Metode Pembayaran
                    </p>

                    <h2
                        class="mt-3 text-xl font-black uppercase text-slate-800">

                        {{ $payment->payment_method ?: '-' }}

                    </h2>

                </div>


                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-slate-100 text-slate-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 10h18M7 15h.01M11 15h2m-8 4h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />

                    </svg>

                </div>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- PARTICIPANT & PROGRAM --}}
    {{-- ========================================================= --}}
    <div class="grid gap-6 lg:grid-cols-3">

        {{-- Informasi Peserta --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm lg:col-span-2">

            <div
                class="border-b border-slate-200 px-8 py-6">

                <h2
                    class="text-xl font-bold text-slate-900">

                    Informasi Peserta

                </h2>

                <p
                    class="mt-1 text-sm text-slate-500">

                    Data pendaftar yang melakukan pembayaran.

                </p>

            </div>


            <div class="grid gap-6 p-8 md:grid-cols-2">

                {{-- Nomor Registrasi --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Nomor Registrasi
                    </p>

                    <p
                        class="mt-2 font-bold text-blue-700">

                        {{ $payment->registration->registration_number }}

                    </p>

                </div>


                {{-- Nama --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Nama Lengkap
                    </p>

                    <p
                        class="mt-2 font-bold text-slate-800">

                        {{ $payment->registration->full_name }}

                    </p>

                </div>


                {{-- Email --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Email
                    </p>

                    <p
                        class="mt-2 break-all font-semibold text-slate-700">

                        {{ $payment->registration->email ?: '-' }}

                    </p>

                </div>


                {{-- Nomor HP --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Nomor HP
                    </p>

                    <p
                        class="mt-2 font-semibold text-slate-700">

                        {{ $payment->registration->phone ?: '-' }}

                    </p>

                </div>


                {{-- Kota --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Kota
                    </p>

                    <p
                        class="mt-2 font-semibold text-slate-700">

                        {{ $payment->registration->city ?: '-' }}

                    </p>

                </div>


                {{-- Jenis Kelamin --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Jenis Kelamin
                    </p>

                    <p
                        class="mt-2 font-semibold text-slate-700">

                        {{ $payment->registration->gender ?: '-' }}

                    </p>

                </div>

            </div>

        </div>


        {{-- Program --}}
        <div
            class="overflow-hidden rounded-3xl border border-blue-200 bg-gradient-to-br from-blue-50 via-white to-indigo-50 shadow-sm">

            <div
                class="border-b border-blue-100 px-7 py-6">

                <h2
                    class="text-xl font-bold text-slate-900">

                    Program

                </h2>

                <p
                    class="mt-1 text-sm text-slate-500">

                    Program yang dipilih peserta.

                </p>

            </div>


            <div class="space-y-7 p-7">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Nama Program
                    </p>

                    <p
                        class="mt-2 text-lg font-black leading-7 text-blue-700">

                        {{ $payment->registration->courseClass->name }}

                    </p>

                </div>


                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Biaya Pendaftaran
                    </p>

                    <p
                        class="mt-2 text-2xl font-black text-slate-800">

                        Rp {{ number_format($payment->registration->courseClass->registration_fee, 0, ',', '.') }}

                    </p>

                </div>


                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                        Durasi
                    </p>

                    <p
                        class="mt-2 font-semibold text-slate-700">

                        {{ $payment->registration->courseClass->duration ?: '-' }}

                    </p>

                </div>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- PAYMENT PROOF --}}
    {{-- ========================================================= --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div
            class="border-b border-slate-200 px-8 py-6">

            <h2
                class="text-xl font-bold text-slate-900">

                Bukti Pembayaran

            </h2>

            <p
                class="mt-1 text-sm text-slate-500">

                Dokumen pembayaran yang dikirim oleh peserta.

            </p>

        </div>


        <div class="p-8">

            @if ($payment->payment_proof)

                <div
                    class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-100">

                    {{-- JANGAN UBAH BAGIAN INI --}}
                    <img
                        src="{{ Storage::url($payment->payment_proof) }}"
                        alt="Bukti pembayaran {{ $payment->registration->full_name }}"
                        class="mx-auto max-h-[700px] w-full object-contain">

                </div>


                <div class="mt-5 flex flex-col gap-3 sm:flex-row">

                    <a
                        href="{{ Storage::url($payment->payment_proof) }}"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4m-4-8h6m0 0v6m0-6L10 14" />

                        </svg>

                        Lihat Bukti Pembayaran

                    </a>

                </div>

            @else

                <div
                    class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-slate-300 py-16 text-center">

                    <div
                        class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                        <svg
                            class="h-7 w-7"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 7h4l2-2h6l2 2h4v12H3V7z" />

                            <circle
                                cx="12"
                                cy="13"
                                r="3" />

                        </svg>

                    </div>

                    <p
                        class="mt-4 font-semibold text-slate-700">

                        Bukti pembayaran belum tersedia

                    </p>

                    <p
                        class="mt-1 text-sm text-slate-500">

                        Peserta belum mengunggah bukti pembayaran.

                    </p>

                </div>

            @endif

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- PAYMENT INFORMATION --}}
    {{-- ========================================================= --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div
            class="border-b border-slate-200 px-8 py-6">

            <h2
                class="text-xl font-bold text-slate-900">

                Informasi Pembayaran

            </h2>

            <p
                class="mt-1 text-sm text-slate-500">

                Informasi waktu dan status transaksi pembayaran.

            </p>

        </div>


        <div class="grid gap-6 p-8 md:grid-cols-2">

            {{-- Dibuat --}}
            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                    Dibuat Pada
                </p>

                <p class="mt-2 font-semibold text-slate-800">

                    {{ $payment->created_at?->format('d F Y, H:i') ?? '-' }}

                </p>

            </div>


            {{-- Diperbarui --}}
            <div>

                <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                    Terakhir Diperbarui
                </p>

                <p class="mt-2 font-semibold text-slate-800">

                    {{ $payment->updated_at?->format('d F Y, H:i') ?? '-' }}

                </p>

            </div>

        </div>

    </div>

</div>

@endsection