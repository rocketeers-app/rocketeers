import typography from '@tailwindcss/typography'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/**/*',
    ],
    plugins: [
        typography,
    ],
}