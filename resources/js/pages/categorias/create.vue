<template>
    <div class="uk-container uk-margin-large-top">
        <h2 class="uk-heading-line"><span>Nueva Categoría</span></h2>

        <!-- Errores del servidor -->
        <div v-if="errorsArray.length" class="uk-alert-danger" uk-alert>
            <ul>
                <li v-for="(error, index) in errorsArray" :key="index">{{ error }}</li>
            </ul>
        </div>

        <form @submit.prevent="submitForm" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="categoria">Nombre de la categoría</label>
                <input class="uk-input" type="text" id="categoria" v-model="form.categoria" required />
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="codigo">Código</label>
                <input class="uk-input" type="text" id="codigo" v-model="form.codigo" required />
            </div>

            <div class="uk-margin-top">
                <button class="uk-button uk-button-primary" type="submit">
                    Guardar
                </button>
                <Link :href="previousUrl" class="uk-button uk-button-default">
                ← Volver
                </Link>
            </div>
        </form>
    </div>
</template>

<script setup>
import { reactive, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Link, usePage } from '@inertiajs/vue3';

// Datos del formulario
const form = reactive({
    categoria: '',
    codigo: ''
});

// Errores del servidor
const { errors } = usePage().props.value;
const errorsArray = computed(() => {
    return errors ? Object.values(errors).flat() : [];
});

// Obtenemos la URL anterior para el botón “Volver”
const { url } = usePage().props.value;
const previousUrl = document.referrer || '/'; 


const submitForm = () => {
    Inertia.post('/categorias', form);
};
</script>
