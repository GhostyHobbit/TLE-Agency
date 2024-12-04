import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from "tailwindcss/colors.js";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Radikal', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'mossLight' : '#E2ECC8',
                'mossMedium' : '#92AA83',
                'mossFoot' : '#313D29',
                'mossDark' : '#2E342A',
                'yellow' : '#FAEC02',
                'violet' : '#AA0160',
                'violetDark' : '#7C1A51',
                'cream' : '#FBFCF6',
                'white' : '#FFFFFF',
                'strokeThin' : '#DFDFDF',
            }
        },
    },
    plugins: [],
};
