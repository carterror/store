@if ($paginator->hasPages())
        <ul class="pagination blue-grey-text text-lighten-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"><i class="mdi-navigation-chevron-left"></i></a></span>
                </li>
            @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <li class="waves-effect blue-grey-text text-darken-4">
                    <i class="mdi-navigation-chevron-left"></i>
                </li>
            </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="blue-grey darken-4 grey-text text-lighten-5" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <a href="{{ $url }}"><li class="waves-effect blue-grey-text text-darken-4">{{ $page }}</li></a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <li class="waves-effect blue-grey-text text-darken-4">
                    <i class="mdi-navigation-chevron-right"></i>
                </li>
            </a>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><i class="mdi-navigation-chevron-right"></i></span>
                </li>
            @endif
        </ul>
@endif
