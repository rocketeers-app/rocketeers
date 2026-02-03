import { defineConfig } from "vite";
import tailwindcss from '@tailwindcss/vite';
import laravel, { refreshPaths } from "laravel-vite-plugin";

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
        tailwindcss(),
    ],
});
