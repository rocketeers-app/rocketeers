module.exports = {
    mode: 'jit',
    important: true,
    content: [
        './resources/views/**/*'
    ],
    plugins: [
        require('@tailwindcss/typography'),
    ],
}
