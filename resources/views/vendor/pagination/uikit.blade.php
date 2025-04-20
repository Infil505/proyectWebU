@if ($paginator->hasPages())
    <ul class="uk-pagination uk-flex-center uk-margin-medium-top uk-margin-medium-bottom">

        {{-- Página anterior --}}
        @if ($paginator->onFirstPage())
            <li class="uk-disabled">
                <span class="uk-button uk-button-small uk-border-pill uk-margin-small-right">Anterior</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="uk-button uk-button-default uk-button-small uk-border-pill uk-margin-small-right hover-effect">Anterior</a>
            </li>
        @endif

        {{-- Números de páginas --}}
        @foreach ($elements as $element)
            {{-- Separador de páginas --}}
            @if (is_string($element))
                <li class="uk-disabled">
                    <span class="uk-text-muted uk-padding-small">{{ $element }}</span>
                </li>
            @endif

            {{-- Enlaces de páginas --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <span class="uk-button uk-button-primary uk-button-small uk-border-pill uk-box-shadow-small uk-margin-small-right">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="uk-button uk-button-default uk-button-small uk-border-pill uk-margin-small-right hover-effect">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Página siguiente --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="uk-button uk-button-default uk-button-small uk-border-pill hover-effect">Siguiente</a>
            </li>
        @else
            <li class="uk-disabled">
                <span class="uk-button uk-button-small uk-border-pill">Siguiente</span>
            </li>
        @endif

    </ul>

    {{-- Estilos adicionales --}}
    <style>
        .uk-pagination .hover-effect {
            transition: all 0.2s ease;
        }
        .uk-pagination .hover-effect:hover {
            background-color: #f8f8f8;
            transform: translateY(-2px);
        }
        .uk-pagination .uk-button-primary {
            color: white;
        }
        .uk-pagination .uk-disabled {
            opacity: 0.5;
        }
        /* Ocultar cualquier icono que pueda ser agregado automáticamente */
        .uk-pagination a[rel="prev"]::before, 
        .uk-pagination a[rel="next"]::after,
        .uk-pagination span[uk-pagination-previous],
        .uk-pagination span[uk-pagination-next],
        .uk-pagination [uk-pagination-previous],
        .uk-pagination [uk-pagination-next] {
            display: none !important;
            content: none !important;
        }
    </style>
@endif