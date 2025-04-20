@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
<div class="uk-container uk-margin-large-top">
    <h2 class="uk-heading-line"><span>Nueva Categoría</span></h2>

    <form action="{{ route('categories.store') }}" method="POST" class="uk-form-stacked">
        @csrf

        <div class="uk-margin">
            <label class="uk-form-label" for="categoria">Nombre de la categoría</label>
            <input class="uk-input" type="text" name="categoria" id="categoria" required>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="codigo">Código</label>
            <input class="uk-input" type="text" name="codigo" id="codigo" required>
        </div>

        <div class="uk-margin-top">
            <button class="uk-button uk-button-primary">Guardar</button>
            <a href="{{ url()->previous() }}" class="uk-button uk-button-default">← Volver</a>
        </div>
    </form>
</div>
@endsection
