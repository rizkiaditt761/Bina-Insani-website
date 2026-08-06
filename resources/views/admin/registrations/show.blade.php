@extends('layouts.app')

@section('title', 'Registration Detail')

@section('content')

<div class="space-y-6">


{{-- HEADER --}}
<div
    class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-950 via-blue-900 to-indigo-900 p-8 text-white shadow-xl">


    <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-blue-400/20 blur-3xl"></div>


    <div class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">


        <div>

            <span
                class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-blue-100">

                Registration Detail

            </span>


            <h1 class="mt-4 text-3xl font-black">

                Detail Pendaftaran

            </h1>


            <p class="mt-2 text-blue-100">

                Informasi lengkap data peserta dan dokumen pendaftaran.

            </p>


        </div>



        <a
            href="{{ route('registrations.index') }}"
            class="rounded-xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/20">


            Kembali


        </a>


    </div>


</div>





{{-- MAIN INFORMATION --}}
<div class="grid gap-6 lg:grid-cols-3">



{{-- PERSONAL DATA --}}
<div
    class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm lg:col-span-2">


    <div class="mb-6">

        <h2 class="text-xl font-black text-slate-800">

            Informasi Peserta

        </h2>


        <p class="mt-1 text-sm text-slate-500">

            Data pribadi peserta pendaftaran.

        </p>

    </div>



    <div class="grid gap-6 md:grid-cols-2">


        <div>

            <p class="text-sm text-slate-500">
                Nomor Registrasi
            </p>

            <p class="mt-1 font-bold text-slate-800">
                {{ $registration->registration_number }}
            </p>

        </div>




        <div>

            <p class="text-sm text-slate-500">
                Nama Lengkap
            </p>

            <p class="mt-1 font-bold text-slate-800">
                {{ $registration->full_name }}
            </p>

        </div>





        <div>

            <p class="text-sm text-slate-500">
                Email
            </p>

            <p class="mt-1 font-bold text-slate-800">
                {{ $registration->email }}
            </p>

        </div>





        <div>

            <p class="text-sm text-slate-500">
                Nomor HP
            </p>

            <p class="mt-1 font-bold text-slate-800">
                {{ $registration->phone }}
            </p>

        </div>





        <div>

            <p class="text-sm text-slate-500">
                Jenis Kelamin
            </p>

            <p class="mt-1 font-bold text-slate-800">
                {{ $registration->gender }}
            </p>

        </div>





        <div>

            <p class="text-sm text-slate-500">
                Tanggal Lahir
            </p>

            <p class="mt-1 font-bold text-slate-800">
                {{ $registration->birth_date->format('d M Y') }}
            </p>

        </div>





        <div class="md:col-span-2">

            <p class="text-sm text-slate-500">
                Alamat
            </p>

            <p class="mt-1 font-bold text-slate-800">
                {{ $registration->address }}
            </p>

        </div>


    </div>


</div>





{{-- PROGRAM --}}
<div
    class="rounded-3xl border border-slate-200 bg-gradient-to-br from-blue-50 to-white p-8 shadow-sm">


    <h2 class="text-xl font-black text-slate-800">

        Program

    </h2>



    <div class="mt-6 space-y-6">



        <div>

            <p class="text-sm text-slate-500">
                Program Dipilih
            </p>


            <p class="mt-2 text-lg font-black text-blue-700">

                {{ $registration->courseClass->name }}

            </p>


        </div>




        <div>

            <p class="text-sm text-slate-500">
                Biaya Pendaftaran
            </p>


            <p class="mt-2 text-2xl font-black text-slate-800">

                Rp {{ number_format($registration->courseClass->registration_fee,0,',','.') }}

            </p>


        </div>



    </div>


</div>


</div>
{{-- EDUCATION INFORMATION --}}
<div
    class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">


    <div class="mb-6">

        <h2 class="text-xl font-black text-slate-800">

            Informasi Pendidikan

        </h2>


        <p class="mt-1 text-sm text-slate-500">

            Riwayat pendidikan terakhir peserta.

        </p>


    </div>




    <div class="grid gap-6 md:grid-cols-3">


        <div>

            <p class="text-sm text-slate-500">
                Pendidikan Terakhir
            </p>


            <p class="mt-1 font-bold text-slate-800">

                {{ $registration->last_education }}

            </p>


        </div>




        <div>

            <p class="text-sm text-slate-500">
                Nama Sekolah / Institusi
            </p>


            <p class="mt-1 font-bold text-slate-800">

                {{ $registration->school_name }}

            </p>


        </div>




        <div>

            <p class="text-sm text-slate-500">
                Tahun Lulus
            </p>


            <p class="mt-1 font-bold text-slate-800">

                {{ $registration->graduation_year }}

            </p>


        </div>


    </div>


</div>





