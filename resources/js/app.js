import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import Toaster from "@meforma/vue-toaster";
import store from './store/product'; // Importe a store do arquivo store.js
import './bootstrap';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    return pages[`./Pages/${name}.vue`];
  },
  setup({ el, App, props, plugin }) {
    // Crie a instância do aplicativo Vue e registre a store
    const app = createApp({ render: () => h(App, props) });
    app.use(plugin);
    app.use(Toaster);
    app.use(store); // Use a store única importada aqui
    app.mount(el);
  },
});
