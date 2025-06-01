<template>
    <div>
        <!-- Selección de categoría -->
        <div class="uk-margin">
            <label class="uk-form-label" for="category_id">Categoría</label>
            <div class="uk-form-controls uk-flex uk-flex-middle uk-flex-between">
                <div class="uk-width-expand">
                    <select id="category_id" v-model="form.category_id" class="uk-select" required>
                        <option value="">Seleccione una categoría</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.categoria }}
                        </option>
                    </select>
                </div>
                <div class="uk-margin-left">
                    <Link href="/categories/create" class="uk-button uk-button-secondary uk-button-small">
                    + Crear categoría
                    </Link>
                </div>
            </div>
        </div>

        <!-- Nombre -->
        <div class="uk-margin">
            <label class="uk-form-label" for="name">Nombre</label>
            <input id="name" v-model="form.name" type="text" class="uk-input" required />
        </div>

        <!-- Tipo -->
        <div class="uk-margin">
            <label class="uk-form-label" for="type">Tipo</label>
            <input id="type" v-model="form.type" type="text" class="uk-input" required />
        </div>

        <!-- Marca -->
        <div class="uk-margin">
            <label class="uk-form-label" for="brand">Marca</label>
            <input id="brand" v-model="form.brand" type="text" class="uk-input" required />
        </div>

        <!-- Precio -->
        <div class="uk-margin">
            <label class="uk-form-label" for="price">Precio</label>
            <input id="price" v-model="form.price" type="number" step="0.01" class="uk-input" required />
        </div>

        <!-- Descuento -->
        <div class="uk-margin">
            <label class="uk-form-label" for="discount">Descuento</label>
            <input id="discount" v-model="form.discount" type="number" step="0.01" class="uk-input" required />
        </div>

        <!-- Precio Final -->
        <div class="uk-margin">
            <label class="uk-form-label" for="final_price">Precio Final</label>
            <input id="final_price" v-model="form.final_price" type="number" step="0.01" class="uk-input" required />
        </div>

        <!-- Stock -->
        <div class="uk-margin">
            <label class="uk-form-label" for="stock">Stock</label>
            <input id="stock" v-model="form.stock" type="number" class="uk-input" required />
        </div>

        <!-- Descripción corta -->
        <div class="uk-margin">
            <label class="uk-form-label" for="short_description">Descripción corta</label>
            <textarea id="short_description" v-model="form.short_description" class="uk-textarea" required></textarea>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

// Obtenemos las categorías desde Inertia
const { categories, item } = usePage().props.value;

// Inicializamos el formulario (usando los datos existentes del ítem si está editando)
const form = reactive({
    category_id: item?.category_id || '',
    name: item?.name || '',
    type: item?.type || '',
    brand: item?.brand || '',
    price: item?.price || '',
    discount: item?.discount || '',
    final_price: item?.final_price || '',
    stock: item?.stock || '',
    short_description: item?.short_description || ''
});
</script>
