@extends('layouts.app')

@section('title', 'Payment Detail')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-3xl font-bold text-gray-900">

                Payment Detail

            </h1>

            <p class="mt-2 text-gray-500">

                Detail pembayaran pendaftaran peserta.

            </p>

        </div>

        <a
            href="{{ route('registration-payments.index') }}"
            class="rounded-xl border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">

            Kembali

        </a>

    </div>

    <div class="grid gap-6 lg:grid-cols-3">

        {{-- Participant Information --}}
        <div
            class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm lg:col-span-2">

            <h2
                class="mb-6 text-lg font-semibold text-gray-900">

                Informasi Peserta

            </h2>

            <div class="grid gap-6 md:grid-cols-2">

                <div>

                    <p class="text-sm text-gray-500">

                        Nomor Registrasi

                    </p>

                    <p class="mt-1 font-semibold text-gray-900">

                        {{ $payment->registration->registration_number }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Nama Lengkap

                    </p>

                    <p class="mt-1 font-semibold text-gray-900">

                        {{ $payment->registration->full_name }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Email

                    </p>

                    <p class="mt-1 font-semibold text-gray-900">

                        {{ $payment->registration->email }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Nomor HP

                    </p>

                    <p class="mt-1 font-semibold text-gray-900">

                        {{ $payment->registration->phone }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Kota

                    </p>

                    <p class="mt-1 font-semibold text-gray-900">

                        {{ $payment->registration->city }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Jenis Kelamin

                    </p>

                    <p class="mt-1 font-semibold text-gray-900">

                        {{ $payment->registration->gender }}

                    </p>

                </div>

            </div>

        </div>

        {{-- Class Information --}}
        <div
            class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <h2
                class="mb-6 text-lg font-semibold text-gray-900">

                Program

            </h2>

            <div class="space-y-5">

                <div>

                    <p class="text-sm text-gray-500">

                        Nama Program

                    </p>

                    <p class="mt-1 font-semibold text-gray-900">

                        {{ $payment->registration->courseClass->name }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Biaya Pendaftaran

                    </p>

                    <p class="mt-1 text-xl font-bold text-blue-600">

                        Rp {{ number_format($payment->registration->courseClass->registration_fee, 0, ',', '.') }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-gray-500">

                        Status Pembayaran

                    </p>

                    <div class="mt-2">

                        @switch($payment->status)

                            @case('waiting_verification')

                                <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">

                                    Waiting Verification

                                </span>

                                @break

                            @case('verified')

                                <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                    Verified

                                </span>

                                @break

                            @case('rejected')

                                <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                    Rejected

                                </span>

                                @break

                        @endswitch

                    </div>

                </div>

            </div>

        </div>

    </div>

        {{-- Payment Proof --}}
    <div
        class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <h2 class="mb-6 text-lg font-semibold text-gray-900">

            Bukti Pembayaran

        </h2>

        @if ($payment->payment_proof)

            <div class="overflow-hidden rounded-xl border border-gray-200">

                <img
                    src="{{ Storage::url($payment->payment_proof) }}"
                    alt="Payment Proof"
                    class="w-full object-cover">

            </div>

            <div class="mt-5">

                <a
                    href="{{ Storage::url($payment->payment_proof) }}"
                    target="_blank"
                    class="inline-flex items-center rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">

                    Download Bukti

                </a>

            </div>

        @else

            <div
                class="rounded-xl border border-dashed border-gray-300 py-16 text-center">

                <p class="text-gray-500">

                    Bukti pembayaran belum tersedia.

                </p>

            </div>

        @endif

    </div>

    {{-- Verification --}}
    @if ($payment->status === 'waiting_verification')

        <div
            class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <h2
                class="mb-6 text-lg font-semibold text-gray-900">

                Verifikasi Pembayaran

            </h2>

            <div class="flex flex-wrap gap-3">

                {{-- Approve --}}
                <form
                    action="{{ route('registration-payments.approve', $payment->id) }}"
                    method="POST">

                    @csrf
                    @method('PATCH')

                    <button
                        type="submit"
                        class="rounded-xl bg-green-600 px-6 py-3 font-semibold text-white transition hover:bg-green-700">

                        Approve Pembayaran

                    </button>

                </form>

                {{-- Reject --}}
                <form
                    action="{{ route('registration-payments.reject', $payment->id) }}"
                    method="POST"
                    class="flex-1">

                    @csrf
                    @method('PATCH')

                    <textarea
                        name="notes"
                        rows="3"
                        placeholder="Alasan penolakan (opsional)..."
                        class="mb-3 w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500"></textarea>

                    <button
                        type="submit"
                        class="rounded-xl bg-red-600 px-6 py-3 font-semibold text-white transition hover:bg-red-700">

                        Reject Pembayaran

                    </button>

                </form>

            </div>

        </div>

    @endif

</div>

@endsection