@extends('layouts.auth')

@section('title', 'Login Admin')


@section('content')

<div class="w-full max-w-md">


    {{-- Logo / Brand --}}
    <div class="text-center mb-8">

        <h1 class="text-3xl font-bold text-gray-900">
            LPK Bina Insani
        </h1>

        <p class="mt-2 text-sm text-gray-500">
            Panel Administrasi
        </p>

    </div>



    {{-- Login Card --}}
    <div class="bg-white rounded-2xl shadow-lg p-8">


        {{-- Session Status --}}
        <x-auth-session-status 
            class="mb-4"
            :status="session('status')" 
        />



        <form method="POST" action="{{ route('login') }}">

            @csrf



            {{-- Email --}}
            <div>

                <x-input-label 
                    for="email"
                    :value="__('Email')" 
                />


                <x-text-input

                    id="email"

                    class="block mt-2 w-full"

                    type="email"

                    name="email"

                    :value="old('email')"

                    required

                    autofocus

                    autocomplete="username"

                />


                <x-input-error

                    :messages="$errors->get('email')"

                    class="mt-2"

                />

            </div>




            {{-- Password --}}
            <div class="mt-5">


                <x-input-label

                    for="password"

                    :value="__('Password')" 

                />


                <x-text-input

                    id="password"

                    class="block mt-2 w-full"

                    type="password"

                    name="password"

                    required

                    autocomplete="current-password"

                />


                <x-input-error

                    :messages="$errors->get('password')"

                    class="mt-2"

                />


            </div>




            {{-- Remember --}}
            <div class="mt-5">

                <label class="inline-flex items-center">

                    <input

                        id="remember_me"

                        type="checkbox"

                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"

                        name="remember"

                    >


                    <span class="ms-2 text-sm text-gray-600">

                        Ingat saya

                    </span>


                </label>

            </div>




            {{-- Button --}}
            <div class="mt-6">


                <button

                    type="submit"

                    class="w-full rounded-lg bg-blue-600 py-3 text-white font-semibold hover:bg-blue-700 transition"

                >

                    Login


                </button>


            </div>


        </form>


    </div>



    <p class="text-center text-xs text-gray-400 mt-6">

        © {{ date('Y') }} LPK Bina Insani

    </p>


</div>


@endsection