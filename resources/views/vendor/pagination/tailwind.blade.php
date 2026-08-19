@if ($paginator->hasPages())

    <nav role="navigation" aria-label="Pagination Navigation"
        class="flex items-center gap-2">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())

            <span
                class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-slate-300">
                ‹
            </span>

        @else

            <a
                href="{{ $paginator->previousPageUrl() }}"
                class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:bg-slate-50">
                ‹
            </a>

        @endif


        {{-- Pages --}}
        @php
            $current = $paginator->currentPage();
            $last = $paginator->lastPage();

            $start = max(1, $current - 2);
            $end = min($last, $current + 2);

            if ($current <= 3) {
                $start = 1;
                $end = min(5, $last);
            }

            if ($current >= $last - 2) {
                $start = max(1, $last - 4);
                $end = $last;
            }
        @endphp


        {{-- First page --}}
        @if ($start > 1)

            <a
                href="{{ $paginator->url(1) }}"
                class="inline-flex h-10 min-w-10 items-center justify-center rounded-xl border border-slate-200 bg-white px-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                1
            </a>

            @if ($start > 2)

                <span
                    class="inline-flex h-10 min-w-10 items-center justify-center text-slate-400">
                    …
                </span>

            @endif

        @endif


        {{-- Page numbers --}}
        @for ($page = $start; $page <= $end; $page++)

            @if ($page == $current)

                <span
                    aria-current="page"
                    class="inline-flex h-10 min-w-10 items-center justify-center rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 px-3 text-sm font-bold text-white shadow-sm">
                    {{ $page }}
                </span>

            @else

                <a
                    href="{{ $paginator->url($page) }}"
                    class="inline-flex h-10 min-w-10 items-center justify-center rounded-xl border border-slate-200 bg-white px-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                    {{ $page }}
                </a>

            @endif

        @endfor


        {{-- Last page --}}
        @if ($end < $last)

            @if ($end < $last - 1)

                <span
                    class="inline-flex h-10 min-w-10 items-center justify-center text-slate-400">
                    …
                </span>

            @endif

            <a
                href="{{ $paginator->url($last) }}"
                class="inline-flex h-10 min-w-10 items-center justify-center rounded-xl border border-slate-200 bg-white px-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                {{ $last }}
            </a>

        @endif


        {{-- Next --}}
        @if ($paginator->hasMorePages())

            <a
                href="{{ $paginator->nextPageUrl() }}"
                class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:bg-slate-50">
                ›
            </a>

        @else

            <span
                class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-slate-50 text-slate-300">
                ›
            </span>

        @endif

    </nav>

@endif