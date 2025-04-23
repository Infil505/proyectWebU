<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tienda de Bicicletas')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/css/uikit.min.css" />
</head>

<body>

    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-container">
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">

                    @foreach ($menuCategorias as $catId => $nombreCategoria)
                        <li>
                            <a href="#">{{ strtoupper($nombreCategoria) }}</a>

                            @if ($menuTipos->has($catId))
                                <div class="uk-navbar-dropdown uk-width-large" uk-dropdown="animation: uk-animation-slide-top-small; duration: 200;">
                                    <div class="uk-drop-grid uk-child-width-1-2@m" uk-grid>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                @foreach ($menuTipos[$catId]->chunk(ceil($menuTipos[$catId]->count() / 2)) as $chunk)
                                                    @foreach ($chunk as $tipo)
                                                        <li>
                                                            <a href="{{ route('items.byCategory', $catId) }}?tipo={{ urlencode($tipo->type) }}">
                                                                {{ $tipo->type }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </nav>

    <div class="uk-container uk-margin-top">

        @include('components.search')

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/js/uikit-icons.min.js"></script>
</body>

</html>
