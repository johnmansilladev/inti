import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
        viteStaticCopy({
            targets: [
              {
                src: 'node_modules/intl-tel-input/build/js/utils.js',
                dest: 'vendor/intl-tel-input/js'
              }
            ]
          })
    ],
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
});
