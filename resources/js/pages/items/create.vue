<template>
  <div class="edit-container">
    <h1>Agregar nuevo ítem</h1>

    <div v-if="errorsArray.length" class="uk-alert-danger" uk-alert>
      <a class="uk-alert-close" uk-close></a>
      <h3>Por favor corrige los siguientes errores:</h3>
      <ul>
        <li v-for="(error, index) in errorsArray" :key="index">{{ error }}</li>
      </ul>
    </div>

    <form @submit.prevent="submitForm" class="uk-form-stacked">
      <div class="uk-margin">
        <label for="name" class="uk-form-label">Nombre:</label>
        <div class="uk-form-controls">
          <input type="text" id="name" v-model="form.name" class="uk-input" required />
        </div>
      </div>

      <div class="uk-margin">
        <label for="brand" class="uk-form-label">Marca:</label>
        <div class="uk-form-controls">
          <input type="text" id="brand" v-model="form.brand" class="uk-input" required />
        </div>
      </div>

      <div class="uk-margin">
        <label for="type" class="uk-form-label">Tipo:</label>
        <div class="uk-form-controls">
          <input type="text" id="type" v-model="form.type" class="uk-input" required />
        </div>
      </div>

      <div class="uk-margin">
        <label for="stock" class="uk-form-label">Stock:</label>
        <div class="uk-form-controls">
          <input type="number" id="stock" v-model="form.stock" class="uk-input" min="0" required />
        </div>
      </div>

      <div class="uk-margin">
        <label for="price" class="uk-form-label">Precio:</label>
        <div class="uk-form-controls">
          <input type="number" step="0.01" id="price" v-model="form.price" class="uk-input" min="0" required />
        </div>
      </div>

      <div class="uk-margin">
        <label for="discount" class="uk-form-label">Descuento (%):</label>
        <div class="uk-form-controls">
          <input type="number" step="0.01" id="discount" v-model="form.discount" class="uk-input" min="0" max="100" required />
        </div>
      </div>

      <div class="uk-margin">
        <label for="category_id" class="uk-form-label">Categoría:</label>
        <div class="uk-form-controls">
          <select id="category_id" v-model="form.category_id" class="uk-select" required>
            <option value="">-- Seleccione una categoría --</option>
            <option v-for="cat in categories" :key="cat.id" :value="cat.id">
              {{ cat.categoria }}
            </option>
          </select>
        </div>
      </div>

      <div class="uk-margin uk-flex uk-flex-between uk-flex-middle">
        <button type="submit" class="uk-button uk-button-primary">Guardar ítem</button>
        <Link :href="categoryId ? `/categorias/${categoryId}` : '/'" class="uk-button uk-button-default">← Volver</Link>
      </div>
    </form>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/vue3';

export default {
  props: {
    categories: Array,
    categoryId: [Number, String],
    errors: Object
  },
  components: {
    Link
  },
  data() {
    return {
      form: {
        name: '',
        brand: '',
        type: '',
        stock: 0,
        price: 0,
        discount: 0,
        category_id: this.categoryId || ''
      }
    };
  },
  computed: {
    errorsArray() {
      return this.errors ? Object.values(this.errors).flat() : [];
    }
  },
  methods: {
    submitForm() {
      Inertia.post('/items', this.form, {
        onSuccess: () => {
          alert('¡Ítem creado correctamente!');
        },
        onError: () => {
          alert('Error al crear el ítem.');
        }
      });
    }
  }
};
</script>

<style scoped>
.edit-container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.uk-margin {
  margin-bottom: 1rem;
}

.uk-button:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}
</style>
