<template>
    <div class="uk-container uk-margin-large-top">
        <div v-if="errorsArray.length" class="uk-alert-danger" uk-alert>
            <ul>
                <li v-for="(error, index) in errorsArray" :key="index">{{ error }}</li>
            </ul>
        </div>

        <form @submit.prevent="submitForm" class="uk-form-stacked">
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
                <button type="submit" class="uk-button uk-button-primary">Actualizar</button>
                <Link :href="`/items/${item.id}`" class="uk-button uk-button-default">Cancelar</Link>
            </div>
        </form>
    </div>
</template>

<script setup>
import { reactive, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/vue3';

// Usamos defineProps con valores por defecto para evitar errores
const props = defineProps({
    item: {
        type: Object,
        default: () => ({
            name: '',
            brand: '',
            final_price: '',
            category_id: ''
        }),
    },
    categories: {
        type: Array,
        default: () => [],
    },
    errors: {
        type: Object,
        default: () => ({}),
    },
});

const { item, categories, errors } = props;

// Datos del formulario
const form = reactive({
    name: item.name,
    brand: item.brand,
    final_price: item.final_price,
    category_id: item.category_id,
});

// Arreglo de errores (si existen)
const errorsArray = computed(() => {
    return errors ? Object.values(errors).flat() : [];
});

// Función para enviar el formulario
const submitForm = () => {
    Inertia.put(`/items/${item.id}`, form, {
        onSuccess: () => {
            alert('¡Ítem actualizado correctamente!');
        },
        onError: () => {
            alert('Hubo un error al actualizar el ítem.');
        },
    });
};
</script>
