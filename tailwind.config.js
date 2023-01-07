const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "theme-yellow": "#FDC700",
                "theme-lyellow": "#f8ce2f",
                "theme-orange": "#FDA401",
                "theme-gray": "#323232",
                "theme-lgray": "#D9D9D9",
                "theme-lgray2": "#4c4a4a",
                "theme-lgray3": "#EAEAEA",
                "theme-lwgray": "#F2F2F2",
                "theme-swhite": "#FAFAFA",
                "theme-bblack": "#00000096",
                "theme-black": "#000000"
            },
        },
    },

    plugins: [require('@tailwindcss/forms'),require('@tailwindcss/typography'),require('tailwind-scrollbar')],
};
