@extends('layouts.app')

@section('title', $item->name)

@section('content')
<article class="uk-article">

    <h2 class="uk-article-title">{{ $item->name }}</h2>

    <div class="uk-grid-small uk-child-width-1-2@s" uk-grid>
        <div>
            <ul class="uk-list uk-list-divider">
                <li><strong>Categoría:</strong> {{ $item->category->categoria ?? "" }}</li>
                <li><strong>Tipo:</strong> {{ $item->type }}</li>
                <li><strong>Marca:</strong> {{ $item->brand }}</li>
                <li><strong>Stock disponible:</strong> {{ $item->stock }}</li>
            </ul>
        </div>
        <div>
            <ul class="uk-list uk-list-divider">
                <li><strong>Precio original:</strong> €{{ number_format($item->price, 2) }}</li>
                <li><strong>Descuento:</strong> {{ $item->discount }}%</li>
                <li><strong>Precio final:</strong> €{{ number_format($item->final_price, 2) }}</li>
            </ul>
        </div>
    </div>

    <div class="uk-margin-top">
        <h4>Descripción</h4>
        <p>{{ $item->short_description }}</p>
    </div>

    <div class="uk-margin-top">
        <a href="{{ route('items.edit', $item) }}" class="uk-button uk-button-default">Editar</a>

        <form action="{{ route('items.destroy', $item) }}" method="POST" class="uk-display-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="uk-button uk-button-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este ítem?')">Eliminar</button>
        </form>
    </div>

</article>
@endsection
