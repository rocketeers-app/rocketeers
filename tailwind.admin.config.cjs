import preset from './vendor/filament/filament/tailwind.config.preset.js'

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './resources/views/filament/**/*.blade.php',
        './app/Filament/**/*.php',
        './vendor/filament/**/*.blade.php',
    ],
    plugins: [
        // require('@tailwindcss/typography'),
    ],
}