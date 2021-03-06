@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">{{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></li>
            @else
                <li class="arrow"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="paginator"><i class="fa fa-chevron-left"></i></a></li>
            @endif{{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif{{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class="page"><a href="{{ $url }}"
                                    class="paginator">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}} @if ($paginator->hasMorePages())
                <li class="arrow"><a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')" class="paginator"><i
                            class="fa fa-chevron-right"></i></a></li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')"><i
                        class="fa fa-chevron-right" aria-hidden="true"></i></li>
            @endif
        </ul>
    </nav>
@endif
