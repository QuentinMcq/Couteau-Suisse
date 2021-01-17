@if ($paginator->hasPages())
    <ul class="flex justify-between">

        <!-- Page précédente -->
        @if ($paginator->onFirstPage())
            <li class="w-12 px-2 py-1 text-center rounded border bg-gray-200 font-bold" style="color: #3490dc;">
                &lt;
            </li>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="w-12 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer font-bold"
               style="color: #3490dc;">&lt;
            </a>
        @endif


    <!-- Numéro des pages -->
        @foreach ($elements as $element)

        <!-- Séparateur (...) -->
            <div class="flex">
                @if (is_string($element))
                    <li class="mx-2 w-10 px-2 py-1 text-center rounded border bg-gray-200 font-bold "
                        aria-disabled="true">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="{{$paginator->url($page) }}"
                               class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-blue-500 text-white cursor-pointer">{{$page}}</a>
                        @else
                            <a href="{{$paginator->url($page) }}"
                               class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer">{{$page}}</a>
                        @endif
                    @endforeach
                @endif
            </div>
        @endforeach


    <!-- Page suivante -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="w-12 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer font-bold"
               style="color: #3490dc;">&gt;</a>
        @else
            <li class="w-12 px-2 py-1 text-center rounded border bg-gray-200 font-bold" style="color: #3490dc;">
                &gt;
            </li>
        @endif
    </ul>
@endif
