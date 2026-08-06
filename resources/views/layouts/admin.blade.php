<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    {{-- Favicon --}}
    @if($setting?->favicon)

        <link
            rel="icon"
            href="{{ asset('storage/'.$setting->favicon) }}?v={{ time() }}">

    @else

        <link
            rel="icon"
            href="{{ asset('favicon.ico') }}">

    @endif

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        @yield('title', 'Admin Dashboard')

    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')

</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex">

        @include('components.admin.sidebar')

        <div class="flex-1 flex flex-col">

            @include('components.admin.topbar')

            <main class="flex-1 p-6">

                @yield('content')

            </main>

        </div>

    </div>

    @stack('scripts')

</body>

</html>