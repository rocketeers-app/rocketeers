module.exports = {
    mode: 'jit',
    purge: {
        content: ['./resources/views/**/*'],
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
}
