<aside class="w-64 bg-white border-r border-gray-200 min-h-screen">

    <div class="h-16 flex items-center px-6 border-b">

        <h1 class="text-xl font-bold text-gray-800">
            LPK Bina Insani
        </h1>

    </div>


    <nav class="p-4 space-y-2">


        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center px-4 py-3 rounded-lg
            {{ request()->routeIs('admin.dashboard')
                ? 'bg-blue-600 text-white'
                : 'text-gray-700 hover:bg-gray-100' }}">

            <span>
                Dashboard
            </span>

        </a>



        {{-- Master Data --}}
        <div class="pt-4">

            <p class="px-4 text-xs font-semibold text-gray-400 uppercase">
                Master Data
            </p>


            <div class="mt-2 space-y-1">


                <a href="{{ route('classes.index') }}"
                    class="block px-4 py-2 rounded-lg text-sm
                    text-gray-700 hover:bg-gray-100">

                    Kelas

                </a>



                <a href="{{ route('galleries.index') }}"
                    class="block px-4 py-2 rounded-lg text-sm
                    text-gray-700 hover:bg-gray-100">

                    Gallery

                </a>



                <a href="{{ route('faqs.index') }}"
                    class="block px-4 py-2 rounded-lg text-sm
                    text-gray-700 hover:bg-gray-100">

                    FAQ

                </a>


            </div>

        </div>




        {{-- Pendaftaran --}}
        <div class="pt-4">

            <p class="px-4 text-xs font-semibold text-gray-400 uppercase">
                Pendaftaran
            </p>


            <div class="mt-2 space-y-1">


                <a href="{{ route('registrations.index') }}"
                    class="block px-4 py-2 rounded-lg text-sm
                    text-gray-700 hover:bg-gray-100">

                    Data Pendaftar

                </a>



                <a href="{{ route('registration-payments.index') }}"
                    class="block px-4 py-2 rounded-lg text-sm
                    text-gray-700 hover:bg-gray-100">

                    Pembayaran

                </a>


            </div>


        </div>





        {{-- System --}}
        <div class="pt-4">


            <p class="px-4 text-xs font-semibold text-gray-400 uppercase">
                System
            </p>


            <div class="mt-2 space-y-1">


                <a href="{{ route('settings.index') }}"
                    class="block px-4 py-2 rounded-lg text-sm
                    text-gray-700 hover:bg-gray-100">

                    Settings

                </a>



                <a href="{{ route('activities.index') }}"
                    class="block px-4 py-2 rounded-lg text-sm
                    text-gray-700 hover:bg-gray-100">

                    Activity Log

                </a>


            </div>


        </div>


    </nav>


</aside>