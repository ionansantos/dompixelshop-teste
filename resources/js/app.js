import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import Toaster from "@meforma/vue-toaster";
import './bootstrap';

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.use(plugin);
        app.use(Toaster);
        app.mount(el);
    },
});
