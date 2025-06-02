<template>
  <div class="uk-container uk-margin-large-top">

    <SearchForm />

    <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
      <h2 class="uk-heading-line uk-margin-remove-bottom">
        <span>
          Productos en: <strong>{{ category.name }}</strong>
          <em v-if="tipo">- {{ tipo }}</em>
        </span>
      </h2>

      <Link :href="`/items/create?category=${category.id}`" class="uk-button uk-button-primary">
        + Nuevo artículo
      </Link>
    </div>

    <div v-if="items.data.length">
      <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match" uk-grid>
        <div v-for="item in items.data" :key="item.id">
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
              {{ item.short_description.length > 100 ? item.short_description.slice(0, 100) + '...' :
                item.short_description }}
            </p>

            <div class="uk-margin-top uk-flex uk-flex-between">
              <Link :href="`/items/${item.id}/edit`" class="uk-button uk-button-default">
                Editar
              </Link>
              <button
                class="uk-button uk-button-danger"
                @click="deleteItem(item.id)"
              >
                Eliminar
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="uk-margin-large-top uk-text-center">
        <ul class="uk-pagination uk-flex-center">
          <li
            v-for="link in items.links"
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
      <p>No hay ítems en esta categoría aún.</p>
      <Link :href="`/items/create?category=${category.id}`" class="uk-button uk-button-primary">
        + Nuevo artículo
      </Link>
    </div>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';
import SearchForm from '@/pages/components/search.vue';

const props = defineProps({
  category: {
    type: Object,
    default: () => ({}),
  },
  items: {
    type: Object,
    default: () => ({ data: [], links: [] }),
  },
  tipo: {
    type: String,
    default: '',
  },
});

// Eliminar ítem - actualizado
const deleteItem = (id) => {
  if (!id) {
    alert('ID del ítem no está definido.');
    return;
  }

  if (confirm('¿Estás seguro de que deseas eliminar este ítem?')) {
    router.post(`/items/${id}`, { _method: 'DELETE' }, {
      onSuccess: () => {
        alert('¡Ítem eliminado correctamente!');
      },
      onError: () => {
        alert('Error al eliminar el ítem.');
      },
    });
  }
};
</script>
