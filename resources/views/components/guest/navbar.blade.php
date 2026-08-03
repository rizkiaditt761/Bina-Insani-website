<nav
    x-data="{ open: false }"
    class="fixed inset-x-0 top-0 z-50 px-4 pt-4">


    <div
        class="section-container">


        <div
            class="rounded-2xl
                   border border-white/40
                   bg-white/70
                   px-5
                   py-3
                   shadow-[0_8px_30px_rgba(15,23,42,.08)]
                   backdrop-blur-xl
                   transition-all
                   duration-300">



            <div
                class="flex items-center justify-between">






                {{-- Logo --}}
                <a
                    href="{{ route('home') }}"
                    class="flex items-center gap-3">


                    <div
                        class="flex
                               h-10
                               w-10
                               items-center
                               justify-center
                               rounded-xl
                               bg-gradient-to-br
                               from-blue-600
                               to-indigo-600
                               text-sm
                               font-black
                               text-white
                               shadow-md">

                        BI

                    </div>




                    <div
                        class="hidden sm:block">


                        <h1
                            class="text-base font-black leading-none tracking-tight text-slate-900">

                            {{ $setting->site_name ?? 'LPK Bina Insani' }}

                        </h1>


                        <p
                            class="mt-1 text-[11px] text-slate-500">

                            Lembaga Pelatihan Kerja

                        </p>


                    </div>


                </a>









                {{-- Desktop Menu --}}
                <div
                    class="hidden lg:flex items-center gap-1">


                    @foreach([
                        'hero'=>'Beranda',
                        'about'=>'Tentang',
                        'classes'=>'Program',
                        'gallery'=>'Galeri',
                        'faq'=>'FAQ',
                        'contact'=>'Kontak'
                    ] as $id => $title)


                        <a
                            href="#{{ $id }}"
                            class="rounded-lg
                                   px-3
                                   py-2
                                   text-sm
                                   font-semibold
                                   text-slate-700
                                   transition
                                   duration-300
                                   hover:bg-blue-50
                                   hover:text-blue-600">


                            {{ $title }}


                        </a>


                    @endforeach


                </div>









                {{-- Desktop Action --}}
                <div
                    class="hidden lg:flex items-center gap-2">

                    <a
                        href="{{ route('registration.create') }}"
                        class="rounded-xl
                               bg-gradient-to-r
                               from-blue-600
                               to-indigo-600
                               px-5
                               py-2
                               text-sm
                               font-semibold
                               text-white
                               shadow-md
                               transition
                               duration-300
                               hover:-translate-y-0.5
                               hover:shadow-lg">


                        Daftar Sekarang 

                        

                    </a>


                </div>









                {{-- Mobile Button --}}
                <button
                    @click="open = !open"
                    class="rounded-lg
                           p-2
                           transition
                           hover:bg-slate-100
                           lg:hidden">


                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-slate-700"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">


                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>


                    </svg>


                </button>


            </div>









            {{-- Mobile Menu --}}
            <div
                x-show="open"
                x-transition
                x-cloak
                class="mt-4
                       rounded-2xl
                       border
                       border-slate-200
                       bg-white
                       p-4
                       shadow-xl
                       lg:hidden">


                <div
                    class="flex flex-col gap-1">



                    @foreach([
                        'hero'=>'Beranda',
                        'about'=>'Tentang',
                        'classes'=>'Program',
                        'gallery'=>'Galeri',
                        'faq'=>'FAQ',
                        'contact'=>'Kontak'
                    ] as $id => $title)


                        <a
                            href="#{{ $id }}"
                            @click="open=false"
                            class="rounded-xl
                                   px-4
                                   py-3
                                   text-sm
                                   font-medium
                                   text-slate-700
                                   transition
                                   hover:bg-blue-50
                                   hover:text-blue-600">


                            {{ $title }}


                        </a>


                    @endforeach





                    <div
                        class="my-2 border-t border-slate-200">
                    </div>





                    @auth


                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="rounded-xl
                                   border
                                   border-slate-200
                                   px-5
                                   py-3
                                   text-center
                                   text-sm
                                   font-semibold
                                   text-slate-700">


                            Dashboard


                        </a>


                    @else


                        <a
                            href="{{ route('login') }}"
                            class="rounded-xl
                                   border
                                   border-slate-200
                                   px-5
                                   py-3
                                   text-center
                                   text-sm
                                   font-semibold
                                   text-slate-700">


                            Login


                        </a>


                    @endauth






                    <a
                        href="{{ route('registration.create') }}"
                        class="rounded-xl
                               bg-gradient-to-r
                               from-blue-600
                               to-indigo-600
                               px-5
                               py-3
                               text-center
                               text-sm
                               font-semibold
                               text-white">


                        Daftar Sekarang


                    </a>


                </div>


            </div>


        </div>


    </div>


</nav>