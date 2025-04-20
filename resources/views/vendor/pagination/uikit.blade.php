@if ($paginator->hasPages())
    <ul class="uk-pagination uk-flex-center">

        {{-- Página anterior --}}
        @if ($paginator->onFirstPage())
            <li class="uk-disabled"><span><span uk-pagination-previous></span></span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><span uk-pagination-previous></span></a></li>
        @endif

        {{-- Números de páginas --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="uk-disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="uk-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Página siguiente --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><span uk-pagination-next></span></a></li>
        @else
            <li class="uk-disabled"><span><span uk-pagination-next></span></span></li>
        @endif

    </ul>
@endif
