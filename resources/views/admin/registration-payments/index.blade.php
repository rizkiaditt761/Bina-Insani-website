@extends('layouts.app')

@section('title', 'Registration Payment')

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

                Payment Management

            </span>


            <h1 class="mt-4 text-2xl font-black tracking-tight lg:text-3xl">

                Registration Payments

            </h1>


           <p class="mt-2 max-w-xl text-sm leading-6 text-blue-100">

                Kelola pembayaran peserta LPK Bina Insani,
                pantau status pembayaran, dan lakukan verifikasi.

            </p>


        </div>



        <div
            class="rounded-3xl border border-white/10 bg-white/10 p-4 backdrop-blur">


            <p class="text-xs uppercase tracking-wider text-blue-100">

                Total Payment

            </p>


            <h2 class="mt-2 text-2xl font-black">

                {{ method_exists($payments,'total') ? $payments->total() : $payments->count() }}

            </h2>


        </div>


    </div>


</div>




{{-- SUMMARY --}}
<div
    data-aos="fade-up"
    class="grid gap-6 md:grid-cols-3">


<div
    class="rounded-3xl border border-amber-200 bg-gradient-to-br from-amber-50 to-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">


<p class="text-sm font-bold uppercase tracking-wide text-amber-600">
Waiting Verification
</p>


<h2 class="mt-3 text-4xl font-black text-slate-900">
{{ $pending ?? 0 }}
</h2>


</div>




<div
    class="rounded-3xl border border-emerald-200 bg-gradient-to-br from-emerald-50 to-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">


<p class="text-sm font-bold uppercase tracking-wide text-emerald-600">
Verified
</p>


<h2 class="mt-3 text-4xl font-black text-slate-900">
{{ $verified ?? 0 }}
</h2>


</div>




<div
    class="rounded-3xl border border-red-200 bg-gradient-to-br from-red-50 to-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">


<p class="text-sm font-bold uppercase tracking-wide text-red-600">
Rejected
</p>


<h2 class="mt-3 text-4xl font-black text-slate-900">
{{ $rejected ?? 0 }}
</h2>


</div>


</div>




{{-- TABLE --}}
<div
    data-aos="fade-up"
    data-aos-delay="150"
    class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">


    {{-- Table Header --}}
    <div
        class="border-b border-slate-100 bg-gradient-to-r from-slate-50 via-blue-50 to-indigo-50 px-8 py-6">


        <h2 class="text-xl font-bold text-slate-800">
            Payment List
        </h2>


        <p class="mt-1 text-sm text-slate-500">
            Daftar pembayaran peserta LPK Bina Insani.
        </p>


    </div>




    <div class="overflow-x-auto">


        <table class="min-w-full">


            <thead class="bg-slate-900">


                <tr>


                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-blue-100">
                        Peserta
                    </th>


                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-blue-100">
                        Program
                    </th>


                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-blue-100">
                        Nominal
                    </th>


                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-blue-100">
                        Status
                    </th>


                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-blue-100">
                        Bukti
                    </th>


                </tr>


            </thead>




            <tbody class="divide-y divide-slate-100">


            @forelse($payments as $payment)


                <tr class="transition duration-200 hover:bg-blue-50/50">


                    <td class="px-6 py-5">


                        <div class="font-semibold text-slate-800">

                            {{ $payment->registration->full_name ?? '-' }}

                        </div>


                        <div class="mt-1 text-sm text-slate-500">

                            {{ $payment->registration->email ?? '-' }}

                        </div>


                    </td>





                    <td class="px-6 py-5">


                        <span class="text-sm font-medium text-slate-700">

                            {{ $payment->registration->courseClass->name ?? '-' }}

                        </span>


                    </td>





                    <td class="px-6 py-5 text-center">


                        <span class="font-bold text-slate-800">

                            Rp {{ number_format($payment->amount ?? 0,0,',','.') }}

                        </span>


                    </td>





                    <td class="px-6 py-5 text-center">


                        @if($payment->status == 'verified')


                            <span
                                class="inline-flex rounded-full bg-emerald-100 px-4 py-1.5 text-xs font-bold text-emerald-700">

                                Verified

                            </span>


                        @elseif($payment->status == 'rejected')


                            <span
                                class="inline-flex rounded-full bg-red-100 px-4 py-1.5 text-xs font-bold text-red-700">

                                Rejected

                            </span>


                        @else


                            <span
                                class="inline-flex rounded-full bg-amber-100 px-4 py-1.5 text-xs font-bold text-amber-700">

                                Waiting Verification

                            </span>


                        @endif


                    </td>





                    <td class="px-6 py-5">

                    <div class="flex flex-wrap justify-center gap-2">


                    {{-- WAITING --}}
                    @if($payment->status == 'waiting_verification')


                        {{-- DETAIL --}}
                        <a
                            href="{{ route('registration-payments.show',$payment) }}"
                            class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                            Detail

                        </a>



                        {{-- APPROVE --}}
                        <form
                            action="{{ route('registration-payments.approve',$payment->id) }}"
                            method="POST">

                            @csrf
                            @method('PATCH')


                            <button
                                type="submit"
                                class="rounded-xl bg-gradient-to-r from-green-600 to-emerald-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                                Approve

                            </button>


                        </form>




                        {{-- REJECT --}}
                        <button
                            type="button"
                            onclick="openRejectModal('{{ $payment->id }}')"
                            class="rounded-xl bg-gradient-to-r from-red-500 to-red-600 px-3 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                            Reject

                        </button>



                    {{-- SUDAH DIPROSES --}}
                    @else


                        <a
                            href="{{ route('registration-payments.show',$payment) }}"
                            class="rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2 text-xs font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">

                            Detail

                        </a>


                    @endif


                    </div>

                    </td>




                </tr>



            @empty


                <tr>


                    <td colspan="5"
                        class="px-6 py-12 text-center text-slate-500">


                        Belum ada pembayaran.


                    </td>


                </tr>


            @endforelse



            </tbody>


        </table>


    </div>


