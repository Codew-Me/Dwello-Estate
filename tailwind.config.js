import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'dwello-brown': '#36211A',
                'dwello-beige': '#FDF8F5',
                'dwello-light-beige': '#EADCD2',
                'dwello-tan': '#EADED4',
            },
        },
    },

    plugins: [forms],
};
