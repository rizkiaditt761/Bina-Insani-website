@extends('layouts.app')

@section('title', 'Data Pendaftar')

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

                    Registration Management

                </span>

                <h1 class="mt-4 text-3xl font-black tracking-tight">

                    Data Pendaftar

                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-blue-100">

                    Kelola seluruh data peserta yang melakukan pendaftaran
                    program pelatihan di LPK Bina Insani.

                </p>

            </div>


            <div
                class="rounded-2xl border border-white/10 bg-white/10 px-6 py-5 backdrop-blur-sm">

                <p class="text-xs font-semibold uppercase tracking-wider text-blue-100">

                    Total Pendaftar

                </p>

                <h2 class="mt-2 text-4xl font-black">

                    {{ $total }}

                </h2>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- ALERT SUCCESS --}}
    {{-- ========================================================= --}}
    @if(session('success'))

        <div
            class="flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4">

            <div
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

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

                <p class="mt-1 text-sm text-emerald-700">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- ALERT ERROR --}}
    {{-- ========================================================= --}}
    @if(session('error'))

        <div
            class="flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 px-5 py-4">

            <div
                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">

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

            <div>

                <p class="text-sm font-bold text-red-800">
                    Terjadi Kesalahan
                </p>

                <p class="mt-1 text-sm leading-6 text-red-700">
                    {{ session('error') }}
                </p>

            </div>

        </div>

    @endif



    {{-- ========================================================= --}}
    {{-- SUMMARY --}}
    {{-- ========================================================= --}}
    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Total --}}
        <div
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Total Pendaftar
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-slate-800">
                        {{ $total }}
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
                            d="M17 20h5v-2a4 4 0 00-4-4h-1m-4 6H6a4 4 0 01-4-4v-2a4 4 0 014-4h7a4 4 0 014 4v2a4 4 0 01-4 4zM12 10a4 4 0 100-8 4 4 0 000 8z" />

                    </svg>

                </div>

            </div>

        </div>


        {{-- Waiting Payment --}}
        <div
            class="rounded-3xl border border-yellow-200 bg-yellow-50 p-6 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-yellow-700">
                        Menunggu Pembayaran
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-yellow-700">
                        {{ $waitingPayment }}
                    </h2>

                </div>

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/80 text-yellow-600">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />

                    </svg>

                </div>

            </div>

        </div>


        {{-- Waiting Verification --}}
        <div
            class="rounded-3xl border border-blue-200 bg-blue-50 p-6 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-blue-700">
                        Menunggu Verifikasi
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-blue-700">
                        {{ $waitingVerification }}
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
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 12c0 5.591 3.824 10.291 9 11.622C17.176 22.291 21 17.591 21 12c0-1.554-.295-3.04-.832-4.398" />

                    </svg>

                </div>

            </div>

        </div>


        {{-- Accepted --}}
        <div
            class="rounded-3xl border border-emerald-200 bg-emerald-50 p-6 shadow-sm">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-emerald-700">
                        Diterima
                    </p>

                    <h2 class="mt-3 text-3xl font-black text-emerald-700">
                        {{ $accepted }}
                    </h2>

                </div>

                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/80 text-emerald-600">

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

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- SEARCH & FILTER --}}
    {{-- ========================================================= --}}
    <div
        class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

        <div
            class="mb-4 flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h2 class="text-base font-bold text-slate-800">
                    Cari & Filter Pendaftar
                </h2>

                <p class="mt-1 text-xs text-slate-500">

                    Cari berdasarkan nama, nomor registrasi,
                    email, atau filter berdasarkan status.

                </p>

            </div>


            @if(request()->hasAny(['search', 'status']))

                <span
                    class="inline-flex w-fit items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-600">

                    Filter aktif

                </span>

            @endif

        </div>


        <form
            method="GET"
            action="{{ route('registrations.index') }}"
            class="grid gap-3 md:grid-cols-[minmax(0,1fr)_220px_auto_auto]">

            {{-- Search --}}
            <div class="relative">

                <div
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m21 21-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />

                    </svg>

                </div>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama, nomor registrasi, atau email..."
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">

            </div>


            {{-- Status --}}
            <select
                name="status"
                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-100">

                <option value="">
                    Semua Status
                </option>

                <option
                    value="waiting_payment"
                    @selected(request('status') === 'waiting_payment')>

                    Waiting Payment

                </option>

                <option
                    value="waiting_verification"
                    @selected(request('status') === 'waiting_verification')>

                    Waiting Verification

                </option>

                <option
                    value="accepted"
                    @selected(request('status') === 'accepted')>

                    Accepted

                </option>

                <option
                    value="rejected"
                    @selected(request('status') === 'rejected')>

                    Rejected

                </option>

                <option
                    value="cancelled"
                    @selected(request('status') === 'cancelled')>

                    Cancelled

                </option>

                <option
                    value="expired"
                    @selected(request('status') === 'expired')>

                    Expired

                </option>

            </select>


            {{-- Search Button --}}
            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                <svg
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m21 21-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />

                </svg>

                Cari

            </button>


            {{-- Reset --}}
            @if(request()->hasAny(['search', 'status']))

                <a
                    href="{{ route('registrations.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-400 hover:bg-slate-50">

                    Reset

                </a>

            @else

                <div class="hidden md:block"></div>

            @endif

        </form>

    </div>



    {{-- ========================================================= --}}
    {{-- TABLE --}}
    {{-- ========================================================= --}}
    <div
        class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- Table Header --}}
        <div
            class="flex flex-col gap-3 border-b border-slate-200 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h2 class="text-lg font-bold text-slate-800">
                    Daftar Pendaftar
                </h2>

                <p class="mt-1 text-sm text-slate-500">

                    Seluruh data peserta yang melakukan pendaftaran.

                </p>

            </div>


            <div
                class="text-xs font-medium text-slate-400">

                Menampilkan

                <span class="font-semibold text-slate-600">
                    {{ $registrations->firstItem() ?? 0 }}
                </span>

                -

                <span class="font-semibold text-slate-600">
                    {{ $registrations->lastItem() ?? 0 }}
                </span>

                dari

                <span class="font-semibold text-slate-600">
                    {{ $registrations->total() }}
                </span>

                pendaftar

            </div>

        </div>


        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th
                            class="px-6 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                            Peserta

                        </th>

                        <th
                            class="px-5 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                            Program

                        </th>

                        <th
                            class="px-5 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                            Pendidikan

                        </th>

                        <th
                            class="px-5 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                            Status

                        </th>

                        <th
                            class="px-6 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-slate-500">

                            Aksi

                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($registrations as $registration)

                        <tr
                            class="transition duration-200 hover:bg-slate-50">

                            {{-- Peserta --}}
                            <td class="px-6 py-4 align-top">

                                <div class="flex items-start gap-3">

                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-sm font-bold text-blue-600">

                                        {{ strtoupper(substr($registration->full_name, 0, 1)) }}

                                    </div>

                                    <div class="min-w-0">

                                        <div class="text-sm font-semibold text-slate-800">

                                            {{ $registration->full_name }}

                                        </div>

                                        <div
                                            class="mt-1 text-xs font-medium text-blue-600">

                                            {{ $registration->registration_number }}

                                        </div>

                                        <div
                                            class="mt-1 max-w-xs truncate text-xs text-slate-500">

                                            {{ $registration->email }}

                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- Program --}}
                            <td class="px-5 py-4 align-middle">

                                <div class="max-w-xs">

                                    <div class="text-sm font-semibold text-slate-800">

                                        {{ $registration->courseClass->name ?? '-' }}

                                    </div>

                                    @if($registration->courseClass)

                                        <div
                                            class="mt-1 text-xs text-slate-500">

                                            Rp
                                            {{ number_format($registration->courseClass->registration_fee, 0, ',', '.') }}

                                        </div>

                                    @endif

                                </div>

                            </td>


                            {{-- Pendidikan --}}
                            <td class="px-5 py-4 align-middle">

                                <div class="text-sm font-medium text-slate-700">

                                    {{ $registration->last_education ?: '-' }}

                                </div>

                                @if($registration->school_name)

                                    <div
                                        class="mt-1 max-w-xs truncate text-xs text-slate-500">

                                        {{ $registration->school_name }}

                                    </div>

                                @endif

                            </td>


                            {{-- Status --}}
                            <td class="px-5 py-4 text-center align-middle">

                                {{-- Payment Rejected --}}
                                @if(
                                    $registration->payment &&
                                    $registration->payment->status === 'rejected'
                                )

                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-full bg-red-100 px-3 py-1 text-[11px] font-semibold text-red-700">

                                        <span
                                            class="h-1.5 w-1.5 rounded-full bg-red-500">
                                        </span>

                                        Payment Rejected

                                    </span>

                                @else

                                    @switch($registration->display_status)

                                        @case('waiting_payment')

                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-yellow-100 px-3 py-1 text-[11px] font-semibold text-yellow-700">

                                                <span
                                                    class="h-1.5 w-1.5 rounded-full bg-yellow-500">
                                                </span>

                                                Waiting Payment

                                            </span>

                                        @break


                                        @case('waiting_verification')

                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1 text-[11px] font-semibold text-blue-700">

                                                <span
                                                    class="h-1.5 w-1.5 rounded-full bg-blue-500">
                                                </span>

                                                Waiting Verification

                                            </span>

                                        @break


                                        @case('accepted')

                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1 text-[11px] font-semibold text-emerald-700">

                                                <span
                                                    class="h-1.5 w-1.5 rounded-full bg-emerald-500">
                                                </span>

                                                Accepted

                                            </span>

                                        @break


                                        @case('rejected')

                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-red-100 px-3 py-1 text-[11px] font-semibold text-red-700">

                                                <span
                                                    class="h-1.5 w-1.5 rounded-full bg-red-500">
                                                </span>

                                                Rejected

                                            </span>

                                        @break


                                        @case('cancelled')

                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-slate-200 px-3 py-1 text-[11px] font-semibold text-slate-600">

                                                <span
                                                    class="h-1.5 w-1.5 rounded-full bg-slate-400">
                                                </span>

                                                Cancelled

                                            </span>

                                        @break


                                        @case('expired')

                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-[11px] font-semibold text-slate-500">

                                                <span
                                                    class="h-1.5 w-1.5 rounded-full bg-slate-400">
                                                </span>

                                                Expired

                                            </span>

                                        @break


                                        @default

                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-[11px] font-semibold text-slate-600">

                                                <span
                                                    class="h-1.5 w-1.5 rounded-full bg-slate-400">
                                                </span>

                                                {{ ucfirst(str_replace('_', ' ', $registration->display_status ?? $registration->status)) }}

                                            </span>

                                    @endswitch

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-4 text-center align-middle">

                                <div class="flex justify-center">

                                    <a
                                        href="{{ route('registrations.show', $registration->id) }}"
                                        class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2 text-xs font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                                        Detail

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-14 text-center">

                                <div
                                    class="mx-auto flex max-w-sm flex-col items-center">

                                    <div
                                        class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                        <svg
                                            class="h-8 w-8"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.5">

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M17 20h5v-2a4 4 0 00-4-4h-1m-4 6H6a4 4 0 01-4-4v-2a4 4 0 014-4h7a4 4 0 014 4v2a4 4 0 01-4 4zM12 10a4 4 0 100-8 4 4 0 000 8z" />

                                        </svg>

                                    </div>


                                    @if(request()->hasAny(['search', 'status']))

                                        <h3
                                            class="mt-5 text-lg font-bold text-slate-800">

                                            Pendaftar Tidak Ditemukan

                                        </h3>

                                        <p
                                            class="mt-2 text-sm leading-6 text-slate-500">

                                            Tidak ada data pendaftar yang sesuai
                                            dengan pencarian atau filter yang digunakan.

                                        </p>

                                        <a
                                            href="{{ route('registrations.index') }}"
                                            class="mt-5 inline-flex items-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">

                                            Reset Filter

                                        </a>

                                    @else

                                        <h3
                                            class="mt-5 text-lg font-bold text-slate-800">

                                            Belum Ada Pendaftar

                                        </h3>

                                        <p
                                            class="mt-2 text-sm leading-6 text-slate-500">

                                            Belum ada peserta yang melakukan
                                            pendaftaran program pelatihan.

                                        </p>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($registrations->hasPages())

            <div
                class="border-t border-slate-100 px-6 py-4">

                {{ $registrations->links() }}

            </div>

        @endif

    </div>

</div>

@endsection