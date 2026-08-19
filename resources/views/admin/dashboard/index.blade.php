@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <section
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-950 via-blue-950 to-indigo-950 p-6 text-white shadow-xl sm:p-8">

        {{-- Decorative Background --}}
        <div
            class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-blue-400/10 blur-3xl">
        </div>

        <div
            class="absolute -bottom-24 left-1/3 h-56 w-56 rounded-full bg-indigo-400/10 blur-3xl">
        </div>

        <div
            class="absolute right-1/4 top-1/2 h-32 w-32 rounded-full bg-white/5 blur-2xl">
        </div>


        <div
            class="relative flex flex-col gap-7 lg:flex-row lg:items-center lg:justify-between">

            <div class="max-w-3xl">

                <span
                    class="inline-flex items-center rounded-full border border-white/10 bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.22em] text-blue-100 backdrop-blur">

                    Admin Dashboard

                </span>


                <h1
                    class="mt-4 text-3xl font-black tracking-tight sm:text-4xl">

                    Selamat Datang, Admin

                </h1>


                <p
                    class="mt-3 max-w-2xl text-sm leading-7 text-blue-100 sm:text-base">

                    Pantau pendaftaran, pembayaran, program pelatihan,
                    dan aktivitas website LPK Bina Insani dari satu tempat.

                </p>

            </div>


            <div class="shrink-0">

                <a
                    href="{{ route('registrations.index') }}"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-white px-6 py-3.5 text-sm font-bold text-blue-700 shadow-lg transition duration-300 hover:-translate-y-0.5 hover:bg-blue-50 hover:shadow-xl sm:w-auto">

                    {{-- Users Icon --}}
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
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8zm6 0a3 3 0 100-6 3 3 0 000 6z"/>

                    </svg>

                    Lihat Pendaftar

                </a>

            </div>

        </div>

    </section>


    {{-- =========================================================
        MAIN STATISTICS
    ========================================================== --}}
    <section>

        <div
            class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">


            {{-- Total Registrations --}}
            <div
                class="group relative overflow-hidden rounded-3xl border border-blue-100 bg-gradient-to-br from-blue-50 via-white to-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div
                    class="absolute -right-10 -top-10 h-28 w-28 rounded-full bg-blue-100/70 transition duration-500 group-hover:scale-125">
                </div>


                <div class="relative">

                    <div
                        class="flex items-start justify-between">

                        <div>

                            <p
                                class="text-sm font-semibold text-blue-600">

                                Total Pendaftar

                            </p>


                            <h2
                                class="mt-3 text-3xl font-black tracking-tight text-slate-900">

                                {{ number_format($totalRegistrations) }}

                            </h2>

                        </div>


                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-200">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8zm6 0a3 3 0 100-6 3 3 0 000 6z"/>

                            </svg>

                        </div>

                    </div>


                    <div
                        class="mt-5 border-t border-blue-100 pt-4">

                        <a
                            href="{{ route('registrations.index') }}"
                            class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 transition hover:text-blue-800">

                            Lihat semua pendaftar

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-3.5 w-3.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 5l7 7-7 7"/>

                            </svg>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Waiting Payment --}}
            <div
                class="group relative overflow-hidden rounded-3xl border border-amber-100 bg-gradient-to-br from-amber-50 via-white to-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div
                    class="absolute -right-10 -top-10 h-28 w-28 rounded-full bg-amber-100/70 transition duration-500 group-hover:scale-125">
                </div>


                <div class="relative">

                    <div
                        class="flex items-start justify-between">

                        <div>

                            <p
                                class="text-sm font-semibold text-amber-600">

                                Menunggu Pembayaran

                            </p>


                            <h2
                                class="mt-3 text-3xl font-black tracking-tight text-slate-900">

                                {{ number_format($waitingPayment) }}

                            </h2>

                        </div>


                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-500 text-white shadow-lg shadow-amber-200">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2m4-6h-5a2 2 0 000 4h5m0-4v4"/>

                            </svg>

                        </div>

                    </div>


                    <div
                        class="mt-5 border-t border-amber-100 pt-4">

                        <p
                            class="text-xs leading-5 text-slate-500">

                            Pendaftar belum menyelesaikan pembayaran.

                        </p>

                    </div>

                </div>

            </div>


            {{-- Waiting Verification --}}
            <div
                class="group relative overflow-hidden rounded-3xl border border-violet-100 bg-gradient-to-br from-violet-50 via-white to-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div
                    class="absolute -right-10 -top-10 h-28 w-28 rounded-full bg-violet-100/70 transition duration-500 group-hover:scale-125">
                </div>


                <div class="relative">

                    <div
                        class="flex items-start justify-between">

                        <div>

                            <p
                                class="text-sm font-semibold text-violet-600">

                                Menunggu Verifikasi

                            </p>


                            <h2
                                class="mt-3 text-3xl font-black tracking-tight text-slate-900">

                                {{ number_format($waitingVerification) }}

                            </h2>

                        </div>


                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-violet-600 text-white shadow-lg shadow-violet-200">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z"/>

                            </svg>

                        </div>

                    </div>


                    <div
                        class="mt-5 border-t border-violet-100 pt-4">

                        <p
                            class="text-xs leading-5 text-slate-500">

                            Pembayaran membutuhkan pemeriksaan admin.

                        </p>

                    </div>

                </div>

            </div>


            {{-- Accepted --}}
            <div
                class="group relative overflow-hidden rounded-3xl border border-emerald-100 bg-gradient-to-br from-emerald-50 via-white to-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div
                    class="absolute -right-10 -top-10 h-28 w-28 rounded-full bg-emerald-100/70 transition duration-500 group-hover:scale-125">
                </div>


                <div class="relative">

                    <div
                        class="flex items-start justify-between">

                        <div>

                            <p
                                class="text-sm font-semibold text-emerald-600">

                                Pendaftar Diterima

                            </p>


                            <h2
                                class="mt-3 text-3xl font-black tracking-tight text-slate-900">

                                {{ number_format($acceptedRegistrations) }}

                            </h2>

                        </div>


                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-600 text-white shadow-lg shadow-emerald-200">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 13l4 4L19 7"/>

                            </svg>

                        </div>

                    </div>


                    <div
                        class="mt-5 border-t border-emerald-100 pt-4">

                        <p
                            class="text-xs leading-5 text-slate-500">

                            Pendaftaran yang sudah diterima.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        ANALYTICS
    ========================================================== --}}
    <section
        class="grid gap-6 xl:grid-cols-3">


        {{-- Registration Chart --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm xl:col-span-2">

            <div
                class="flex flex-col gap-3 border-b border-slate-200 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h2
                        class="text-lg font-bold text-slate-900">

                        Tren Pendaftaran

                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500">

                        Jumlah pendaftar selama 7 hari terakhir.

                    </p>

                </div>


                <div
                    class="inline-flex w-fit items-center gap-2 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">

                    <span
                        class="h-2 w-2 rounded-full bg-blue-600">
                    </span>

                    7 Hari Terakhir

                </div>

            </div>


            <div class="p-6">

                <div class="relative h-[300px]">

                    <canvas id="registrationChart"></canvas>

                </div>

            </div>

        </div>


        {{-- Operational Summary --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

            <div
                class="border-b border-slate-200 px-6 py-5">

                <h2
                    class="text-lg font-bold text-slate-900">

                    Ringkasan Operasional

                </h2>

                <p
                    class="mt-1 text-sm text-slate-500">

                    Kondisi data utama website saat ini.

                </p>

            </div>


            <div class="divide-y divide-slate-100">


                {{-- Verified --}}
                <div
                    class="flex items-center justify-between px-6 py-5">

                    <div
                        class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

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
                                    d="M5 13l4 4L19 7"/>

                            </svg>

                        </div>


                        <div>

                            <p
                                class="text-sm font-semibold text-slate-800">

                                Payment Verified

                            </p>

                            <p
                                class="text-xs text-slate-500">

                                Pembayaran terverifikasi

                            </p>

                        </div>

                    </div>


                    <span
                        class="text-xl font-black text-slate-900">

                        {{ number_format($verifiedPayments) }}

                    </span>

                </div>


                {{-- Rejected --}}
                <div
                    class="flex items-center justify-between px-6 py-5">

                    <div
                        class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">

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
                                    d="M6 18L18 6M6 6l12 12"/>

                            </svg>

                        </div>


                        <div>

                            <p
                                class="text-sm font-semibold text-slate-800">

                                Payment Ditolak

                            </p>

                            <p
                                class="text-xs text-slate-500">

                                Pembayaran ditolak admin

                            </p>

                        </div>

                    </div>


                    <span
                        class="text-xl font-black text-slate-900">

                        {{ number_format($rejectedPayments) }}

                    </span>

                </div>


                {{-- Classes --}}
                <div
                    class="flex items-center justify-between px-6 py-5">

                    <div
                        class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">

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
                                    d="M12 14l9-5-9-5-9 5 9 5z"/>

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 14l6.16-3.42A12.083 12.083 0 0118 15.5c0 2.485-2.686 4.5-6 4.5s-6-2.015-6-4.5c0-.536.08-1.057.23-1.55L12 14z"/>

                            </svg>

                        </div>


                        <div>

                            <p
                                class="text-sm font-semibold text-slate-800">

                                Program Pelatihan

                            </p>

                            <p
                                class="text-xs text-slate-500">

                                Program yang tersedia

                            </p>

                        </div>

                    </div>


                    <span
                        class="text-xl font-black text-slate-900">

                        {{ number_format($totalClasses) }}

                    </span>

                </div>


                {{-- Gallery --}}
                <div
                    class="flex items-center justify-between px-6 py-5">

                    <div
                        class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-pink-100 text-pink-600">

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
                                    d="M4 16l4-4a3 3 0 014 0l4 4m0 0l2-2a3 3 0 014 0l1 1M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1zm3-10h.01"/>

                            </svg>

                        </div>


                        <div>

                            <p
                                class="text-sm font-semibold text-slate-800">

                                Dokumentasi Gallery

                            </p>

                            <p
                                class="text-xs text-slate-500">

                                Total dokumentasi

                            </p>

                        </div>

                    </div>


                    <span
                        class="text-xl font-black text-slate-900">

                        {{ number_format($totalGalleries) }}

                    </span>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        RECENT ACTIVITIES
    ========================================================== --}}
    <section
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div
            class="flex flex-col gap-3 border-b border-slate-200 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

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
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                        </svg>

                    </div>


                    <div>

                        <h2
                            class="text-lg font-bold text-slate-900">

                            Aktivitas Terbaru

                        </h2>

                        <p
                            class="mt-1 text-sm text-slate-500">

                            Aktivitas terakhir yang dilakukan pada admin panel.

                        </p>

                    </div>

                </div>

            </div>


            <a
                href="{{ route('activities.index') }}"
                class="inline-flex w-fit items-center gap-2 rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 transition hover:border-blue-500 hover:text-blue-600">

                Lihat Semua

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 5l7 7-7 7"/>

                </svg>

            </a>

        </div>


        <div class="divide-y divide-slate-100">

            @forelse($recentActivities as $activity)

                @php
                    $action = strtolower($activity->action ?? '');

                    $activityStyle = match ($action) {
                        'create' => [
                            'bg' => 'bg-emerald-100',
                            'text' => 'text-emerald-600',
                            'dot' => 'bg-emerald-500',
                        ],

                        'update' => [
                            'bg' => 'bg-amber-100',
                            'text' => 'text-amber-600',
                            'dot' => 'bg-amber-500',
                        ],

                        'delete' => [
                            'bg' => 'bg-red-100',
                            'text' => 'text-red-600',
                            'dot' => 'bg-red-500',
                        ],

                        'login' => [
                            'bg' => 'bg-blue-100',
                            'text' => 'text-blue-600',
                            'dot' => 'bg-blue-500',
                        ],

                        default => [
                            'bg' => 'bg-slate-100',
                            'text' => 'text-slate-600',
                            'dot' => 'bg-slate-500',
                        ],
                    };
                @endphp


                <div
                    class="group flex flex-col gap-4 px-6 py-5 transition duration-200 hover:bg-slate-50 sm:flex-row sm:items-center sm:justify-between">

                    <div
                        class="flex min-w-0 items-start gap-4">

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl {{ $activityStyle['bg'] }} {{ $activityStyle['text'] }}">

                            <span
                                class="h-2.5 w-2.5 rounded-full {{ $activityStyle['dot'] }}">
                            </span>

                        </div>


                        <div class="min-w-0">

                            <div
                                class="flex flex-wrap items-center gap-2">

                                <span
                                    class="text-sm font-bold text-slate-800">

                                    {{ $activity->user?->name ?? 'System' }}

                                </span>


                                @if($activity->module)

                                    <span
                                        class="rounded-full bg-slate-100 px-2.5 py-1 text-[11px] font-semibold text-slate-600">

                                        {{ ucfirst($activity->module) }}

                                    </span>

                                @endif


                                @if($activity->action)

                                    <span
                                        class="rounded-full {{ $activityStyle['bg'] }} px-2.5 py-1 text-[11px] font-bold uppercase {{ $activityStyle['text'] }}">

                                        {{ $activity->action }}

                                    </span>

                                @endif

                            </div>


                            <p
                                class="mt-1 line-clamp-2 text-sm leading-6 text-slate-600">

                                {{ $activity->description ?? 'Melakukan aktivitas pada sistem.' }}

                            </p>

                        </div>

                    </div>


                    <div
                        class="shrink-0 pl-15 text-left sm:pl-0 sm:text-right">

                        @if($activity->created_at)

                            <p
                                class="text-xs font-semibold text-slate-600">

                                {{ $activity->created_at->format('d M Y') }}

                            </p>

                            <p
                                class="mt-1 text-xs text-slate-400">

                                {{ $activity->created_at->format('H:i') }} WIB

                            </p>

                        @else

                            <span class="text-xs text-slate-400">
                                -
                            </span>

                        @endif

                    </div>

                </div>

            @empty

                <div
                    class="px-6 py-16 text-center">

                    <div
                        class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-8 w-8"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.7">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>

                        </svg>

                    </div>


                    <h3
                        class="mt-4 font-bold text-slate-800">

                        Belum Ada Aktivitas

                    </h3>


                    <p
                        class="mt-1 text-sm text-slate-500">

                        Aktivitas admin akan muncul di sini.

                    </p>

                </div>

            @endforelse

        </div>

    </section>


    {{-- =========================================================
        QUICK ACTIONS
    ========================================================== --}}
    <section>

        <div class="mb-5">

            <div class="flex items-center gap-3">

                <div
                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600">

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
                            d="M13 10V3L4 14h7v7l9-11h-7z"/>

                    </svg>

                </div>


                <div>

                    <h2
                        class="text-lg font-bold text-slate-900">

                        Akses Cepat

                    </h2>

                    <p
                        class="mt-1 text-sm text-slate-500">

                        Akses beberapa bagian admin yang sering digunakan.

                    </p>

                </div>

            </div>

        </div>


        <div
            class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">


            {{-- Registrations --}}
            <a
                href="{{ route('registrations.index') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-blue-600">

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
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8zm6 0a3 3 0 100-6 3 3 0 000 6z"/>

                    </svg>

                </div>


                <div
                    class="mt-4 flex items-center justify-between">

                    <h3
                        class="font-bold text-slate-800">

                        Pendaftar

                    </h3>

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 text-slate-300 transition group-hover:translate-x-1 group-hover:text-blue-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5l7 7-7 7"/>

                    </svg>

                </div>


                <p
                    class="mt-1 text-xs leading-5 text-slate-500">

                    Kelola data pendaftar.

                </p>

            </a>


            {{-- Payments --}}
            <a
                href="{{ route('registration-payments.index') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

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
                            d="M3 10h18M7 15h2m2 0h2m-8 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>

                    </svg>

                </div>


                <div
                    class="mt-4 flex items-center justify-between">

                    <h3
                        class="font-bold text-slate-800">

                        Pembayaran

                    </h3>

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 text-slate-300 transition group-hover:translate-x-1 group-hover:text-emerald-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5l7 7-7 7"/>

                    </svg>

                </div>


                <p
                    class="mt-1 text-xs leading-5 text-slate-500">

                    Periksa dan verifikasi pembayaran.

                </p>

            </a>


            {{-- Classes --}}
            <a
                href="{{ route('classes.index') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-violet-200 hover:shadow-lg">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-100 text-violet-600">

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
                            d="M12 14l9-5-9-5-9 5 9 5z"/>

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 14l6.16-3.42A12.083 12.083 0 0118 15.5c0 2.485-2.686 4.5-6 4.5s-6-2.015-6-4.5c0-.536.08-1.057.23-1.55L12 14z"/>

                    </svg>

                </div>


                <div
                    class="mt-4 flex items-center justify-between">

                    <h3
                        class="font-bold text-slate-800">

                        Program

                    </h3>

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 text-slate-300 transition group-hover:translate-x-1 group-hover:text-violet-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5l7 7-7 7"/>

                    </svg>

                </div>


                <p
                    class="mt-1 text-xs leading-5 text-slate-500">

                    Kelola program pelatihan.

                </p>

            </a>


            {{-- FAQ --}}
            <a
                href="{{ route('faqs.index') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-amber-200 hover:shadow-lg">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

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
                            d="M8.228 9.247a4.5 4.5 0 117.544 0c-.47.64-1.11 1.153-1.772 1.55-.9.54-1.5 1.48-1.5 2.553V14"/>

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 18h.01"/>

                    </svg>

                </div>


                <div
                    class="mt-4 flex items-center justify-between">

                    <h3
                        class="font-bold text-slate-800">

                        FAQ

                    </h3>

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 text-slate-300 transition group-hover:translate-x-1 group-hover:text-amber-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5l7 7-7 7"/>

                    </svg>

                </div>


                <p
                    class="mt-1 text-xs leading-5 text-slate-500">

                    Kelola pertanyaan dan jawaban.

                </p>

            </a>

        </div>

    </section>

</div>


{{-- =========================================================
    CHART SCRIPT
========================================================= --}}
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const canvas = document.getElementById('registrationChart');

    if (!canvas) {
        return;
    }


    const labels = @json($registrationChartLabels);

    const data = @json($registrationChartData);


    new Chart(canvas, {

        type: 'line',

        data: {

            labels: labels,

            datasets: [

                {

                    label: 'Pendaftar',

                    data: data,

                    borderColor: '#2563eb',

                    backgroundColor: 'rgba(37, 99, 235, 0.10)',

                    borderWidth: 3,

                    fill: true,

                    tension: 0.4,

                    pointBackgroundColor: '#2563eb',

                    pointBorderColor: '#ffffff',

                    pointBorderWidth: 3,

                    pointRadius: 5,

                    pointHoverRadius: 7

                }

            ]

        },


        options: {

            responsive: true,

            maintainAspectRatio: false,


            interaction: {

                intersect: false,

                mode: 'index'

            },


            plugins: {

                legend: {

                    display: false

                },


                tooltip: {

                    backgroundColor: '#0f172a',

                    titleColor: '#ffffff',

                    bodyColor: '#cbd5e1',

                    padding: 12,

                    cornerRadius: 10,

                    displayColors: false,


                    callbacks: {

                        label: function (context) {

                            return context.parsed.y + ' pendaftar';

                        }

                    }

                }

            },


            scales: {

                x: {

                    grid: {

                        display: false

                    },

                    border: {

                        display: false

                    },

                    ticks: {

                        color: '#64748b',

                        font: {

                            size: 11

                        }

                    }

                },


                y: {

                    beginAtZero: true,

                    border: {

                        display: false

                    },

                    grid: {

                        color: '#e2e8f0'

                    },

                    ticks: {

                        precision: 0,

                        color: '#64748b',

                        font: {

                            size: 11

                        }

                    }

                }

            }

        }

    });

});

</script>

@endpush

@endsection