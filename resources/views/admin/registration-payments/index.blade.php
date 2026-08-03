@extends('layouts.app')

@section('title', 'Registration Payment')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

        <div>

            <h1 class="text-3xl font-bold text-gray-900">

                Registration Payment

            </h1>

            <p class="mt-2 text-gray-500">

                Kelola dan verifikasi pembayaran pendaftaran peserta.

            </p>

        </div>

    </div>

    {{-- Summary --}}
    <div class="grid gap-6 md:grid-cols-3">

        {{-- Pending --}}
        <div
            class="rounded-2xl border border-yellow-200 bg-yellow-50 p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm font-medium text-yellow-700">

                        Waiting Verification

                    </p>

                    <h2
                        class="mt-2 text-3xl font-bold text-yellow-900">

                        {{ $pending }}

                    </h2>

                </div>

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-xl bg-yellow-100">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7 text-yellow-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4l3 3"/>

                    </svg>

                </div>

            </div>

        </div>

        {{-- Verified --}}
        <div
            class="rounded-2xl border border-green-200 bg-green-50 p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm font-medium text-green-700">

                        Verified

                    </p>

                    <h2
                        class="mt-2 text-3xl font-bold text-green-900">

                        {{ $verified }}

                    </h2>

                </div>

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-xl bg-green-100">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7 text-green-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"/>

                    </svg>

                </div>

            </div>

        </div>

        {{-- Rejected --}}
        <div
            class="rounded-2xl border border-red-200 bg-red-50 p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm font-medium text-red-700">

                        Rejected

                    </p>

                    <h2
                        class="mt-2 text-3xl font-bold text-red-900">

                        {{ $rejected }}

                    </h2>

                </div>

                <div
                    class="flex h-14 w-14 items-center justify-center rounded-xl bg-red-100">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7 text-red-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </div>

            </div>

        </div>

    </div>

    {{-- Filter --}}
    <div
        class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <form
            method="GET"
            class="grid gap-4 md:grid-cols-3">

            <div>

                <label
                    class="mb-2 block text-sm font-medium text-gray-700">

                    Search

                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Nomor registrasi / nama peserta..."
                    class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

            </div>

            <div>

                <label
                    class="mb-2 block text-sm font-medium text-gray-700">

                    Status

                </label>

                <select
                    name="status"
                    class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                    <option value="">

                        Semua Status

                    </option>

                    <option
                        value="waiting_verification"
                        @selected(request('status') == 'waiting_verification')>

                        Waiting Verification

                    </option>

                    <option
                        value="verified"
                        @selected(request('status') == 'verified')>

                        Verified

                    </option>

                    <option
                        value="rejected"
                        @selected(request('status') == 'rejected')>

                        Rejected

                    </option>

                </select>

            </div>

            <div class="flex items-end">

                <button
                    type="submit"
                    class="w-full rounded-xl bg-blue-600 px-5 py-3 font-semibold text-white transition hover:bg-blue-700">

                    Filter

                </button>

            </div>

        </form>

    </div>

        {{-- Table --}}
    <div
        class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Registration

                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Participant

                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Program

                        </th>

                        <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Payment

                        </th>

                        <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Registration

                        </th>

                        <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100 bg-white">

                    @forelse ($payments as $payment)

                        <tr class="hover:bg-gray-50 transition">

                            {{-- Registration --}}
                            <td class="px-6 py-5">

                                <div class="font-semibold text-gray-900">

                                    {{ $payment->registration->registration_number }}

                                </div>

                            </td>

                            {{-- Participant --}}
                            <td class="px-6 py-5">

                                <div class="font-semibold text-gray-900">

                                    {{ $payment->registration->full_name }}

                                </div>

                                <div class="mt-1 text-sm text-gray-500">

                                    {{ $payment->registration->email }}

                                </div>

                            </td>

                            {{-- Program --}}
                            <td class="px-6 py-5">

                                {{ $payment->registration->courseClass->name }}

                            </td>

                            {{-- Payment Status --}}
                            <td class="px-6 py-5 text-center">

                                @switch($payment->status)

                                    @case('waiting_verification')

                                        <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">

                                            Waiting Verification

                                        </span>

                                        @break

                                    @case('verified')

                                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                            Verified

                                        </span>

                                        @break

                                    @case('rejected')

                                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                            Rejected

                                        </span>

                                        @break

                                @endswitch

                            </td>

                            {{-- Registration Status --}}
                            <td class="px-6 py-5 text-center">

                                @switch($payment->registration->status)

                                    @case('waiting_payment')

                                        <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">

                                            Waiting Payment

                                        </span>

                                        @break

                                    @case('waiting_verification')

                                        <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">

                                            Waiting Verification

                                        </span>

                                        @break

                                    @case('accepted')

                                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                            Accepted

                                        </span>

                                        @break

                                    @case('rejected')

                                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                            Rejected

                                        </span>

                                        @break

                                @endswitch

                            </td>

                            {{-- Action --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center justify-center gap-2">

                                    <a
                                        href="{{ route('registration-payments.show', $payment->id) }}"
                                        class="rounded-lg bg-blue-100 px-3 py-2 text-sm font-medium text-blue-700 transition hover:bg-blue-200">

                                        Detail

                                    </a>

                                    @if($payment->status === 'waiting_verification')

                                        <form
                                            action="{{ route('registration-payments.approve', $payment->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="rounded-lg bg-green-600 px-3 py-2 text-sm font-medium text-white hover:bg-green-700">

                                                Approve

                                            </button>

                                        </form>

                                        <form
                                            action="{{ route('registration-payments.reject', $payment->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="rounded-lg bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700">

                                                Reject

                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-20 text-center">

                                <div class="text-lg font-semibold text-gray-700">

                                    Belum ada data pembayaran.

                                </div>

                                <p class="mt-2 text-gray-500">

                                    Data pembayaran peserta akan muncul di sini.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

@if($payments->hasPages())

    <div class="mt-6">

        {{ $payments->links() }}

    </div>

@endif