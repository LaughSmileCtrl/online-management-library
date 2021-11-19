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
                'primary': '#a991f7',
                /* Primary color */
                'primary-focus': '#8462f4',
                /* Primary color - focused */
                'primary-content': '#ffffff',
                /* Foreground content color to use on primary color */

                'secondary': '#f6d860',
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
                /* Base color, even more darker */
                'base-content': '#1f2937',
                /* Foreground content color to use on base color */

                'info': '#7367f0',
                /* Info */
                'success': '#22C55E',
                /* Success */
                'warning': '#ffc107',
                /* Warning */
                'error': '#dc3545',
                /* Error */
            },
        }, ],
    },
};