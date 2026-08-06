<nav
    x-data="{ open: false }"
    class="border-b border-gray-200 bg-white">

    <div class="mx-auto max-w-7xl px-6">

        <div class="flex h-16 items-center justify-between">


            {{-- Brand --}}
            <div class="flex items-center gap-8">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-lg font-bold text-white">

                        BI

                    </div>

                    <div>

                        <h1
                            class="font-bold text-gray-900">

                            LPK Bina Insani

                        </h1>

                        <p
                            class="text-xs text-gray-500">

                            Admin Panel

                        </p>

                    </div>

                </a>


                {{-- Desktop Menu --}}
                <div class="hidden items-center gap-2 md:flex">


                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="rounded-xl px-4 py-2 text-sm font-medium transition
                        {{ request()->routeIs('admin.dashboard')
                            ? 'bg-blue-100 text-blue-700'
                            : 'text-gray-600 hover:bg-gray-100' }}">

                        Dashboard

                    </a>


                    <a
                        href="{{ route('registration-payments.index') }}"
                        class="rounded-xl px-4 py-2 text-sm font-medium transition
                        {{ request()->routeIs('registration-payments.*')
                            ? 'bg-blue-100 text-blue-700'
                            : 'text-gray-600 hover:bg-gray-100' }}">

                        Pembayaran

                    </a>


                </div>

            </div>



            {{-- User Desktop --}}
            <div class="hidden items-center gap-4 md:flex">


                <div class="text-right">

                    <p
                        class="text-sm font-semibold text-gray-900">

                        {{ auth()->user()->name }}

                    </p>

                    <p
                        class="text-xs text-gray-500">

                        {{ auth()->user()->email }}

                    </p>

                </div>


                <form
                    method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="rounded-xl bg-red-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-600">

                        Logout

                    </button>

                </form>


            </div>



            {{-- Mobile Button --}}
            <button
                @click="open = !open"
                class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 md:hidden">


                <svg
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>

                </svg>


            </button>


        </div>


    </div>



    {{-- Mobile Menu --}}
    <div
        x-show="open"
        class="border-t border-gray-200 md:hidden">


        <div class="space-y-2 px-6 py-4">


            <a
                href="{{ route('admin.dashboard') }}"
                class="block rounded-xl px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100">

                Dashboard

            </a>


            <a
                href="{{ route('registration-payments.index') }}"
                class="block rounded-xl px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100">

                Pembayaran

            </a>


            <form
                method="POST"
                action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="w-full rounded-xl bg-red-500 px-4 py-3 text-left text-sm font-semibold text-white">

                    Logout

                </button>


            </form>


        </div>


    </div>


</nav>