<template>
  <article class="uk-article">
    <h2 class="uk-article-title">{{ item.name }}</h2>

    <div
      class="uk-grid-small uk-child-width-1-2@s"
      uk-grid
    >
      <div>
        <ul class="uk-list uk-list-divider">
          <li><strong>Categoría:</strong> {{ item.category?.name || '' }}</li>
          <li><strong>Tipo:</strong> {{ item.type }}</li>
          <li><strong>Marca:</strong> {{ item.brand }}</li>
          <li><strong>Stock disponible:</strong> {{ item.stock }}</li>
        </ul>
      </div>
      <div>
        <ul class="uk-list uk-list-divider">
          <li><strong>Precio original:</strong> €{{ parseFloat(item.price).toFixed(2) }}</li>
          <li><strong>Descuento:</strong> {{ item.discount }}%</li>
          <li><strong>Precio final:</strong> €{{ parseFloat(item.final_price).toFixed(2) }}</li>
        </ul>
      </div>
    </div>

    <div class="uk-margin-top">
      <h4>Descripción</h4>
      <p>{{ item.short_description }}</p>
    </div>

    <div class="uk-margin-top">
      <Link
        :href="`/items/${item.id}/edit`"
        class="uk-button uk-button-default"
      >
        Editar
      </Link>

      <button
        class="uk-button uk-button-danger"
        @click="deleteItem"
      >
        Eliminar
      </button>
    </div>
  </article>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Link, usePage } from '@inertiajs/vue3';

// Obtenemos el item desde los props que envía Inertia
const { item } = usePage().props.value;

// Función para eliminar el ítem
const deleteItem = () => {
  if (confirm('¿Estás seguro de que deseas eliminar este ítem?')) {
    Inertia.delete(`/items/${item.id}`);
  }
};
</script>
