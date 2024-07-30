/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                turquoise: {
                    light: '#a8e6cf',
                    DEFAULT: '#40e0d0',
                    dark: '#16a085',
                },
                yellow: {
                    light: '#ffeb99',
                    DEFAULT: '#ffd700',
                    dark: '#cca300',
                },
            },
        },
    },
    plugins: [],
}

