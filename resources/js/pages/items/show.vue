<template>
  <article class="uk-article">
    <h2 class="uk-article-title">{{ item.name }}</h2>

    <div class="uk-grid-small uk-child-width-1-2@s" uk-grid>
      <div>
        <ul class="uk-list uk-list-divider">
          <li><strong>Categoría:</strong> {{ item.category?.name || 'Sin categoría' }}</li>
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
        class="uk-button uk-button-primary"
      >
        Editar
      </Link>
    </div>
  </article>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  item: {
    type: Object,
    required: true
  }
});

const { item } = props;
</script>

<style scoped>
.uk-margin-top {
  margin-top: 1.5rem;
}
</style>