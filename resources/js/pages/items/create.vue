<template>
    <div class="uk-container uk-margin-large-top">
        <h2 class="uk-heading-line"><span>Nuevo artículo</span></h2>

        <!-- Errores del formulario -->
        <div v-if="errors && Object.keys(errors).length" class="uk-alert-danger" uk-alert>
            <p><strong>¡Ups! Algo salió mal:</strong></p>
            <ul>
                <li v-for="(message, field) in errors" :key="field">{{ message }}</li>
            </ul>
        </div>

        <form @submit.prevent="handleSubmit" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="name">Nombre</label>
                <input id="name" v-model="form.name" type="text" class="uk-input" required />
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="brand">Marca</label>
                <input id="brand" v-model="form.brand" type="text" class="uk-input" required />
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="final_price">Precio</label>
                <input id="final_price" v-model="form.final_price" type="number" step="0.01" class="uk-input"
                    required />
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="category_id">Categoría</label>
                <select id="category_id" v-model="form.category_id" class="uk-select" required>
                    <option value="">Seleccione una categoría</option>
                    <option v-for="category in categories" :key="category.id" :value="category.id">
                        {{ category.categoria }}
                    </option>
                </select>
            </div>

            <div class="uk-margin-top">
                <button type="submit" class="uk-button uk-button-primary">Guardar</button>
                <Link href="/categories" class="uk-button uk-button-default">Cancelar</Link>
            </div>
        </form>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import { Link } from '@inertiajs/vue3';
import axios from 'axios';

// Props que espera InertiaJS (enviados desde el backend)
const props = defineProps({
    categories: {
        type: Array,
        default: () => [],
    },
    errors: {
        type: Object,
        default: () => ({}),
    },
});

// Datos del formulario
const form = reactive({
    name: '',
    brand: '',
    final_price: '',
    category_id: '',
});

// Función para manejar el submit
const handleSubmit = async () => {
    const selectedCategory = props.categories.find(
        (cat) => cat.id === form.category_id
    );

    console.log('🟢 Categoría seleccionada:');
    console.log(' - ID:', form.category_id);
    console.log(' - Nombre:', selectedCategory ? selectedCategory.categoria : 'No seleccionada');
    console.log('📤 Datos del formulario:', { ...form });

    alert(`Datos listos para enviar:\nCategoría: ${selectedCategory ? selectedCategory.categoria : 'No seleccionada'} (ID: ${form.category_id})`);

    // Enviar el formulario al backend
    try {
        await axios.post('/items', form);
        alert('¡Artículo creado correctamente!');
        // Aquí podrías redirigir o limpiar el formulario
    } catch (error) {
        console.error(error);
        alert('Hubo un error al enviar el formulario.');
    }
};
</script>
