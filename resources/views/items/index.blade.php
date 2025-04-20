@extends('layouts.app')

@section('title', 'Productos en la categoría: ' . $category->categoria)

@section('content')

    <div class="uk-container uk-margin-large-top">

        {{-- Encabezado y botón --}}
        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
            <h2 class="uk-heading-line uk-margin-remove-bottom">
                <span>
                    Productos en: <strong>{{ $category->categoria }}</strong>
                    @if (request('tipo'))
                        - <em>{{ request('tipo') }}</em>
                    @endif
                </span>
            </h2>

            <a href="{{ route('items.create', ['category' => $category->id]) }}" class="uk-button uk-button-primary">
                + Nuevo artículo
            </a>
        </div>

        @if ($items->count())
            <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match" uk-grid>
                @foreach ($items as $item)
                    <div>
                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                            <h3 class="uk-card-title">
                                <a href="{{ route('items.show', $item) }}" class="uk-link-heading">
                                    {{ $item->name }}
                                </a>
                            </h3>
                            <p class="uk-text-muted">
                                Marca: <strong>{{ $item->brand }}</strong><br>
                                Precio: €{{ number_format($item->final_price, 2) }}<br>
                                Tipo: {{ $item->type }}
                            </p>
                            <p style="font-size: 0.9em;">
                                {{ \Illuminate\Support\Str::limit($item->short_description, 100) }}
                            </p>
                            <div class="uk-margin-top">
                                <a href="{{ route('items.show', $item) }}" class="uk-button uk-button-text">
                                    Ver detalle →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Paginación --}}
            <div class="uk-margin-large-top uk-text-center">
                {{ $items->appends(request()->query())->links('vendor.pagination.uikit') }}
            </div>
        @else
            <div class="uk-alert-warning" uk-alert>
                <p>No hay ítems en esta categoría aún.</p>
                <a href="{{ route('items.create', ['category' => $category->id]) }}" class="uk-button uk-button-primary">
                    + Nuevo artículo
                </a>
            </div>
        @endif

    </div>

@endsection