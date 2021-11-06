const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    purge: {
        enabled: true,
        content: ['./resources/views/**/*'],
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
}
