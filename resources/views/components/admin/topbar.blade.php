<header
    class="sticky top-0 z-30 flex h-16 items-center justify-end border-b border-slate-200 bg-white/80 px-6 backdrop-blur-xl lg:px-8">

    <div
        class="flex items-center gap-3">

        {{-- Notification --}}
        <button
            type="button"
            class="group relative flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-500 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600 hover:shadow-md">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 transition-transform duration-200 group-hover:scale-110"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1" />

            </svg>

            <span
                class="absolute right-3 top-3 h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white">
            </span>

        </button>





        {{-- Divider --}}
        <div
            class="mx-2 h-6 w-px bg-slate-200">
        </div>





        {{-- Profile Dropdown --}}
        <div
            x-data="{ open: false }"
            class="relative">

            <button
                @click="open = !open"
                class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-3 py-1.5 shadow-sm transition hover:border-blue-200 hover:bg-slate-50">

                {{-- Avatar --}}
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-sm font-bold text-white shadow">

                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                </div>

                {{-- User --}}
                <div
                    class="hidden text-left lg:block">

                    <p
                        class="text-sm font-semibold text-slate-800">

                        {{ auth()->user()->name }}

                    </p>

                    <p
                        class="text-xs text-slate-500">

                        Administrator

                    </p>

                </div>

                {{-- Arrow --}}
                <svg
                    class="hidden h-4 w-4 text-slate-400 transition duration-200 lg:block"
                    :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19 9l-7 7-7-7" />

                </svg>

            </button>





            {{-- Dropdown --}}
            <div
                x-show="open"
                @click.away="open = false"
                x-transition
                class="absolute right-0 mt-3 w-56 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">

                <div
                    class="border-b border-slate-100 px-5 py-4">

                    <p
                        class="font-semibold text-slate-800">

                        {{ auth()->user()->name }}

                    </p>

                    <p
                        class="mt-1 text-sm text-slate-500">

                        {{ auth()->user()->email }}

                    </p>

                </div>

                {{-- Profile (Coming Soon) --}}
                <button
                    type="button"
                    disabled
                    class="flex w-full cursor-not-allowed items-center gap-3 px-5 py-3 text-left text-sm text-slate-400">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5.121 17.804A9 9 0 1118.88 17.8M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

                    </svg>

                    Profile
                    <span class="ml-auto text-xs">
                        Soon
                    </span>

                </button>

                {{-- Logout --}}
                <form
                    method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="flex w-full items-center gap-3 px-5 py-3 text-left text-sm font-medium text-red-600 transition hover:bg-red-50">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>

                        </svg>

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</header>