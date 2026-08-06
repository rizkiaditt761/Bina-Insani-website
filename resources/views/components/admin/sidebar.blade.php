<aside
    class="flex h-screen w-64 shrink-0 flex-col overflow-y-auto border-r border-slate-200 bg-white">

    {{-- BRAND --}}
    <div
        class="flex h-16 items-center border-b border-slate-200 px-6">


        <div class="flex items-center gap-3">


            <div
                class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-xl bg-gradient-to-br shadow-md">


                
                @if(isset($setting) && $setting?->logo)

                    <img
                        src="{{ asset('storage/' . $setting->logo) }}"
                        class="h-full w-full object-cover"
                        alt="Logo">


                @else

                    <span class="text-lg font-bold text-white">
                        BI
                    </span>

                @endif


            </div>



            <div>

                <h1 class="text-sm font-bold text-gray-800">
                    LPK Bina Insani
                </h1>


                <p class="text-xs text-gray-400">
                    Admin Panel
                </p>

            </div>


        </div>


    </div>





    {{-- NAVIGATION --}}
    <nav
        class="flex-1 overflow-y-auto px-3 py-4">


        <ul class="space-y-2">





            {{-- MAIN MENU --}}
            <div class="pb-2 pt-3 px-3">

                <p
                    class="text-xs font-semibold uppercase tracking-wider text-gray-400">

                    Main Menu

                </p>

            </div>



            {{-- Dashboard --}}
            <li>


                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 transition-all duration-200

                    {{ request()->routeIs('admin.dashboard')
                        ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md'
                        : 'text-gray-700 hover:bg-gray-100 hover:translate-x-1'
                    }}">



                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">


                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 12l2-2m0 0l7-7 7 7m-9 9V9m0 12h6"/>


                    </svg>



                    <span class="font-medium">

                        Dashboard

                    </span>



                </a>


            </li>






            {{-- MASTER DATA --}}
            <div class="pb-2 pt-4 px-3">

                <p
                    class="text-xs font-semibold uppercase tracking-wider text-gray-400">

                    Master Data

                </p>

            </div>





            {{-- Classes --}}
            @if(Route::has('classes.index'))

            <li>

                <a href="{{ route('classes.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 transition-all duration-200

                    {{ request()->routeIs('classes.*')
                        ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md'
                        : 'text-gray-700 hover:bg-gray-100 hover:translate-x-1'
                    }}">


                    <svg class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"/>

                    </svg>


                    <span class="font-medium">
                        Program Kelas
                    </span>


                </a>

            </li>

            @endif






            {{-- Gallery --}}
            @if(Route::has('galleries.index'))

            <li>

                <a href="{{ route('galleries.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 transition-all duration-200

                    {{ request()->routeIs('galleries.*')
                        ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md'
                        : 'text-gray-700 hover:bg-gray-100 hover:translate-x-1'
                    }}">


                    <svg class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 16l4-4 4 4 4-4 4 4M4 6h16v12H4z"/>

                    </svg>


                    <span class="font-medium">
                        Gallery
                    </span>


                </a>

            </li>

            @endif







            {{-- FAQ --}}
            @if(Route::has('faqs.index'))

            <li>

                <a href="{{ route('faqs.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 transition-all duration-200

                    {{ request()->routeIs('faqs.*')
                        ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md'
                        : 'text-gray-700 hover:bg-gray-100 hover:translate-x-1'
                    }}">


                    <svg class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">


                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8 10h8M8 14h4m8-2a8 8 0 11-16 0 8 8 0 0116 0z"/>


                    </svg>


                    <span class="font-medium">
                        FAQ
                    </span>


                </a>

            </li>

            @endif





            {{-- PENDAFTARAN --}}
            <div class="pb-2 pt-4 px-3">

                <p
                    class="text-xs font-semibold uppercase tracking-wider text-gray-400">

                    Pendaftaran

                </p>

            </div>





            @if(Route::has('registrations.index'))

            <li>

                <a href="{{ route('registrations.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 transition-all duration-200

                    {{ request()->routeIs('registrations.*')
                        ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md'
                        : 'text-gray-700 hover:bg-gray-100 hover:translate-x-1'
                    }}">


                    <span class="font-medium">
                        Data Pendaftar
                    </span>


                </a>

            </li>

            @endif




            @if(Route::has('registration-payments.index'))

            <li>

                <a href="{{ route('registration-payments.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 transition-all duration-200

                    {{ request()->routeIs('registration-payments.*')
                        ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md'
                        : 'text-gray-700 hover:bg-gray-100 hover:translate-x-1'
                    }}">


                    <span class="font-medium">
                        Pembayaran
                    </span>


                </a>

            </li>

            @endif





            {{-- SYSTEM --}}
            <div class="pb-2 pt-4 px-3">

                <p
                    class="text-xs font-semibold uppercase tracking-wider text-gray-400">

                    System

                </p>

            </div>




            @if(Route::has('settings.index'))

            <li>

                <a href="{{ route('settings.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 transition-all duration-200

                    {{ request()->routeIs('settings.*')
                        ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md'
                        : 'text-gray-700 hover:bg-gray-100 hover:translate-x-1'
                    }}">


                    <span class="font-medium">
                        Settings
                    </span>


                </a>

            </li>

            @endif




            @if(Route::has('activities.index'))

            <li>

                <a href="{{ route('activities.index') }}"
                    class="flex items-center gap-3 rounded-lg px-3 py-2.5 transition-all duration-200

                    {{ request()->routeIs('activities.*')
                        ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md'
                        : 'text-gray-700 hover:bg-gray-100 hover-translate-x-1'
                    }}">


                    <span class="font-medium">
                        Activity Log
                    </span>


                </a>

            </li>

            @endif



        </ul>


    </nav>



    {{-- FOOTER --}}
    <div
        class="border-t border-gray-200 px-5 py-4">


        <p
            class="text-xs text-gray-400">

            © {{ date('Y') }} LPK Bina Insani

        </p>


    </div>


</aside>