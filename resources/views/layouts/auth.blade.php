<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Authentication')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')

</head>


<body class="min-h-screen bg-gray-100 text-gray-800 antialiased">


    <main class="min-h-screen flex items-center justify-center px-6">


        @yield('content')


    </main>


    @stack('scripts')


</body>

</html>