{{-- STATUS --}}
<div
    class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">


    <h2 class="text-xl font-black text-slate-800">

        Status Pendaftaran

    </h2>



    <div class="mt-5">


        @php

            $payment = $registration->payment;

        @endphp




        {{-- CEK PAYMENT REJECTED --}}
        @if($payment && $payment->status === 'rejected')


            <span
                class="inline-flex rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-700">

                Payment Rejected

            </span>



        @elseif($registration->status === 'waiting_payment')


            <span
                class="inline-flex rounded-full bg-yellow-100 px-4 py-2 text-sm font-bold text-yellow-700">

                Waiting Payment

            </span>



        @elseif($registration->status === 'waiting_verification')


            <span
                class="inline-flex rounded-full bg-blue-100 px-4 py-2 text-sm font-bold text-blue-700">

                Waiting Verification

            </span>



        @elseif($registration->status === 'accepted')


            <span
                class="inline-flex rounded-full bg-emerald-100 px-4 py-2 text-sm font-bold text-emerald-700">

                Accepted

            </span>



        @elseif($registration->status === 'rejected')


            <span
                class="inline-flex rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-700">

                Rejected

            </span>


        @endif


    </div>




    {{-- PAYMENT INFO --}}
    @if($payment)


        <div
            class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5">


            <h3 class="font-bold text-slate-800">

                Informasi Pembayaran

            </h3>



            <div class="mt-4 grid gap-4 md:grid-cols-3">


                <div>

                    <p class="text-sm text-slate-500">
                        Status Payment
                    </p>


                    <p class="mt-1 font-bold text-slate-800">

                        {{ ucfirst(str_replace('_',' ',$payment->status)) }}

                    </p>

                </div>




                <div>

                    <p class="text-sm text-slate-500">
                        Nominal
                    </p>


                    <p class="mt-1 font-bold text-slate-800">

                        Rp {{ number_format($payment->amount,0,',','.') }}

                    </p>


                </div>




                <div>

                    <p class="text-sm text-slate-500">
                        Metode
                    </p>


                    <p class="mt-1 font-bold text-slate-800">

                        {{ $payment->payment_method }}

                    </p>


                </div>


            </div>


        </div>


    @endif


</div>
{{-- DOCUMENTS --}}
<div
    class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">


    <div class="mb-6">

        <h2 class="text-xl font-black text-slate-800">

            Dokumen Pendaftaran

        </h2>


        <p class="mt-1 text-sm text-slate-500">

            Dokumen yang diupload peserta saat melakukan pendaftaran.

        </p>


    </div>




    <div class="grid gap-6 lg:grid-cols-3">



        {{-- KTP --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50">


            <div class="border-b border-slate-200 bg-white p-4">

                <h3 class="font-bold text-slate-800">

                    KTP

                </h3>

            </div>



            @if($registration->ktp_file)

                <img
                    src="{{ asset('storage/'.$registration->ktp_file) }}"
                    class="h-64 w-full object-cover"
                    alt="KTP">


                <div class="p-4">

                    <a
                        href="{{ asset('storage/'.$registration->ktp_file) }}"
                        target="_blank"
                        class="inline-flex rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">

                        Lihat KTP

                    </a>

                </div>


            @else

                <div
                    class="flex h-64 items-center justify-center text-sm text-slate-500">

                    Dokumen tidak tersedia

                </div>


            @endif


        </div>





        {{-- IJAZAH --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50">


            <div class="border-b border-slate-200 bg-white p-4">

                <h3 class="font-bold text-slate-800">

                    Ijazah

                </h3>

            </div>



            @if($registration->diploma_file)

                <img
                    src="{{ asset('storage/'.$registration->diploma_file) }}"
                    class="h-64 w-full object-cover"
                    alt="Ijazah">


                <div class="p-4">

                    <a
                        href="{{ asset('storage/'.$registration->diploma_file) }}"
                        target="_blank"
                        class="inline-flex rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">

                        Lihat Ijazah

                    </a>

                </div>


            @else

                <div
                    class="flex h-64 items-center justify-center text-sm text-slate-500">

                    Dokumen tidak tersedia

                </div>


            @endif


        </div>





        {{-- PAS FOTO --}}
        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50">


            <div class="border-b border-slate-200 bg-white p-4">

                <h3 class="font-bold text-slate-800">

                    Pas Foto

                </h3>

            </div>



            @if($registration->photo_file)

                <img
                    src="{{ asset('storage/'.$registration->photo_file) }}"
                    class="h-64 w-full object-cover"
                    alt="Pas Foto">


                <div class="p-4">

                    <a
                        href="{{ asset('storage/'.$registration->photo_file) }}"
                        target="_blank"
                        class="inline-flex rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">

                        Lihat Pas Foto

                    </a>

                </div>


            @else

                <div
                    class="flex h-64 items-center justify-center text-sm text-slate-500">

                    Dokumen tidak tersedia

                </div>


            @endif


        </div>


    </div>


</div>





{{-- ADMIN NOTE --}}
@if($registration->notes)

<div
    class="rounded-3xl border border-blue-200 bg-blue-50 p-8">


    <h2 class="text-xl font-black text-blue-800">

        Catatan Admin

    </h2>


    <p class="mt-3 leading-7 text-blue-700">

        {{ $registration->notes }}

    </p>


</div>

@endif





{{-- BACK BUTTON --}}
<div class="flex justify-end">


    <a
        href="{{ route('registrations.index') }}"
        class="rounded-xl bg-slate-800 px-6 py-3 font-semibold text-white transition hover:bg-slate-900">


        Kembali ke Data Pendaftar


    </a>


</div>



</div>


@endsection