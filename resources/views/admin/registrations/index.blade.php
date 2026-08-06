@extends('layouts.app')

@section('title', 'Registration Management')

@section('content')

<div class="space-y-8">


{{-- HEADER --}}
<div
    data-aos="fade-down"
    class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-950 via-blue-900 to-indigo-900 p-7 text-white shadow-xl">


    <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-blue-400/20 blur-3xl"></div>

    <div class="absolute -left-10 bottom-0 h-32 w-32 rounded-full bg-cyan-400/10 blur-2xl"></div>



    <div class="relative flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">


        <div>

            <span
                class="inline-flex rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-blue-100">

                Registration Management

            </span>


            <h1 class="mt-4 text-3xl font-black">

                Data Pendaftar

            </h1>


            <p class="mt-2 max-w-2xl text-sm text-blue-100">

                Kelola data peserta yang melakukan pendaftaran program Bina Insani.

            </p>


        </div>


        <div
            class="rounded-2xl border border-white/10 bg-white/10 px-6 py-5 backdrop-blur">


            <p class="text-xs uppercase tracking-wider text-blue-100">

                Total Pendaftar

            </p>


            <h2 class="mt-2 text-4xl font-black">

                {{ $total }}

            </h2>


        </div>


    </div>


</div>





{{-- STATISTIC CARD --}}
<div
data-aos="fade-up"
class="grid gap-6 md:grid-cols-3 lg:grid-cols-4">



<div
class="rounded-3xl border border-yellow-200 bg-yellow-50 p-6 shadow-sm">


<p class="text-sm font-bold text-yellow-600">

Waiting Payment

</p>


<h2 class="mt-3 text-4xl font-black text-slate-800">

{{ $waitingPayment }}

</h2>


</div>





<div
class="rounded-3xl border border-blue-200 bg-blue-50 p-6 shadow-sm">


<p class="text-sm font-bold text-blue-600">

Waiting Verification

</p>


<h2 class="mt-3 text-4xl font-black text-slate-800">

{{ $waitingVerification }}

</h2>


</div>





<div
class="rounded-3xl border border-emerald-200 bg-emerald-50 p-6 shadow-sm">


<p class="text-sm font-bold text-emerald-600">

Accepted

</p>


<h2 class="mt-3 text-4xl font-black text-slate-800">

{{ $accepted }}

</h2>


</div>





<div
class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">


<p class="text-sm font-bold text-slate-600">

Total Data

</p>


<h2 class="mt-3 text-4xl font-black text-slate-800">

{{ $total }}

</h2>


</div>


</div>






{{-- TABLE --}}
<div
data-aos="fade-up"
data-aos-delay="100"
class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">



<div class="border-b border-slate-100 px-7 py-5">


<h2 class="text-xl font-black text-slate-800">

Daftar Pendaftar

</h2>


<p class="mt-1 text-sm text-slate-500">

Informasi utama peserta yang melakukan pendaftaran.

</p>


</div>





<div class="overflow-x-auto">


<table class="min-w-full">


<thead class="bg-slate-50">


<tr>


<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">

Peserta

</th>


<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">

Program

</th>


<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">

Pendidikan

</th>


<th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">

Status

</th>


<th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">

Action

</th>


</tr>


</thead>





<tbody class="divide-y divide-slate-100">



@forelse($registrations as $registration)



<tr class="transition hover:bg-slate-50">



<td class="px-6 py-5">


<div class="font-bold text-slate-800">

{{ $registration->full_name }}

</div>


<div class="text-sm text-slate-500">

{{ $registration->registration_number }}

</div>


<div class="text-sm text-slate-500">

{{ $registration->email }}

</div>


</td>





<td class="px-6 py-5">


<p class="font-semibold text-slate-700">

{{ $registration->courseClass->name ?? '-' }}

</p>


</td>





<td class="px-6 py-5">


<p class="font-medium text-slate-700">

{{ $registration->last_education }}

</p>


</td>





<td class="px-6 py-5 text-center">


{{-- CEK PAYMENT TERLEBIH DAHULU --}}
@if($registration->payment && $registration->payment->status === 'rejected')


<span
class="rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">

Payment Rejected

</span>



@else


@switch($registration->status)



@case('waiting_payment')

<span
class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-bold text-yellow-700">

Waiting Payment

</span>

@break



@case('waiting_verification')

<span
class="rounded-full bg-blue-100 px-3 py-1 text-xs font-bold text-blue-700">

Waiting Verification

</span>

@break



@case('accepted')

<span
class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700">

Accepted

</span>

@break



@case('rejected')

<span
class="rounded-full bg-red-100 px-3 py-1 text-xs font-bold text-red-700">

Rejected

</span>

@break



@endswitch


@endif


</td>





    <td class="px-6 py-5 text-center">


    <a
    href="{{ route('registrations.show',$registration->id) }}"
    class="inline-flex rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow transition hover:-translate-y-0.5">


    Detail


    </a>


</td>



</tr>



@empty



<tr>

<td colspan="5"
class="px-6 py-12 text-center text-slate-500">


Belum ada data pendaftar.


</td>

</tr>



@endforelse



</tbody>


</table>


</div>


</div>






{{-- PAGINATION --}}
@if($registrations->hasPages())


<div
data-aos="fade-up"
class="flex justify-center">


{{ $registrations->links() }}


</div>


@endif



</div>


@endsection