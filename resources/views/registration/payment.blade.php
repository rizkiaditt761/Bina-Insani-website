@extends('layouts.guest')

@section('title', 'Pembayaran Pendaftaran')

@section('content')

<section class="bg-gray-50 py-16">

    <div class="mx-auto max-w-4xl px-6">

        <div class="mb-10 text-center">

            <span
                class="inline-flex rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

                Pembayaran Pendaftaran

            </span>

            <h1
                class="mt-5 text-4xl font-bold text-gray-900">

                Selesaikan Pembayaran

            </h1>

            <p
                class="mt-4 text-gray-600">

                Silakan lakukan pembayaran biaya pendaftaran, kemudian upload bukti pembayaran untuk proses verifikasi.

            </p>

        </div>

        <div
            class="rounded-3xl bg-white p-8 shadow-lg">

            <div
                class="grid gap-8 lg:grid-cols-2">

                {{-- Registration Information --}}
                <div>

                    <h2
                        class="mb-6 text-xl font-semibold text-gray-900">

                        Informasi Pendaftaran

                    </h2>

                    <div class="space-y-5">

                        <div>

                            <p class="text-sm text-gray-500">

                                Nomor Registrasi

                            </p>

                            <p class="mt-1 font-semibold text-gray-900">

                                {{ $registration->registration_number }}

                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">

                                Nama Lengkap

                            </p>

                            <p class="mt-1 font-semibold text-gray-900">

                                {{ $registration->full_name }}

                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">

                                Program

                            </p>

                            <p class="mt-1 font-semibold text-gray-900">

                                {{ $registration->courseClass->name }}

                            </p>

                        </div>

                    </div>

                </div>

                {{-- Payment Information --}}
                <div>

                    <h2
                        class="mb-6 text-xl font-semibold text-gray-900">

                        Informasi Pembayaran

                    </h2>

                    <div
                        class="rounded-2xl border border-blue-100 bg-blue-50 p-6">

                        <p
                            class="text-sm text-blue-600">

                            Biaya Pendaftaran

                        </p>

                        <p
                            class="mt-2 text-3xl font-bold text-blue-700">

                            Rp {{ number_format($registration->courseClass->registration_fee, 0, ',', '.') }}

                        </p>

                    </div>

                    <div class="mt-6 space-y-5">

                        <div>

                            <p class="text-sm text-gray-500">

                                Metode Pembayaran

                            </p>

                            <p class="mt-1 font-semibold text-gray-900">

                                QRIS

                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">

                                Status

                            </p>

                            <span
                                class="mt-2 inline-flex rounded-full bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-700">

                                Menunggu Pembayaran

                            </span>

                        </div>

                    </div>

                </div>

            </div>

                        {{-- Upload Form --}}
            <div class="mt-10 border-t border-gray-200 pt-8">

                <h2
                    class="mb-6 text-xl font-semibold text-gray-900">

                    Upload Bukti Pembayaran

                </h2>

                <form
                    action="{{ route('registration.payment.store', $registration->registration_number) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-6">

                    @csrf

                    <div>

                        <label
                            class="mb-2 block text-sm font-medium text-gray-700">

                            Bukti Pembayaran

                        </label>

                        <input
                            type="file"
                            name="payment_proof"
                            accept=".jpg,.jpeg,.png,.pdf"
                            required
                            class="block w-full rounded-xl border border-gray-300 bg-white file:mr-4 file:rounded-lg file:border-0 file:bg-blue-600 file:px-5 file:py-2 file:font-medium file:text-white hover:file:bg-blue-700">

                        @error('payment_proof')

                            <p
                                class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                        <p
                            class="mt-2 text-sm text-gray-500">

                            Format yang didukung:
                            JPG, JPEG, PNG atau PDF (maksimal 2MB).

                        </p>

                    </div>

                    <div
                        class="rounded-2xl border border-yellow-200 bg-yellow-50 p-5">

                        <h3
                            class="font-semibold text-yellow-800">

                            Perhatian

                        </h3>

                        <ul
                            class="mt-3 list-disc space-y-2 pl-5 text-sm text-yellow-700">

                            <li>
                                Pastikan nominal pembayaran sesuai biaya pendaftaran.
                            </li>

                            <li>
                                Upload bukti pembayaran yang jelas dan tidak buram.
                            </li>

                            <li>
                                Setelah dikirim, pembayaran akan diverifikasi oleh admin.
                            </li>

                            <li>
                                Status pendaftaran akan berubah setelah proses verifikasi selesai.
                            </li>

                        </ul>

                    </div>

                    <div
                        class="flex flex-col gap-4 sm:flex-row sm:justify-end">

                        <a
                            href="{{ route('registration.show', $registration->registration_number) }}"
                            class="rounded-xl border border-gray-300 px-6 py-3 text-center font-medium text-gray-700 transition hover:bg-gray-100">

                            Lihat Status

                        </a>

                        <button
                            type="submit"
                            class="rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white transition hover:bg-blue-700">

                            Kirim Bukti Pembayaran

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection