<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">


    <title>

        @yield('title', 'Admin Panel')

    </title>


    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])

</head>



<body
    class="h-screen overflow-hidden bg-slate-100 text-slate-800 antialiased">



    <div
        class="flex h-screen overflow-hidden">



        {{-- Sidebar --}}
        @include('components.admin.sidebar')





        {{-- Right Content --}}
        <div
            class="flex min-w-0 flex-1 flex-col h-screen">





            {{-- Topbar --}}
            @include('components.admin.topbar')






            <main
    class="flex-1 overflow-y-auto">


    <div
        class="min-h-full flex flex-col">


        <div class="flex-1 p-6 lg:p-8">

            <div class="pb-8">

                @yield('content')

            </div>

        </div>





        {{-- Footer --}}
        <footer
            class="border-t border-slate-200 bg-white px-6 py-4 lg:px-8">


            <div
                class="flex items-center justify-between text-xs text-slate-400">


                <p>
                    © {{ date('Y') }} LPK Bina Insani
                </p>


                <p>
                    Admin Panel
                </p>


            </div>


        </footer>


    </div>


</main>






        </div>



    </div>


@stack('scripts')
</body>

</html>