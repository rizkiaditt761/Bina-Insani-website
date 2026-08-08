@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 p-8 text-white shadow-xl">

        {{-- Decorative --}}
        <div
            class="absolute -right-16 -top-20 h-64 w-64 rounded-full bg-blue-400/20 blur-3xl">
        </div>

        <div
            class="absolute -bottom-20 left-1/3 h-48 w-48 rounded-full bg-indigo-400/10 blur-3xl">
        </div>


        <div
            class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <span
                    class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.25em] text-blue-100">

                    Admin Dashboard

                </span>


                <h1
                    class="mt-4 text-3xl font-black tracking-tight sm:text-4xl">

                    Selamat Datang, Admin 👋

                </h1>


                <p
                    class="mt-3 max-w-2xl text-sm leading-7 text-blue-100">

                    Pantau pendaftaran, pembayaran, program pelatihan,
                    dan aktivitas website LPK Bina Insani dari satu tempat.

                </p>

            </div>


            <div class="shrink-0">

                <a
                    href="{{ route('registrations.index') }}"
                    class="inline-flex items-center gap-2 rounded-2xl bg-white px-6 py-3.5 text-sm font-bold text-blue-700 shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-50">

                    <span class="text-base">
                        👥
                    </span>

                    Lihat Pendaftar

                </a>

            </div>

        </div>

    </div>





    {{-- =========================================================
        STATISTIK UTAMA
    ========================================================== --}}
    <div
        class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">


        {{-- Total Pendaftar --}}
        <div
            class="rounded-3xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

            <div
                class="flex items-start justify-between">

                <div>

                    <p
                        class="text-sm font-semibold text-blue-600">

                        Total Pendaftar

                    </p>


                    <h2
                        class="mt-3 text-3xl font-black text-slate-900">

                        {{ $totalRegistrations }}

                    </h2>

                </div>


                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-600 text-xl text-white shadow-lg shadow-blue-200">

                    👥

                </div>

            </div>


            <div
                class="mt-5 border-t border-blue-100 pt-4">

                <a
                    href="{{ route('registrations.index') }}"
                    class="text-xs font-bold text-blue-600 transition hover:text-blue-800">

                    Lihat semua pendaftar →

                </a>

            </div>

        </div>




        {{-- Menunggu Pembayaran --}}
        <div
            class="rounded-3xl border border-amber-100 bg-gradient-to-br from-amber-50 to-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

            <div
                class="flex items-start justify-between">

                <div>

                    <p
                        class="text-sm font-semibold text-amber-600">

                        Menunggu Pembayaran

                    </p>


                    <h2
                        class="mt-3 text-3xl font-black text-slate-900">

                        {{ $waitingPayment }}

                    </h2>

                </div>


                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-500 text-xl text-white shadow-lg shadow-amber-200">

                    💰

                </div>

            </div>


            <div
                class="mt-5 border-t border-amber-100 pt-4">

                <span
                    class="text-xs font-medium text-slate-500">

                    Pendaftar belum menyelesaikan pembayaran

                </span>

            </div>

        </div>




        {{-- Menunggu Verifikasi --}}
        <div
            class="rounded-3xl border border-violet-100 bg-gradient-to-br from-violet-50 to-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

            <div
                class="flex items-start justify-between">

                <div>

                    <p
                        class="text-sm font-semibold text-violet-600">

                        Menunggu Verifikasi

                    </p>


                    <h2
                        class="mt-3 text-3xl font-black text-slate-900">

                        {{ $waitingVerification }}

                    </h2>

                </div>


                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-violet-600 text-xl text-white shadow-lg shadow-violet-200">

                    🔍

                </div>

            </div>


            <div
                class="mt-5 border-t border-violet-100 pt-4">

                <span
                    class="text-xs font-medium text-slate-500">

                    Pembayaran membutuhkan pemeriksaan admin

                </span>

            </div>

        </div>




        {{-- Pendaftar Diterima --}}
        <div
            class="rounded-3xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

            <div
                class="flex items-start justify-between">

                <div>

                    <p
                        class="text-sm font-semibold text-emerald-600">

                        Pendaftar Diterima

                    </p>


                    <h2
                        class="mt-3 text-3xl font-black text-slate-900">

                        {{ $acceptedRegistrations }}

                    </h2>

                </div>


                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-600 text-xl text-white shadow-lg shadow-emerald-200">

                    ✓

                </div>

            </div>


            <div
                class="mt-5 border-t border-emerald-100 pt-4">

                <span
                    class="text-xs font-medium text-slate-500">

                    Pendaftaran yang sudah diterima

                </span>

            </div>

        </div>

    </div>
        {{-- =========================================================
        ANALYTICS
    ========================================================== --}}
    <div
        class="grid gap-6 xl:grid-cols-3">


        {{-- =====================================================
            GRAFIK PENDAFTARAN
        ====================================================== --}}
        <div
            class="xl:col-span-2 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

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


            <div
                class="p-6">

                <div
                    class="relative h-[300px]">

                    <canvas id="registrationChart"></canvas>

                </div>

            </div>

        </div>




        {{-- =====================================================
            RINGKASAN OPERASIONAL
        ====================================================== --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white shadow-sm">

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


            <div
                class="divide-y divide-slate-100">


                {{-- Payment Verified --}}
                <div
                    class="flex items-center justify-between px-6 py-5">

                    <div
                        class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

                            ✓

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

                        {{ $verifiedPayments }}

                    </span>

                </div>




                {{-- Payment Rejected --}}
                <div
                    class="flex items-center justify-between px-6 py-5">

                    <div
                        class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-100 text-red-600">

                            !

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

                        {{ $rejectedPayments }}

                    </span>

                </div>




                {{-- Program --}}
                <div
                    class="flex items-center justify-between px-6 py-5">

                    <div
                        class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">

                            🎓

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

                        {{ $totalClasses }}

                    </span>

                </div>




                {{-- Gallery --}}
                <div
                    class="flex items-center justify-between px-6 py-5">

                    <div
                        class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-pink-100 text-pink-600">

                            🖼️

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

                        {{ $totalGalleries }}

                    </span>

                </div>


            </div>

        </div>

    </div>




    {{-- =========================================================
        CHART SCRIPT
    ========================================================== --}}
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

                        datasets: [{
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
                        }]

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
        {{-- =========================================================
        AKTIVITAS TERBARU
    ========================================================== --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div
            class="flex flex-col gap-3 border-b border-slate-200 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

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


            <a
                href="{{ route('activities.index') }}"
                class="inline-flex w-fit items-center gap-2 rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 transition hover:border-blue-500 hover:text-blue-600">

                Lihat Semua

                <span>
                    →
                </span>

            </a>

        </div>




        <div class="divide-y divide-slate-100">

            @forelse($recentActivities as $activity)

                <div
                    class="flex flex-col gap-4 px-6 py-5 transition hover:bg-slate-50 sm:flex-row sm:items-center sm:justify-between">

                    {{-- Activity Info --}}
                    <div
                        class="flex min-w-0 items-start gap-4">

                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-lg text-blue-600">

                            ●

                        </div>


                        <div class="min-w-0">

                            <div
                                class="flex flex-wrap items-center gap-2">

                                <span
                                    class="text-sm font-bold text-slate-800">

                                    {{ $activity->user->name ?? 'System' }}

                                </span>


                                @if($activity->module)

                                    <span
                                        class="rounded-full bg-slate-100 px-2.5 py-1 text-[11px] font-semibold text-slate-600">

                                        {{ ucfirst($activity->module) }}

                                    </span>

                                @endif

                            </div>


                            <p
                                class="mt-1 text-sm leading-6 text-slate-600">

                                {{ $activity->description ?? $activity->action ?? 'Melakukan aktivitas' }}

                            </p>

                        </div>

                    </div>




                    {{-- Time --}}
                    <div
                        class="shrink-0 text-left sm:text-right">

                        <p
                            class="text-xs font-semibold text-slate-500">

                            {{ $activity->created_at->format('d M Y') }}

                        </p>

                        <p
                            class="mt-1 text-xs text-slate-400">

                            {{ $activity->created_at->format('H:i') }} WIB

                        </p>

                    </div>

                </div>

            @empty

                <div
                    class="px-6 py-16 text-center">

                    <div
                        class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-2xl">

                        📋

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

    </div>




    {{-- =========================================================
        QUICK ACTIONS
    ========================================================== --}}
    <div>

        <div class="mb-4">

            <h2
                class="text-lg font-bold text-slate-900">

                Akses Cepat

            </h2>

            <p
                class="mt-1 text-sm text-slate-500">

                Akses beberapa bagian admin yang sering digunakan.

            </p>

        </div>


        <div
            class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">


            {{-- Registrations --}}
            <a
                href="{{ route('registrations.index') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-md">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 text-lg">

                    👥

                </div>


                <h3
                    class="mt-4 font-bold text-slate-800">

                    Pendaftar

                </h3>


                <p
                    class="mt-1 text-xs leading-5 text-slate-500">

                    Kelola data pendaftar.

                </p>

            </a>




            {{-- Payments --}}
            <a
                href="{{ route('registration-payments.index') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-emerald-200 hover:shadow-md">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-100 text-lg">

                    💳

                </div>


                <h3
                    class="mt-4 font-bold text-slate-800">

                    Pembayaran

                </h3>


                <p
                    class="mt-1 text-xs leading-5 text-slate-500">

                    Periksa dan verifikasi pembayaran.

                </p>

            </a>




            {{-- Classes --}}
            <a
                href="{{ route('classes.index') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-violet-200 hover:shadow-md">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-100 text-lg">

                    🎓

                </div>


                <h3
                    class="mt-4 font-bold text-slate-800">

                    Program

                </h3>


                <p
                    class="mt-1 text-xs leading-5 text-slate-500">

                    Kelola program pelatihan.

                </p>

            </a>




            {{-- FAQ --}}
            <a
                href="{{ route('faqs.index') }}"
                class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-amber-200 hover:shadow-md">

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-lg">

                    ❓

                </div>


                <h3
                    class="mt-4 font-bold text-slate-800">

                    FAQ

                </h3>


                <p
                    class="mt-1 text-xs leading-5 text-slate-500">

                    Kelola pertanyaan dan jawaban.

                </p>

            </a>

        </div>

    </div>

</div>

@endsection