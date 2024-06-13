import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',


                'resources/admin/css/font-awesome.min.css',
                'resources/admin/css/simple-line-icons.css',
                'resources/admin/dest/style.css',
                'resources/Front/css/bootstrap.rtl.min.css',
                'resources/Front/css/default.css',




                'resources/admin/js/libs/Chart.min.js',
                'resources/admin/js/libs/jquery.min.js',
                'resources/admin/js/libs/tether.min.js',
                'resources/admin/js/libs/bootstrap.min.js',
                'resources/admin/js/libs/pace.min.js',
                'resources/admin/js/app.js',
                'resources/admin/js/views/main.js'
            ],
            refresh: true,
        }),
    ],
});
