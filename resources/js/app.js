import 'bootstrap';
import 'toastr';

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';


createInertiaApp({
    resolve: (name) => {
        const modules = name.split("::");
        if (modules.length > 1) {
            return resolvePageComponent(
                `../../Modules/${modules[0]}/resources/assets/js/Pages/${modules[1]}.vue`,
                import.meta.glob('../../Modules/**/resources/assets/js/Pages/**/*.vue')
            );
        } else {
            return resolvePageComponent(
                `./Pages/${name}.vue`,
                import.meta.glob('./Pages/**/*.vue')
            );
        }
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin).mixin({methods: {route}})
            .mount(el);
    },
});
