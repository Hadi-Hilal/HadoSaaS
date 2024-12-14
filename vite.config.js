import {defineConfig} from 'vite';
import {createHtmlPlugin} from 'vite-plugin-html'
import vueDevTools from 'vite-plugin-vue-devtools'
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
        vueDevTools(),
        createHtmlPlugin({})
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
        },
    },
});
