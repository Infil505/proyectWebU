@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('content')
<h3>Resultados para: <em>{{ $query }}</em></h3>

@if ($results->count())
    <ul class="uk-list uk-list-striped">
        @foreach ($results as $item)
            <li>
                <a href="{{ route('items.show', $item) }}">
                    <strong>{{ $item->name }}</strong> - {{ $item->brand }} (€{{ number_format($item->final_price, 2) }})
                </a>
            </li>
        @endforeach
    </ul>

    {{ $results->links() }}
@else
    <p>No se encontraron resultados para <strong>"{{ $query }}"</strong>.</p>
@endif
@endsection
