@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('content')
<h3>Resultados para: <em>{{ $query }}</em></h3>

@if ($results->count())
    <div class="uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
        @foreach ($results as $item)
            <div>
                <div class="uk-card uk-card-default uk-card-hover">
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">{{ $item->name }}</h3>
                        <p><strong>Marca:</strong> {{ $item->brand }}</p>
                        <p><strong>Precio:</strong> €{{ number_format($item->final_price, 2) }}</p>
                        <a href="{{ route('items.show', $item) }}" class="uk-button uk-button-primary">Ver detalle</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="uk-margin-top">
        {{ $results->links() }}
    </div>
@else
    <p>No se encontraron resultados para <strong>"{{ $query }}"</strong>.</p>
@endif
@endsection
