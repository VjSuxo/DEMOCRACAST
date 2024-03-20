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
<<<<<<< HEAD
                'resources/css/style_estado.css',
=======
                'resources/css/style_votos.css',
>>>>>>> cbe101c1f075b4b4946f12351b30496d271107d1
                'resources/js/Boostrap/bootstrap.bundle.min.js',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
