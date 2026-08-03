@extends('layouts.guest')

@section('title', 'Upload Bukti Pembayaran')

@section('content')

<section class="min-h-screen bg-gradient-to-b from-blue-50 via-white to-white py-20">

    <div class="max-w-4xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center">

            <span
                class="inline-flex rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

                Upload Pembayaran

            </span>

            <h1
                class="mt-5 text-4xl font-bold text-gray-900">

                Bukti Pembayaran

            </h1>

            <p
                class="mt-4 text-gray-600">

                Upload bukti pembayaran biaya pendaftaran agar dapat diverifikasi oleh admin.

            </p>

        </div>

        <form
            action="{{ route('registration.payment.store', $registration->registration_number) }}"
            method="POST"
            enctype="multipart/form-data"
            class="mt-12">

            @csrf

            <div
                class="rounded-3xl bg-white shadow-xl border border-gray-100 overflow-hidden">

                {{-- Informasi Pendaftaran --}}
                <div class="border-b border-gray-100 p-8">

                    <h2
                        class="text-2xl font-bold text-gray-900">

                        Informasi Pendaftaran

                    </h2>

                    <div
                        class="mt-8 grid gap-6 md:grid-cols-2">

                        <div>

                            <p class="text-sm text-gray-500">

                                Nomor Pendaftaran

                            </p>

                            <h3
                                class="mt-2 text-lg font-semibold text-blue-700">

                                {{ $registration->registration_number }}

                            </h3>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">

                                Nama Peserta

                            </p>

                            <h3
                                class="mt-2 text-lg font-semibold">

                                {{ $registration->full_name }}

                            </h3>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">

                                Program

                            </p>

                            <h3
                                class="mt-2 text-lg font-semibold">

                                {{ $registration->courseClass->name }}

                            </h3>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">

                                Biaya Pendaftaran

                            </p>

                            <h3
                                class="mt-2 text-xl font-bold text-green-600">

                                Rp {{ number_format($registration->courseClass->registration_fee,0,',','.') }}

                            </h3>

                        </div>

                    </div>

                </div>

                {{-- Upload --}}
                <div class="p-8">

                    <label
                        class="block mb-3 font-semibold text-gray-800">

                        Bukti Pembayaran

                    </label>

                    <label
                        id="upload-area"
                        class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-blue-300 bg-blue-50 px-6 py-14 transition hover:border-blue-500 hover:bg-blue-100">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-14 w-14 text-blue-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>

                        </svg>

                        <p
                            class="mt-5 text-lg font-semibold text-gray-800">

                            Klik untuk memilih file

                        </p>

                        <p
                            class="mt-2 text-sm text-gray-500">

                            JPG, JPEG, PNG atau PDF (Maks. 2 MB)

                        </p>

                        <input
                            type="file"
                            name="payment_proof"
                            id="payment_proof"
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="hidden">

                    </label>

                    <div
                        id="preview"
                        class="hidden mt-8 rounded-2xl border border-gray-200 p-6">

                        <p
                            class="text-sm text-gray-500">

                            File Dipilih

                        </p>

                        <h3
                            id="file-name"
                            class="mt-2 font-semibold text-gray-900">

                        </h3>

                    </div>

                </div>

                {{-- Button --}}
                <div
                    class="border-t border-gray-100 p-8 flex flex-col gap-4 md:flex-row">

                    <a
                        href="{{ route('registration.show',$registration->registration_number) }}"
                        class="flex-1 rounded-xl border border-gray-300 py-4 text-center font-semibold hover:bg-gray-100 transition">

                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="flex-1 rounded-xl bg-blue-600 py-4 font-semibold text-white transition hover:bg-blue-700">

                        Upload Bukti Pembayaran

                    </button>

                </div>

            </div>

        </form>

    </div>

</section>

@push('scripts')

<script>

document
    .getElementById('payment_proof')
    .addEventListener('change', function () {

        if (!this.files.length) return;

        document
            .getElementById('preview')
            .classList.remove('hidden');

        document
            .getElementById('file-name')
            .textContent = this.files[0].name;

    });

</script>

@endpush

@endsection