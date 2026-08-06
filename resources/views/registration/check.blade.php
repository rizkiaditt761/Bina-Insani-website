@extends('layouts.guest')

@section('title', 'Cek Pendaftaran')

@section('content')

<section class="min-h-screen bg-gradient-to-b from-blue-50 via-white to-white py-20">

    <div class="mx-auto max-w-2xl px-6">

        {{-- Header --}}
        <div class="text-center">

            <span
                class="inline-flex rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

                Cek Pendaftaran

            </span>

            <h1
                class="mt-5 text-4xl font-bold text-gray-900">

                Cek Riwayat Pendaftaran Anda

            </h1>

            <p
                class="mt-4 text-gray-600 leading-8">

                Masukkan email dan nomor WhatsApp yang digunakan saat
                mendaftar untuk melihat status pendaftaran serta
                melanjutkan proses pembayaran apabila masih tertunda.

            </p>

        </div>

        {{-- Form --}}
        <div
            class="mt-10 rounded-3xl border border-gray-100 bg-white p-8 shadow-xl">

            @if(session('success'))

                <div
                    class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">

                    {{ session('success') }}

                </div>

            @endif

            @if($errors->any())

                <div
                    class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">

                    {{ $errors->first() }}

                </div>

            @endif

            <form
                action="{{ route('registration.check.store') }}"
                method="POST"
                class="space-y-6">

                @csrf

                {{-- Email --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-gray-700">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                </div>

                {{-- WhatsApp --}}
                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-gray-700">

                        Nomor WhatsApp

                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="08xxxxxxxxxx"
                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                </div>

                {{-- Button --}}
                <button
                    type="submit"
                    class="w-full rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white transition hover:bg-blue-700">

                    Cek Pendaftaran

                </button>

            </form>

        </div>

        {{-- Informasi --}}
        <div
            class="mt-8 rounded-3xl border border-blue-100 bg-blue-50 p-6">

            <h3
                class="text-lg font-bold text-blue-900">

                Informasi

            </h3>

            <ul
                class="mt-4 list-disc space-y-2 pl-5 text-blue-800">

                <li>
                    Gunakan email dan nomor WhatsApp yang didaftarkan.
                </li>

                <li>
                    Jika data ditemukan, Anda akan diarahkan ke halaman detail pendaftaran.
                </li>

                <li>
                    Apabila status masih <strong>Menunggu Pembayaran</strong>, Anda dapat langsung melanjutkan upload bukti pembayaran.
                </li>

            </ul>

        </div>

    </div>

</section>

@endsection