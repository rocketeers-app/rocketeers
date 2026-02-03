import { defineConfig } from "vite";
import tailwindcss from '@tailwindcss/vite';
import laravel, { refreshPaths } from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            hotFile: 'public/admin.hot',
            input: ['resources/css/filament/admin/theme.css'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
