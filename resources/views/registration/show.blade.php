@extends('layouts.guest')

@section('title', 'Status Pendaftaran')

@section('content')

<section
    class="relative min-h-screen overflow-hidden bg-gradient-to-b from-blue-50 via-white to-white py-20">


    <div
        class="absolute -left-20 top-40 h-72 w-72 rounded-full bg-blue-200/30 blur-3xl">
    </div>

    <div
        class="absolute -right-20 bottom-40 h-72 w-72 rounded-full bg-indigo-200/30 blur-3xl">
    </div>


    <div
        class="relative mx-auto max-w-5xl px-6">


        {{-- Header --}}
        <div
            class="text-center">


            <span
                class="inline-flex rounded-full bg-blue-100 px-5 py-2 text-sm font-semibold text-blue-700">

                Status Pendaftaran

            </span>


            <h1
                class="mt-6 text-4xl font-black text-gray-900 md:text-5xl">

                {{ $registration->registration_number }}

            </h1>


            <p
                class="mt-4 text-gray-600">

                Pantau perkembangan proses pendaftaran kamu melalui halaman ini.

            </p>


        </div>



        {{-- Status Card --}}
        <div
            class="mt-12 rounded-3xl bg-white p-8 shadow-xl border border-gray-100">


            <div
                class="flex flex-col gap-8 md:flex-row md:items-center md:justify-between">


                <div>


                    <p class="text-sm text-gray-500">
                        Status Saat Ini
                    </p>


                    @switch($registration->display_status)

                        @case('waiting_payment')

                            <span
                                class="mt-3 inline-flex rounded-full bg-yellow-100 px-5 py-2 font-semibold text-yellow-700">

                                Menunggu Pembayaran

                            </span>

                            @break


                        @case('expired')

                            <span
                                class="mt-3 inline-flex rounded-full bg-red-100 px-5 py-2 font-semibold text-red-700">

                                Pendaftaran Expired

                            </span>

                            @break


                        @case('payment_rejected')

                            <span
                                class="mt-3 inline-flex rounded-full bg-red-100 px-5 py-2 font-semibold text-red-700">

                                Pembayaran Ditolak

                            </span>

                            @break


                        @case('waiting_verification')

                            <span
                                class="mt-3 inline-flex rounded-full bg-blue-100 px-5 py-2 font-semibold text-blue-700">

                                Menunggu Verifikasi

                            </span>

                            @break


                        @case('accepted')

                            <span
                                class="mt-3 inline-flex rounded-full bg-green-100 px-5 py-2 font-semibold text-green-700">

                                Pendaftaran Diterima

                            </span>

                            @break


                        @case('rejected')

                            <span
                                class="mt-3 inline-flex rounded-full bg-red-100 px-5 py-2 font-semibold text-red-700">

                                Pendaftaran Ditolak

                            </span>

                            @break

                    @endswitch


                </div>



                @if(
                    in_array($registration->display_status, [
                        'waiting_payment',
                        'payment_rejected'
                    ])
                )

                    <a
                        href="{{ route(
                            'registration.payment.create',
                            $registration->registration_number
                        ) }}"
                        class="rounded-xl mt-6 bg-blue-600 px-7 py-3 text-center font-bold text-white shadow-lg transition hover:bg-blue-700">

                        @if(
                            $registration->payments->isNotEmpty() &&
                            $registration->payments
                                ->sortByDesc('created_at')
                                ->first()
                                ->status === 'rejected'
                        )

                            Upload Ulang Bukti Pembayaran

                        @else

                            Bayar Sekarang

                        @endif

                    </a>

                @endif


                @if($registration->display_status === 'waiting_payment')

                    <form
                        action="{{ route(
                            'registration.cancel',
                            $registration->registration_number
                        ) }}"
                        method="POST"
                        class="inline mt-6"
                        onsubmit="return confirm(
                            'Apakah kamu yakin ingin membatalkan pendaftaran ini? Pendaftaran yang sudah dibatalkan tidak dapat dilanjutkan.'
                        )">

                        @csrf

                        <button
                            type="submit"
                            class="rounded-xl border border-red-200 bg-red-50 px-7 py-3 font-bold text-red-600 transition hover:bg-red-100">

                            Batalkan Pendaftaran

                        </button>

                    </form>

                @endif


            </div>


        </div>

        

        @if(

            $registration->status === 'payment_rejected' &&
            $registration->payments->isNotEmpty() &&
            $registration->payments->sortByDesc('created_at')->first()->status === 'rejected'
        )

            <div
                class="mt-8 rounded-3xl border border-red-200 bg-red-50 p-8 shadow-lg">

                <div class="flex items-start gap-5">

                    <div
                        class="flex h-14 w-14 items-center justify-center rounded-full bg-red-100 text-2xl">

                        ❌

                    </div>

                    <div class="flex-1">

                        <h2
                            class="text-2xl font-bold text-red-700">

                            Pembayaran Ditolak

                        </h2>

                        <p
                            class="mt-3 text-slate-600">

                            Bukti pembayaran yang Anda kirim belum dapat diverifikasi.
                            Silakan periksa alasan dari admin di bawah ini, kemudian lakukan pembayaran ulang dan upload bukti pembayaran yang baru.

                        </p>

                        @php
                            $lastPayment = $registration->payments
                                ->sortByDesc('created_at')
                                ->first();
                        @endphp

                        @if($lastPayment?->rejection_reason)

    <div
        class="mt-6 rounded-2xl border border-red-200 bg-white p-5">

        <p
            class="text-xs font-bold uppercase tracking-wider text-red-600">

            Alasan dari Admin

        </p>

        <p
            class="mt-3 leading-7 text-slate-700">

            {{ $lastPayment->rejection_reason }}

        </p>

    </div>

