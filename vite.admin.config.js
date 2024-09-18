import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import tailwindcss from 'tailwindcss';
import tailwindConfig from './tailwind.admin.config.cjs';

export default defineConfig({
    plugins: [
        laravel({
            hotFile: 'public/admin.hot',
            input: ['resources/css/filament/admin/theme.css'],
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
