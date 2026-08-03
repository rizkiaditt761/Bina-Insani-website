<footer
    class="relative overflow-hidden bg-slate-950 text-slate-300">

    {{-- Background --}}
    <div
        class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950">
    </div>

    <div
        class="absolute -left-44 top-0 h-[450px] w-[450px] rounded-full bg-blue-600/10 blur-3xl">
    </div>

    <div
        class="absolute -right-40 bottom-0 h-[450px] w-[450px] rounded-full bg-cyan-400/10 blur-3xl">
    </div>





    <div
        class="section-container relative py-24">

        <div
            class="grid gap-14 lg:grid-cols-4 md:grid-cols-2">

            {{-- ===================================== --}}
            {{-- Brand --}}
            {{-- ===================================== --}}

            <div
                data-aos="fade-up">

                <div
                    class="flex items-center gap-4">

                    @if(!empty($setting?->logo))

                        <img
                            src="{{ asset('storage/'.$setting->logo) }}"
                            alt="Logo"
                            class="h-16 w-16 rounded-2xl bg-white object-cover p-2 shadow-lg">

                    @else

                        <div
                            class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 text-2xl font-black text-white">

                            BI

                        </div>

                    @endif

                    <div>

                        <h2
                            class="text-2xl font-black text-white">

                            {{ $setting->site_name ?? 'LPK Bina Insani' }}

                        </h2>

                        <p
                            class="text-blue-300">

                            Lembaga Pelatihan Kerja

                        </p>

                    </div>

                </div>





                <p
                    class="mt-8 leading-8 text-slate-400">

                    {{ $setting->site_description
                        ?? 'LPK Bina Insani berkomitmen mencetak tenaga kerja profesional melalui pelatihan bahasa Jepang, budaya kerja, serta pembinaan keterampilan yang siap bersaing di dunia industri.' }}

                </p>

            </div>









            {{-- ===================================== --}}
            {{-- Menu --}}
            {{-- ===================================== --}}

            <div
                data-aos="fade-up"
                data-aos-delay="100">

                <h3
                    class="mb-8 text-xl font-bold text-white">

                    Menu

                </h3>

                <ul
                    class="space-y-5">

                    @foreach([
                        'hero'=>'Beranda',
                        'about'=>'Tentang',
                        'classes'=>'Program',
                        'gallery'=>'Galeri',
                        'faq'=>'FAQ',
                        'contact'=>'Kontak'
                    ] as $id => $title)

                        <li>

                            <a
                                href="#{{ $id }}"
                                class="transition hover:pl-2 hover:text-blue-400">

                                {{ $title }}

                            </a>

                        </li>

                    @endforeach

                </ul>

            </div>









            {{-- ===================================== --}}
            {{-- Contact --}}
            {{-- ===================================== --}}

            <div
                data-aos="fade-up"
                data-aos-delay="200">

                <h3
                    class="mb-8 text-xl font-bold text-white">

                    Kontak

                </h3>

                <div
                    class="space-y-6">

                    <div>

                        <h4
                            class="font-semibold text-white">

                            📍 Alamat

                        </h4>

                        <p
                            class="mt-2 leading-7 text-slate-400">

                            {{ $setting->address ?? '-' }}

                        </p>

                    </div>





                    <div>

                        <h4
                            class="font-semibold text-white">

                            📞 Telepon

                        </h4>

                        <p
                            class="mt-2 text-slate-400">

                            {{ $setting->phone ?? '-' }}

                        </p>

                    </div>





                    <div>

                        <h4
                            class="font-semibold text-white">

                            ✉️ Email

                        </h4>

                        <p
                            class="mt-2 break-all text-slate-400">

                            {{ $setting->email ?? '-' }}

                        </p>

                    </div>

                </div>

            </div>










            {{-- ===================================== --}}
            {{-- Social --}}
            {{-- ===================================== --}}

            <div
                data-aos="fade-up"
                data-aos-delay="300">

                <h3
                    class="mb-8 text-xl font-bold text-white">

                    Ikuti Kami

                </h3>





                <div
                    class="flex gap-4">

                    <a
                        href="{{ $setting->facebook ?? '#' }}"
                        target="_blank"
                        class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 text-xl transition hover:-translate-y-1 hover:bg-blue-600">

                        📘

                    </a>

                    <a
                        href="{{ $setting->instagram ?? '#' }}"
                        target="_blank"
                        class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 text-xl transition hover:-translate-y-1 hover:bg-pink-600">

                        📷

                    </a>

                    <a
                        href="{{ $setting->youtube ?? '#' }}"
                        target="_blank"
                        class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 text-xl transition hover:-translate-y-1 hover:bg-red-600">

                        ▶️

                    </a>

                </div>





                <div
                    class="mt-10 rounded-[28px] border border-white/10 bg-white/5 p-7 backdrop-blur">

                    <h4
                        class="text-xl font-bold text-white">

                        Mulai Perjalananmu

                    </h4>

                    <p
                        class="mt-4 leading-7 text-slate-400">

                        Daftar sekarang dan wujudkan impian berkarier di Jepang bersama LPK Bina Insani.

                    </p>

                    <a
                        href="{{ route('registration.create') }}"
                        class="mt-7 inline-flex items-center rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-7 py-4 font-semibold text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-blue-500/30">

                        Daftar Sekarang

                    </a>

                </div>

            </div>

        </div>









        {{-- Bottom --}}
        <div
            class="mt-20 flex flex-col items-center justify-between gap-6 border-t border-white/10 pt-8 md:flex-row">

            <p
                class="text-center text-slate-500 md:text-left">

                © {{ date('Y') }}
                {{ $setting->site_name ?? 'LPK Bina Insani' }}.
                All Rights Reserved.

            </p>





            <a
                href="#hero"
                class="rounded-2xl border border-blue-500/30 bg-blue-600 px-6 py-3 font-semibold text-white transition duration-300 hover:-translate-y-1 hover:bg-blue-700">

                ↑ Kembali ke Atas

            </a>

        </div>

    </div>

</footer>