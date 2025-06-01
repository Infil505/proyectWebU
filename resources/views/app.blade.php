<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title inertia>{{ config('app.name', 'Tienda de Bicicletas') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/css/uikit.min.css" />

    @vite('resources/js/app.js')

<style>
    body {
        font-family: 'Inter', sans-serif;
        color: #1e293b;
    }

    nav {
        background: linear-gradient(to right, rgb(254, 254, 254), rgb(181, 181, 182));
        padding: 15px 30px;
        display: flex;
        justify-content: center; /* 🟢 centrado horizontalmente */
        align-items: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    nav .uk-navbar-nav > li > a {
        color: black !important;
        text-transform: uppercase;
        font-weight: 500;
        opacity: 5 !important;
    }

    nav .uk-navbar-nav > li > a:hover,
    nav .uk-navbar-nav > li > a:focus,
    nav .uk-navbar-nav > li > a:visited {
        color: black !important;
        opacity: 0.90 !important;
    }

    .container {
        max-width: 1100px;
        margin: 40px auto;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 768px) {
        nav {
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .container {
            margin: 20px;
            padding: 20px;
        }
    }
</style>


    @inertiaHead
</head>

<body>

    <nav>
        <div class="uk-navbar-container" uk-navbar>
            <div class="uk-container">
                <div class="uk-navbar-left">
                    <ul class="uk-navbar-nav">
                        @foreach ($menuCategorias as $catId => $nombreCategoria)
                            <li>
                                <a href="#">{{ strtoupper($nombreCategoria) }}</a>

                                @if ($menuTipos->has($catId))
                                    <div class="uk-navbar-dropdown uk-width-large"
                                        uk-dropdown="animation: uk-animation-slide-top-small; duration: 200;">
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
        </div>
    </nav>

    <div class="container">
        @inertia
    </div>

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.19.2/dist/js/uikit-icons.min.js"></script>
</body>

</html>
