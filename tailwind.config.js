const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                blue: colors.sky,
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('daisyui'),
    ],

    daisyui: {
        themes: [{
            'light': {
                /* your theme name */
                'primary': '#396EB0',
                /* Primary color */
                'primary-focus': '#0F52BA',
                /* Primary color - focused */
                'primary-content': '#ffffff',
                /* Foreground content color to use on primary color */

                'secondary': '#FFC947',
                /* Secondary color */
                'secondary-focus': '#f3cc30',
                /* Secondary color - focused */
                'secondary-content': '#ffffff',
                /* Foreground content color to use on secondary color */

                'accent': '#37cdbe',
                /* Accent color */
                'accent-focus': '#2aa79b',
                /* Accent color - focused */
                'accent-content': '#ffffff',
                /* Foreground content color to use on accent color */

                'neutral': '#3d4451',
                /* Neutral color */
                'neutral-focus': '#2a2e37',
                /* Neutral color - focused */
                'neutral-content': '#ffffff',
                /* Foreground content color to use on accent color */

                'base-100': '#ffffff',
                /* Base color of page, used for blank backgrounds */
                'base-200': '#f9fafb',
                /* Base color, a little darker */
                'base-300': '#d1d5db',
                'base-450': '#A2D5F2',
                /* Base color, even more darker */
                'base-content': '#125D98',
                /* Foreground content color to use on base color */
                'base-450': '#07689F',

                'info': '#132877',
                /* Info */
                'success': '#22C55E',
                /* Success */
                'warning': '#3b9517',
                /* Warning */
                'error': '#dc3545',
                /* Error */
            },
        }, ],
    },
};