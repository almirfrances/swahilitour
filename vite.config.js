import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    assetsInclude: ['**/*.eot', '**/*.ttf', '**/*.woff', '**/*.svg', '**/*.jpg', '**/*.png'],
});