</div>




{{-- PAGINATION --}}
@if(method_exists($payments,'links'))

<div
    data-aos="fade-up"
    data-aos-delay="200"
    class="flex justify-center rounded-3xl bg-white p-4 shadow-sm">


    {{ $payments->links() }}


</div>

@endif



</div>

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function(){

    if(typeof AOS !== 'undefined'){

        AOS.refresh();

    }

});

</script>

@endpush

{{-- Reject Modal --}}
<div
    id="rejectModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/70 px-4 backdrop-blur-sm">


    <div
        class="w-full max-w-xl overflow-hidden rounded-3xl bg-white shadow-2xl">


        {{-- Header --}}
        <div
            class="bg-gradient-to-r from-red-600 to-rose-600 p-6 text-white">


            <div class="flex items-start gap-4">


                <div
                    class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/20 backdrop-blur">


                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">


                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>


                    </svg>


                </div>



                <div>


                    <h2 class="text-2xl font-black">

                        Tolak Pembayaran

                    </h2>


                    <p class="mt-1 text-sm text-red-100">

                        Berikan alasan agar peserta mengetahui
                        penyebab pembayaran ditolak.

                    </p>


                </div>


            </div>


        </div>





        {{-- Body --}}
        <form
            id="rejectForm"
            method="POST"
            class="p-8">


            @csrf
            @method('PATCH')



            <label
                class="mb-3 block text-sm font-bold text-slate-700">


                Alasan Penolakan


            </label>



            <textarea
                name="rejection_reason"
                rows="5"
                required
                placeholder="Contoh: Bukti pembayaran kurang jelas, nominal tidak sesuai, atau rekening tujuan tidak sesuai."
                class="w-full resize-none rounded-2xl border-slate-300 bg-slate-50 text-sm text-slate-700 transition focus:border-red-500 focus:bg-white focus:ring-red-500"></textarea>



            <div
                class="mt-3 flex items-center gap-2 text-xs text-slate-500">


                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 text-red-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">


                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01"/>


                </svg>


                Alasan ini akan terlihat oleh peserta.


            </div>




            {{-- Action --}}
            <div
                class="mt-8 flex justify-end gap-3">


                <button
                    type="button"
                    onclick="closeRejectModal()"
                    class="rounded-xl border border-slate-300 px-5 py-2.5 font-semibold text-slate-600 transition hover:bg-slate-100">


                    Batal


                </button>




                <button
                    type="submit"
                    class="rounded-xl bg-gradient-to-r from-red-600 to-rose-600 px-6 py-2.5 font-semibold text-white shadow-lg transition hover:-translate-y-0.5 hover:shadow-xl">


                    Tolak Pembayaran


                </button>


            </div>


        </form>


    </div>


</div>

<script>

function openRejectModal(id)
{

    document
        .getElementById('rejectModal')
        .classList.remove('hidden');


    document
        .getElementById('rejectModal')
        .classList.add('flex');


    document
        .getElementById('rejectForm')
        .action =
        "/admin/registration-payments/" + id + "/reject";

}



function closeRejectModal()
{

    document
        .getElementById('rejectModal')
        .classList.remove('flex');


    document
        .getElementById('rejectModal')
        .classList.add('hidden');

}

</script>

@endsection