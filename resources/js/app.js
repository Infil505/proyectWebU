import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

// Configuración básica de la app
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  
  // Esta parte busca los componentes Vue en /pages/ según la estructura del nombre
  resolve: (name) => {
    // Opcional: log para ver qué nombre está intentando resolver
    console.log(`Resolviendo componente: ${name}`);

    return resolvePageComponent(
      `./pages/${name}.vue`,
      import.meta.glob('./pages/**/*.vue')
    );
  },
  
  setup({ el, App, props, plugin }) {
    // Crea la app de Vue y la monta
    const vueApp = createApp({ render: () => h(App, props) });
    vueApp.use(plugin);
    vueApp.use(ZiggyVue);

    vueApp.mount(el);

    // Opcional: log para confirmar que la app fue montada correctamente
    console.log('Inertia app montada con éxito.');
    return vueApp;
  },

  // Personaliza el indicador de progreso
  progress: { color: '#4B5563' },
});
