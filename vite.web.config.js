import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import tailwindcss from 'tailwindcss';
import tailwindConfig from './tailwind.web.config.cjs';

export default defineConfig({
    plugins: [
        laravel({
            hotFile: 'public/web.hot',
            buildDirectory: 'web',
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    css: {
        postcss: {
            plugins: [
                tailwindcss(tailwindConfig),
            ],
        },
    },
});
