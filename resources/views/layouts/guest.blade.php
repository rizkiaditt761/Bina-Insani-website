<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
        class="scroll-smooth">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', $setting->site_name ?? 'LPK Bina Insani')
    </title>

    <meta name="description"
        content="{{ $setting->description ?? 'LPK Bina Insani' }}">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @stack('styles')

    <style>

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Inter", sans-serif;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f3f4f6;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .section-container {
            max-width: 1200px;
            margin-inline: auto;
            padding-inline: 1.5rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 800;
            color: rgb(17 24 39);
        }

        @media (min-width:768px) {
            .section-title {
                font-size: 2.5rem;
            }
        }

        .section-subtitle {
            color: rgb(107 114 128);
            margin-top: .75rem;
            line-height: 1.75;
        }

        .glass {

            background: rgba(255,255,255,.72);

            backdrop-filter: blur(18px);

            -webkit-backdrop-filter: blur(18px);

            border: 1px solid rgba(255,255,255,.35);
        }

        .card {

            background: white;

            border-radius: 24px;

            box-shadow:
                0 10px 30px rgba(0,0,0,.05);

            transition: .3s ease;
        }

        .card:hover{

            transform: translateY(-6px);

            box-shadow:
                0 20px 45px rgba(0,0,0,.08);

        }

        .btn-primary{

            display:inline-flex;

            align-items:center;

            justify-content:center;

            padding:.9rem 1.8rem;

            border-radius:999px;

            background:#2563eb;

            color:white;

            font-weight:600;

            transition:.3s;

        }

        .btn-primary:hover{

            background:#1d4ed8;

        }

        .btn-outline{

            display:inline-flex;

            align-items:center;

            justify-content:center;

            padding:.9rem 1.8rem;

            border-radius:999px;

            border:1px solid rgb(209 213 219);

            background:white;

            color:#111827;

            font-weight:600;

            transition:.3s;

        }

        .btn-outline:hover{

            background:#f9fafb;

        }

        

    </style>

    <style>

    html{

        scroll-behavior:smooth;

    }

    ::-webkit-scrollbar{

        width:10px;

    }

    ::-webkit-scrollbar-track{

        background:#f1f5f9;

    }

    ::-webkit-scrollbar-thumb{

        background:#2563eb;
        border-radius:9999px;

    }

    ::-webkit-scrollbar-thumb:hover{

        background:#1d4ed8;

    }

    ::selection{

        background:#2563eb;
        color:white;

    }

    </style>

</head>

<body class="bg-white text-gray-800 antialiased overflow-x-hidden">

    <div class="fixed inset-0 -z-50 overflow-hidden">

        <div
            class="absolute -top-40 -left-40 w-[500px] h-[500px]
            rounded-full bg-blue-200 blur-[160px] opacity-30">
        </div>

        <div
            class="absolute top-1/2 -right-52 w-[450px] h-[450px]
            rounded-full bg-sky-200 blur-[180px] opacity-30">
        </div>

        <div
            class="absolute bottom-0 left-1/2 w-[350px] h-[350px]
            rounded-full bg-indigo-200 blur-[150px] opacity-30">
        </div>

    </div>

    {{-- Navbar --}}
    @include('components.guest.navbar')



    <main>

        @yield('content')

    </main>



    



    @stack('scripts')

</body>

</html>