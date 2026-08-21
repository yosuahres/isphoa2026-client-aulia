import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

// The site palette lives in CSS custom properties so .surface-light can
// override the whole set in place; <alpha-value> keeps opacity modifiers
// like bg-shell/55 working.
const site = (name) => `rgb(var(--site-${name}) / <alpha-value>)`;

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        // The nav controller toggles classes from JS, so this file is a source
        // of class names too; without it those utilities are never generated.
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['Inter Tight', 'Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                paper: site('paper'),
                deep: site('deep'),
                mist: site('mist'),
                shell: site('shell'),
                ink: site('ink'),
                subtle: site('subtle'),
                faint: site('faint'),
                line: site('line'),
                navy: site('navy'),
                beam: site('beam'),
            },
        },
    },

    plugins: [forms, typography],
};
