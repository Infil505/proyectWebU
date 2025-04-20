@extends('layouts.app')

@section('title', 'Categorías disponibles')

@section('content')
<div class="uk-container uk-margin-large-top">

    <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match" uk-grid>
        @forelse ($categories as $category)
            <div>
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <h3 class="uk-card-title">{{ $category->categoria }}</h3>

                    @if ($category->items->count())
                        <ul class="uk-list uk-list-divider">
                            @foreach ($category->items->take(3) as $item)
                                <li>
                                    <a href="{{ route('items.show', $item) }}" class="uk-link-reset">
                                        <strong>{{ $item->name }}</strong><br>
                                        <span class="uk-text-meta">{{ $item->brand }} - €{{ number_format($item->final_price, 2) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="uk-margin-top">
                            <a href="{{ route('items.byCategory', $category->id) }}" class="uk-button uk-button-text">
                                Ver más →
                            </a>
                        </div>
                    @else
                        <p class="uk-text-muted">No hay productos registrados.</p>
                    @endif
                </div>
            </div>
        @empty
            <p class="uk-text-center uk-text-muted uk-width-1-1">No hay categorías disponibles.</p>
        @endforelse
    </div>

</div>
@endsection
