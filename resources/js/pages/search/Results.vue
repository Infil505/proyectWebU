<template>
  <div class="uk-container uk-margin-large-top">
    <h2 class="uk-heading-line uk-margin-bottom">
      <span>Resultados de búsqueda: "{{ query }}"</span>
    </h2>

    <div v-if="results.data.length">
      <div
        class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match"
        uk-grid
      >
        <div v-for="item in results.data" :key="item.id">
          <div class="uk-card uk-card-default uk-card-hover uk-card-body">
            <h3 class="uk-card-title">
              <Link :href="`/items/${item.id}`" class="uk-link-heading">
                {{ item.name }}
              </Link>
            </h3>

            <p class="uk-text-muted">
              Marca: <strong>{{ item.brand }}</strong><br />
              Precio: €{{ parseFloat(item.final_price).toFixed(2) }}<br />
              Tipo: {{ item.type }}
            </p>

            <p style="font-size: 0.9em;">
              {{ item.short_description.length > 100
                ? item.short_description.slice(0, 100) + '...'
                : item.short_description }}
            </p>
          </div>
        </div>
      </div>

      <div class="uk-margin-large-top uk-text-center">
        <ul class="uk-pagination uk-flex-center">
          <li
            v-for="link in results.links"
            :key="link.label"
            :class="{ 'uk-disabled': !link.url, 'uk-active': link.active }"
          >
            <Link
              v-if="link.url"
              :href="link.url"
              class="uk-link-reset"
              v-html="link.label"
            />
            <span v-else v-html="link.label"></span>
          </li>
        </ul>
      </div>
    </div>

    <div v-else class="uk-alert-warning" uk-alert>
      <p>No se encontraron resultados para "{{ query }}".</p>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  results: {
    type: Object,
    default: () => ({ data: [], links: [] }),
  },
  query: {
    type: String,
    default: '',
  },
});
</script>
