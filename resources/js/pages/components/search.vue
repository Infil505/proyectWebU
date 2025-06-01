<template>
  <form
    action="/items/search"
    method="GET"
    class="uk-margin"
  >
    <div class="uk-inline">
      <a
        class="uk-form-icon uk-form-icon-flip"
        uk-icon="icon: search"
      ></a>
      <input
        class="uk-input"
        type="text"
        name="q"
        :value="currentQuery"
        placeholder="Buscar producto..."
      />
    </div>
  </form>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';

// Obtenemos el valor actual de la query para mantenerlo en el input
const currentQuery = new URLSearchParams(window.location.search).get('q') || '';
</script>
