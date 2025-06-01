<template>
  <div class="uk-container uk-margin-large-top">
    <div
      class="uk-grid uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match"
      uk-grid
    >
      <div v-for="category in categorias" :key="category.id">
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
          <h3 class="uk-card-title">{{ category.categoria }}</h3>

          <div v-if="category.items && category.items.length">
            <ul class="uk-list uk-list-divider">
              <li v-for="item in category.items.slice(0, 3)" :key="item.id">
                <Link :href="`/items/${item.id}`" class="uk-link-reset">
                  <strong>{{ item.name }}</strong><br />
                  <span class="uk-text-meta">
                    {{ item.brand }} - €{{ parseFloat(item.final_price).toFixed(2) }}
                  </span>
                </Link>
              </li>
            </ul>

            <div class="uk-margin-top">
              <Link
                :href="`/categorias/${category.id}`"
                class="uk-button uk-button-text"
              >
                Ver más →
              </Link>
            </div>
          </div>

          <div v-else>
            <p class="uk-text-muted">No hay productos registrados.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  categorias: {
    type: Array,
    default: () => [],
  },
});

const { categorias } = props;
</script>

<style scoped>

.uk-card {
  margin-bottom: 20px;
}
</style>
