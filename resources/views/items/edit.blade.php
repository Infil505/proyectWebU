@extends('layouts.app')

@section('title', 'Editar ítem')

@section('content')
<div class="uk-container uk-margin-large-top">

    @if ($errors->any())
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.update', $item) }}" method="POST" class="uk-form-stacked">
        @csrf
        @method('PUT')

        @include('items.form', ['item' => $item])

        <div class="uk-margin-top">
            <button class="uk-button uk-button-primary">Actualizar</button>
            <a href="{{ route('items.show', $item) }}" class="uk-button uk-button-default">Cancelar</a>
        </div>
    </form>
</div>
@endsection
