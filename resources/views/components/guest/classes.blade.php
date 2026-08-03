<section
    id="classes"
    data-aos="fade-up"
    class="relative overflow-hidden bg-gradient-to-b from-slate-50 to-white py-28">


    {{-- Background Decoration --}}
    <div
        class="absolute -top-32 -left-32 h-[420px] w-[420px] rounded-full bg-blue-100 blur-3xl opacity-60">
    </div>


    <div
        class="absolute -bottom-40 -right-40 h-[500px] w-[500px] rounded-full bg-indigo-100 blur-3xl opacity-60">
    </div>







    <div
        class="section-container relative">


        {{-- =========================== --}}
        {{-- Header --}}
        {{-- =========================== --}}

        <div
            class="mx-auto mb-20 max-w-4xl text-center">


            <span
                data-aos="fade-down"
                data-aos-delay="100"
                class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-5 py-2 font-semibold text-blue-700">


                <span
                    class="h-2 w-2 rounded-full bg-blue-600">
                </span>


                Program Pelatihan


            </span>






            <h2
                data-aos="fade-up"
                data-aos-delay="200"
                class="mt-6 text-4xl font-black leading-tight text-slate-900 md:text-5xl xl:text-6xl">


                Pilih Program yang


                <span
                    class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">


                    Sesuai Tujuanmu


                </span>


            </h2>







            <p
                data-aos="fade-up"
                data-aos-delay="300"
                class="mx-auto mt-8 max-w-3xl text-lg leading-9 text-slate-600">


                Semua program dirancang untuk membekali peserta dengan
                kemampuan bahasa Jepang, budaya kerja, serta keterampilan
                profesional sebelum diberangkatkan bekerja di Jepang.


            </p>


        </div>









        @if($classes->count())


            <div
                class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">


                @foreach($classes as $class)


                    <div
                        data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 150 }}"
                        class="group overflow-hidden rounded-[34px] border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-3 hover:shadow-[0_30px_70px_rgba(37,99,235,.15)]">







                        {{-- ====================== --}}
                        {{-- Header --}}
                        {{-- ====================== --}}


                        <div
                            class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-indigo-600 to-slate-800 p-8 text-white">


                            <div
                                class="absolute -right-14 -top-14 h-40 w-40 rounded-full bg-white/10">
                            </div>


                            <div
                                class="absolute bottom-0 right-0 h-24 w-24 rounded-full bg-white/10 blur-xl">
                            </div>






                            <div
                                class="relative flex items-center justify-between">


                                <span
                                    class="rounded-full bg-white/20 px-4 py-1 text-xs font-semibold uppercase tracking-wider backdrop-blur">


                                    Program


                                </span>





                                @if($class->is_active)


                                    <span
                                        class="rounded-full bg-emerald-400 px-4 py-1 text-xs font-bold text-slate-900">


                                        Aktif


                                    </span>


                                @endif



                            </div>







                            <h3
                                class="relative mt-10 text-3xl font-black leading-tight">


                                {{ $class->name }}


                            </h3>








                            <div
                                class="relative mt-8 flex items-end gap-3">


                                <span
                                    class="text-sm text-blue-100">


                                    Biaya Pendaftaran


                                </span>




                                <span
                                    class="text-3xl font-black">


                                    Rp {{ number_format($class->registration_fee,0,',','.') }}


                                </span>


                            </div>


                        </div>









                        {{-- ====================== --}}
                        {{-- Body --}}
                        {{-- ====================== --}}


                        <div
                            class="p-8">


                            <div
                                class="space-y-5">


                                <div
                                    class="flex items-center justify-between rounded-2xl bg-slate-50 p-4">


                                    <div>


                                        <p
                                            class="text-sm text-slate-500">


                                            Durasi


                                        </p>


                                        <h4
                                            class="mt-1 font-bold text-slate-900">


                                            {{ $class->duration ?: '-' }}


                                        </h4>


                                    </div>



                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100">


                                        ⏳


                                    </div>


                                </div>






                                <div
                                    class="flex items-center justify-between rounded-2xl bg-slate-50 p-4">


                                    <div>


                                        <p
                                            class="text-sm text-slate-500">


                                            Jadwal


                                        </p>


                                        <h4
                                            class="mt-1 font-bold text-slate-900">


                                            {{ $class->meeting_schedule ?: '-' }}


                                        </h4>


                                    </div>



                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-100">


                                        📅


                                    </div>


                                </div>


                            </div>
                            





                            @if($class->description)

                                <p
                                    data-aos="fade-up"
                                    data-aos-delay="200"
                                    class="mt-8 leading-8 text-slate-600">

                                    {{ $class->description }}

                                </p>

                            @endif







                            {{-- Features --}}
                            <div
                                data-aos="fade-up"
                                data-aos-delay="300"
                                class="mt-8 space-y-3">


                                <div
                                    class="flex items-center gap-3">


                                    <div
                                        class="flex h-7 w-7 items-center justify-center rounded-full bg-green-100 text-green-600">

                                        ✓

                                    </div>


                                    <span
                                        class="text-slate-700">

                                        Pelatihan Bahasa Jepang

                                    </span>


                                </div>





                                <div
                                    class="flex items-center gap-3">


                                    <div
                                        class="flex h-7 w-7 items-center justify-center rounded-full bg-green-100 text-green-600">

                                        ✓

                                    </div>


                                    <span
                                        class="text-slate-700">

                                        Simulasi Budaya Kerja

                                    </span>


                                </div>





                                <div
                                    class="flex items-center gap-3">


                                    <div
                                        class="flex h-7 w-7 items-center justify-center rounded-full bg-green-100 text-green-600">

                                        ✓

                                    </div>


                                    <span
                                        class="text-slate-700">

                                        Pendampingan Penempatan

                                    </span>


                                </div>


                            </div>







                            <a
                                data-aos="zoom-in"
                                data-aos-delay="400"
                                href="{{ route('registration.create') }}"
                                class="mt-10 inline-flex w-full items-center justify-center rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4 text-center font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-blue-500/30">


                                Daftar Program


                            </a>





                        </div>


                    </div>



                @endforeach



            </div>





        @else







            {{-- Empty State --}}

            <div
                data-aos="zoom-in"
                class="rounded-[34px] border border-slate-200 bg-white px-10 py-20 text-center shadow-sm">


                <div
                    class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-blue-100">


                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-10 w-10 text-blue-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">


                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422A12.083 12.083 0 0112 20.055a12.083 12.083 0 01-6.16-9.477L12 14z"/>


                    </svg>


                </div>





                <h3
                    data-aos="fade-up"
                    data-aos-delay="100"
                    class="mt-8 text-3xl font-black text-slate-900">


                    Program Belum Tersedia


                </h3>





                <p
                    data-aos="fade-up"
                    data-aos-delay="200"
                    class="mx-auto mt-4 max-w-xl text-lg leading-8 text-slate-500">


                    Saat ini belum ada program pelatihan yang tersedia.
                    Silakan kembali beberapa waktu lagi atau hubungi admin
                    untuk memperoleh informasi terbaru.


                </p>





                <a
                    data-aos="zoom-in"
                    data-aos-delay="300"
                    href="#contact"
                    class="mt-10 inline-flex rounded-2xl border border-blue-600 px-8 py-4 font-semibold text-blue-600 transition hover:bg-blue-600 hover:text-white">


                    Hubungi Kami


                </a>



            </div>



        @endif



    </div>


</section>