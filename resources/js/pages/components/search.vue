<template>
  <form
    @submit.prevent="search"
    class="uk-margin"
  >
    <div class="uk-inline">
      <a class="uk-form-icon uk-form-icon-flip" uk-icon="icon: search"></a>
      <input
        v-model="query"
        class="uk-input"
        type="text"
        name="q"
        placeholder="Buscar producto..."
      />
    </div>
  </form>
</template>

<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const query = ref(new URLSearchParams(window.location.search).get('q') || '');

const search = () => {
  router.get('/items/search', { q: query.value }, { preserveState: true });
};
</script>
