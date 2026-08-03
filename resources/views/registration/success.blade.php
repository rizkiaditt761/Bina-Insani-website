@extends('layouts.guest')

@section('title', 'Pendaftaran Berhasil')

@section('content')

<section
    class="relative min-h-screen overflow-hidden bg-gradient-to-b from-blue-50 via-white to-white py-20">


    {{-- Background Decoration --}}
    <div
        class="absolute -left-20 top-20 h-72 w-72 rounded-full bg-blue-200/30 blur-3xl">
    </div>

    <div
        class="absolute -right-20 bottom-20 h-72 w-72 rounded-full bg-indigo-200/30 blur-3xl">
    </div>


    <div
        class="relative mx-auto max-w-5xl px-6">


        {{-- Success Hero --}}
        <div
            class="text-center"
            data-aos="fade-up">


            <div
                class="mx-auto flex h-28 w-28 items-center justify-center rounded-full bg-green-100 shadow-lg">


                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-14 w-14 text-green-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">


                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2.5"
                        d="M5 13l4 4L19 7"/>


                </svg>


            </div>


            <span
                class="mt-8 inline-flex rounded-full bg-blue-100 px-5 py-2 text-sm font-semibold text-blue-700">


                Registration Completed


            </span>



            <h1
                class="mt-6 text-4xl font-extrabold tracking-tight text-gray-900 md:text-5xl">


                Pendaftaran Berhasil 🎉


            </h1>


            <p
                class="mx-auto mt-5 max-w-2xl text-lg text-gray-600">


                Selamat
                <span class="font-semibold text-gray-900">
                    {{ $registration->full_name }}
                </span>

                , data pendaftaran kamu telah berhasil kami terima.
                Simpan nomor registrasi berikut untuk proses selanjutnya.


            </p>


        </div>



        {{-- Registration Number Card --}}
        <div
            class="mx-auto mt-12 max-w-3xl"
            data-aos="fade-up"
            data-aos-delay="100">


            <div
                class="overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 p-1 shadow-2xl">


                <div
                    class="rounded-3xl bg-white/10 p-8 text-center text-white backdrop-blur">


                    <p
                        class="text-sm font-medium text-blue-100">


                        Nomor Registrasi Kamu


                    </p>


                    <h2
                        class="mt-4 text-3xl font-black tracking-wider md:text-4xl">


                        {{ $registration->registration_number }}


                    </h2>


                    <p
                        class="mt-4 text-sm text-blue-100">


                        Gunakan nomor ini untuk melihat perkembangan pendaftaran.


                    </p>


                </div>


            </div>


        </div>



        {{-- Process Timeline --}}
        <div
            class="mt-14 rounded-3xl border border-gray-100 bg-white p-8 shadow-xl md:p-10"
            data-aos="fade-up"
            data-aos-delay="200">


            <h2
                class="text-center text-2xl font-bold text-gray-900">


                Langkah Selanjutnya


            </h2>


            <p
                class="mt-3 text-center text-gray-500">


                Ikuti proses berikut sampai pendaftaran kamu selesai.


            </p>



            <div
                class="mt-10 grid gap-6 md:grid-cols-4">


                {{-- Step 1 --}}
                <div
                    class="rounded-2xl bg-blue-50 p-5 text-center">


                    <div
                        class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-blue-600 text-white">


                        ✓


                    </div>


                    <h3
                        class="mt-4 font-bold text-gray-900">


                        Pendaftaran


                    </h3>


                    <p
                        class="mt-2 text-sm text-gray-500">


                        Data berhasil dikirim


                    </p>


                </div>



                {{-- Step 2 --}}
                <div
                    class="rounded-2xl border border-gray-100 p-5 text-center">


                    <div
                        class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 text-gray-400">


                        2


                    </div>


                    <h3
                        class="mt-4 font-bold text-gray-900">


                        Pembayaran


                    </h3>


                    <p
                        class="mt-2 text-sm text-gray-500">


                        Upload bukti pembayaran


                    </p>


                </div>



                {{-- Step 3 --}}
                <div
                    class="rounded-2xl border border-gray-100 p-5 text-center">


                    <div
                        class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 text-gray-400">


                        3


                    </div>


                    <h3
                        class="mt-4 font-bold text-gray-900">


                        Verifikasi


                    </h3>


                    <p
                        class="mt-2 text-sm text-gray-500">


                        Dicek oleh admin


                    </p>


                </div>



                {{-- Step 4 --}}
                <div
                    class="rounded-2xl border border-gray-100 p-5 text-center">


                    <div
                        class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 text-gray-400">


                        4


                    </div>


                    <h3
                        class="mt-4 font-bold text-gray-900">


                        Mulai Program


                    </h3>


                    <p
                        class="mt-2 text-sm text-gray-500">


                        Siap mengikuti pelatihan


                    </p>


                </div>


            </div>


        </div>




        {{-- Detail Card --}}
        <div
            class="mt-10 grid gap-6 md:grid-cols-2">


            <div
                class="rounded-3xl bg-white p-8 shadow-lg border border-gray-100"
                data-aos="fade-right">


                <h2
                    class="text-xl font-bold text-gray-900">


                    Informasi Program


                </h2>


                <div class="mt-6 space-y-4">


                    <div>

                        <p class="text-sm text-gray-500">
                            Program
                        </p>

                        <p class="font-semibold text-gray-900">
                            {{ $registration->courseClass->name }}
                        </p>

                    </div>


                    <div>

                        <p class="text-sm text-gray-500">
                            Status
                        </p>

                        <span
                            class="mt-2 inline-flex rounded-full bg-yellow-100 px-4 py-1 text-sm font-semibold text-yellow-700">


                            Menunggu Pembayaran


                        </span>

                    </div>


                </div>


            </div>




            <div
                class="rounded-3xl bg-white p-8 shadow-lg border border-gray-100"
                data-aos="fade-left">


                <h2
                    class="text-xl font-bold text-gray-900">


                    Butuh Bantuan?


                </h2>


                <p
                    class="mt-4 text-gray-600">


                    Jika mengalami kendala saat proses pembayaran,
                    silakan hubungi tim Bina Insani.


                </p>


                <div
                    class="mt-6 rounded-2xl bg-blue-50 p-5">


                    <p
                        class="text-sm text-blue-700">


                        Email


                    </p>


                    <p
                        class="font-semibold text-gray-900">


                        {{ $setting->email ?? '-' }}


                    </p>


                </div>


            </div>


        </div>




        {{-- Action --}}
        <div
            class="mt-12 flex flex-col gap-4 sm:flex-row"
            data-aos="fade-up">


            <a
                href="{{ route('registration.show', $registration->registration_number) }}"
                class="flex-1 rounded-2xl border border-gray-300 bg-white py-4 text-center font-bold text-gray-700 transition hover:bg-gray-100">


                Lihat Detail Pendaftaran


            </a>


            <a
                href="{{ route('registration.payment.create', $registration->registration_number) }}"
                class="flex-1 rounded-2xl bg-blue-600 py-4 text-center font-bold text-white shadow-lg transition hover:bg-blue-700">


                Lakukan Pembayaran


            </a>


        </div>


    </div>


</section>

@endsection