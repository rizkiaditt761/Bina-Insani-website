@extends('layouts.admin')

@section('title', 'Dashboard Admin')


@section('content')


<div>


    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Dashboard Admin
        </h1>

        <p class="text-gray-500 mt-1">
            Selamat datang kembali di panel administrasi LPK Bina Insani.
        </p>

    </div>



    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">


        <div class="bg-white rounded-xl shadow-sm p-6">

            <p class="text-sm text-gray-500">
                Total Pendaftar
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $totalRegistrations }}
            </h2>

        </div>



        <div class="bg-white rounded-xl shadow-sm p-6">

            <p class="text-sm text-gray-500">
                Total Kelas
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $totalClasses }}
            </h2>

        </div>



        <div class="bg-white rounded-xl shadow-sm p-6">

            <p class="text-sm text-gray-500">
                Pending Pembayaran
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $pendingPayments }}
            </h2>

        </div>



        <div class="bg-white rounded-xl shadow-sm p-6">

            <p class="text-sm text-gray-500">
                Total Gallery
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $totalGalleries }}
            </h2>

        </div>


    </div>


</div>


@endsection