@endif

                    </div>

                </div>

            </div>

        @endif


        {{-- Timeline --}}
        <div
            class="mt-8 rounded-3xl bg-white p-8 shadow-xl border border-gray-100">


            <h2
                class="text-2xl font-bold text-gray-900">

                Progress Pendaftaran

            </h2>



            <div
                class="mt-8 grid gap-5 md:grid-cols-4">


                @php
                    $steps = [
                        [
                            'title'=>'Pendaftaran',
                            'done'=>true
                        ],
                        [
                            'title'=>'Pembayaran',
                            'done' => in_array(
                                $registration->status,
                                [
                                    'waiting_verification',
                                    'accepted'
                                ]
                            )
                        ],
                        [
                            'title'=>'Verifikasi',
                            'done'=>$registration->status === 'accepted'
                        ],
                        [
                            'title'=>'Mulai Program',
                            'done'=>false
                        ],
                    ];
                @endphp



                @foreach($steps as $step)

                    <div
                        class="rounded-2xl border p-5 text-center">


                        <div
                            class="{{ $step['done'] 
                                ? 'bg-blue-600 text-white' 
                                : 'bg-gray-100 text-gray-400' 
                            }} mx-auto flex h-12 w-12 items-center justify-center rounded-full font-bold">


                            @if($step['done'])

                                ✓

                            @else

                                {{ $loop->iteration }}

                            @endif


                        </div>


                        <h3
                            class="mt-4 font-bold text-gray-900">

                            {{ $step['title'] }}

                        </h3>


                    </div>


                @endforeach


            </div>


        </div>




        {{-- Participant --}}
        <div
            class="mt-8 rounded-3xl bg-white p-8 shadow-xl border border-gray-100">


            <h2
                class="text-2xl font-bold text-gray-900">

                Data Peserta

            </h2>



            <div
                class="mt-8 grid gap-6 md:grid-cols-2">


                @foreach([
                    'Nama Lengkap'=>$registration->full_name,
                    'Email'=>$registration->email,
                    'WhatsApp'=>$registration->phone,
                    'Jenis Kelamin'=>$registration->gender,
                    'Tanggal Lahir'=>$registration->birth_date,
                    'Kota'=>$registration->city,
                ] as $label=>$value)


                    <div>

                        <p class="text-sm text-gray-500">
                            {{ $label }}
                        </p>


                        <p
                            class="mt-2 font-semibold text-gray-900">

                            {{ $value }}

                        </p>


                    </div>


                @endforeach


            </div>



            <div class="mt-8">

                <p class="text-sm text-gray-500">
                    Alamat
                </p>


                <p class="mt-2 leading-7 text-gray-700">

                    {{ $registration->address }}

                </p>


            </div>


        </div>




        {{-- Program --}}
        <div
            class="mt-8 rounded-3xl bg-gradient-to-br from-blue-600 to-indigo-700 p-8 text-white shadow-xl">


            <h2
                class="text-2xl font-bold">

                Program Pelatihan

            </h2>


            <h3
                class="mt-6 text-3xl font-black">

                {{ $registration->courseClass->name }}

            </h3>


            @if($registration->courseClass->description)

                <p
                    class="mt-4 leading-8 text-blue-100">

                    {{ $registration->courseClass->description }}

                </p>

            @endif


            <div
                class="mt-8 flex flex-wrap gap-3">


                <span
                    class="rounded-full bg-white/20 px-4 py-2 text-sm font-semibold">

                    Rp {{ number_format($registration->courseClass->registration_fee,0,',','.') }}

                </span>


                @if($registration->courseClass->duration)

                    <span
                        class="rounded-full bg-white/20 px-4 py-2 text-sm font-semibold">

                        {{ $registration->courseClass->duration }}

                    </span>

                @endif


            </div>


        </div>



    </div>


</section>

@endsection