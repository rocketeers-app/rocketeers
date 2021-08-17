module.exports = {
    purge: {
        enabled: true,
        content: ['./resources/views/**/*'],
    },
    theme: {
        extend: {},
    },
    variants: {},
    plugins: [
        require('@tailwindcss/typography'),
    ],
}
