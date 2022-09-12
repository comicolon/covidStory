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
        fontSize: {
            'xs': '.75rem',
            'sm': '.875rem',
            'tiny': '.875rem',
            'base': '1rem',
            'lg': '1.125rem',
            'xl': '1.25rem',
            '2xl': '1.5rem',
            '3xl': '1.875rem',
            '4xl': '2.25rem',
            '5xl': '3rem',
            '6xl': '4rem',
            '7xl': '5rem',
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundSize: {
                'size-200': '200% 200%',
            },
            backgroundPosition: {
                'pos-0': '0% 0%',
                'pos-100': '100% 100%',
            },
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                'white': '#ffffff',
                'purple': '#3f3cbb',
                'midnight': '#121063',
                'metal': '#565584',
                'tahiti': '#3ab7bf',
                'silver': '#ecebff',
                'bubble-gum': '#ff77e9',
                'bermuda': '#78dcca',
                'siteTheme1': '#4A947E',
                'siteTheme2': '#B3FFE8',
                'siteTheme3': '#87e1c6',
                'siteTheme4': '#944E3B',
                'siteTheme5': '#E09A87',
                //베스트모아 사이트 시그니처 색상
                'site_clien': '#3e487e',
                'site_slrclub': '#588bda',
                'site_ppomppu': '#a4a4a4',
                'site_bobaedream': '#5486c6',
                'site_inven': '#90c34f',
                'site_ruliweb': '#2860b2',
                'site_huniv': '#da3e4c',
                'site_fmkorea': '#5775ca',
                'site_natepann': '#dd5241',
                'site_theqoo': '#3e5370',
                'site_dcinside': '#3e488d',
                'site_instiz': '#5cbb65',
                'site_etoland': '#489635',
            },

        },
    },



    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
