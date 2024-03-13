import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/Boostrap/bootstrap.min.css',
                'resources/css/style.css',
                'resources/css/style_index.css',
                'resources/css/style_indexAdmin.css',
                'resources/css/style_admin.css',
                'resources/css/style_voto.css',
                'resources/css/style_votos.css',
                'resources/js/Boostrap/bootstrap.bundle.min.js',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
