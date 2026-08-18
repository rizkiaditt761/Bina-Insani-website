@extends('layouts.app')

@section('title', 'Payment Detail')

@section('content')

<div class="space-y-8">


{{-- HEADER --}}
<div
    data-aos="fade-down"
    class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-950 via-blue-900 to-indigo-900 p-6 text-white shadow-2xl">


    <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-blue-400/20 blur-3xl"></div>
    <div class="absolute -left-10 bottom-0 h-32 w-32 rounded-full bg-cyan-400/10 blur-2xl"></div>


    <div class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">


        <div>

            <span
                class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.25em] text-blue-100">

                Payment Detail

            </span>


            <h1 class="mt-4 text-2xl font-black tracking-tight lg:text-3xl">

                Detail Pembayaran

            </h1>


            <p class="mt-2 max-w-xl text-sm leading-6 text-blue-100">

                Informasi lengkap pendaftaran peserta, program yang dipilih,
                dan status pembayaran.

            </p>


        </div>



        <a
            href="{{ route('registration-payments.index') }}"
            class="rounded-xl border border-white/20 bg-white/10 px-6 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/20">


            Kembali


        </a>


    </div>


</div>





{{-- MAIN INFORMATION --}}
<div
    data-aos="fade-up"
    class="grid gap-6 lg:grid-cols-3">



{{-- PARTICIPANT --}}
<div
    class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition hover:shadow-lg lg:col-span-2">


    <div class="mb-8">

        <h2 class="text-xl font-black text-slate-800">

            Informasi Peserta

        </h2>


        <p class="mt-2 text-sm text-slate-500">

            Data peserta yang melakukan pembayaran.

        </p>

    </div>



    <div class="grid gap-6 md:grid-cols-2">


        <div>

            <p class="text-sm text-slate-500">
                Nomor Registrasi
            </p>

            <p class="mt-2 font-bold text-slate-800">
                {{ $payment->registration->registration_number }}
            </p>

        </div>



        <div>

            <p class="text-sm text-slate-500">
                Nama Lengkap
            </p>

            <p class="mt-2 font-bold text-slate-800">
                {{ $payment->registration->full_name }}
            </p>

        </div>



        <div>

            <p class="text-sm text-slate-500">
                Email
            </p>

            <p class="mt-2 font-bold text-slate-800">
                {{ $payment->registration->email }}
            </p>

        </div>



        <div>

            <p class="text-sm text-slate-500">
                Nomor HP
            </p>

            <p class="mt-2 font-bold text-slate-800">
                {{ $payment->registration->phone }}
            </p>

        </div>



        <div>

            <p class="text-sm text-slate-500">
                Kota
            </p>

            <p class="mt-2 font-bold text-slate-800">
                {{ $payment->registration->city }}
            </p>

        </div>



        <div>

            <p class="text-sm text-slate-500">
                Jenis Kelamin
            </p>

            <p class="mt-2 font-bold text-slate-800">
                {{ $payment->registration->gender }}
            </p>

        </div>


    </div>


</div>






{{-- PROGRAM --}}
<div
    data-aos="fade-up"
    data-aos-delay="100"
    class="rounded-3xl border border-blue-100 bg-gradient-to-br from-blue-50 via-white to-indigo-50 p-8 shadow-sm">


    <div class="mb-8">

        <h2 class="text-xl font-black text-slate-800">

            Program

        </h2>


        <p class="mt-2 text-sm text-slate-500">

            Program yang dipilih peserta.

        </p>


    </div>



    <div class="space-y-7">


        <div>

            <p class="text-sm text-slate-500">
                Nama Program
            </p>


            <p class="mt-2 text-lg font-black text-blue-700">

                {{ $payment->registration->courseClass->name }}

            </p>

        </div>




        <div>

            <p class="text-sm text-slate-500">
                Biaya Pendaftaran
            </p>


            <p class="mt-2 text-2xl font-black text-slate-800">

                Rp {{ number_format($payment->registration->courseClass->registration_fee,0,',','.') }}

            </p>

        </div>




        <div>

            <p class="text-sm text-slate-500">
                Status Pembayaran
            </p>


            <div class="mt-3">


                @switch($payment->status)


                    @case('waiting_verification')

                        <span class="inline-flex rounded-full bg-amber-100 px-4 py-2 text-xs font-bold text-amber-700">

                            Waiting Verification

                        </span>

                    @break



                    @case('verified')

                        <span class="inline-flex rounded-full bg-emerald-100 px-4 py-2 text-xs font-bold text-emerald-700">

                            Verified

                        </span>

                    @break



                    @case('rejected')

                        <span class="inline-flex rounded-full bg-red-100 px-4 py-2 text-xs font-bold text-red-700">

                            Rejected

                        </span>

                    @break


                @endswitch


            </div>


        </div>


    </div>


</div>



</div>

 {{-- PAYMENT PROOF --}}
<div
    
    class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm transition hover:shadow-lg">


    <div class="mb-8">

        <h2 class="text-xl font-black text-slate-800">

            Bukti Pembayaran

        </h2>


        <p class="mt-2 text-sm text-slate-500">

            Dokumen pembayaran yang dikirim oleh peserta.

        </p>


    </div>




    @if ($payment->payment_proof)


        <div
            class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50">


            {{-- JANGAN UBAH BAGIAN INI --}}
            <img
                src="{{ Storage::url($payment->payment_proof) }}"
                alt="Payment Proof"
                class="w-full object-cover">


        </div>



        <div class="mt-5">


            <a
                href="{{ Storage::url($payment->payment_proof) }}"
                target="_blank"
                class="inline-flex items-center rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition hover:-translate-y-0.5 hover:shadow-xl">


                Lihat Bukti Pembayaran


            </a>


        </div>



    @else


        <div
            class="rounded-2xl border border-dashed border-slate-300 py-16 text-center">


            <p class="text-slate-500">

                Bukti pembayaran belum tersedia.

            </p>


        </div>


    @endif


</div>





</div>


@endsection