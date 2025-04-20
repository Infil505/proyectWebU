@extends('layouts.app')

@section('title', 'Nuevo ítem')

@section('content')
<div class="uk-container uk-margin-large-top">
    <h2 class="uk-heading-line"><span>Nuevo artículo</span></h2>

    {{-- Mostrar errores de validación --}}
    @include('partials.errors')

    {{-- Formulario de creación --}}
    <form action="{{ route('items.store') }}" method="POST" class="uk-form-stacked" id="item-form">
        @csrf
        @include('items.form', ['item' => null, 'mode' => 'create'])

        <div class="uk-margin-top">
            <button type="submit" class="uk-button uk-button-primary">Guardar</button>
            <a href="{{ route('categories.index') }}" class="uk-button uk-button-default">Cancelar</a>
        </div>
    </form>
</div>

{{-- Script para mostrar info al enviar --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("item-form");
        const categorySelect = document.getElementById("category_id");

        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Previene el envío automático

            const selectedOption = categorySelect.options[categorySelect.selectedIndex];

            console.log("🟢 Categoría seleccionada:");
            console.log(" - ID:", categorySelect.value);
            console.log(" - Nombre:", selectedOption ? selectedOption.text : "No seleccionada");

            console.log("📤 Datos del formulario:");
            const formData = new FormData(form);
            formData.forEach((value, key) => {
                console.log(` - ${key}: ${value}`);
            });

            alert(`Datos listos para enviar:\nCategoría: ${selectedOption.text} (ID: ${categorySelect.value})`);

            // Esperar un segundo antes de enviar
            setTimeout(() => {
                console.log("✅ Enviando formulario...");
                form.submit();
            }, 1000);
        });
    });
</script>
@endsection
