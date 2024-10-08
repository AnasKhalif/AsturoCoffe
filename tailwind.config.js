/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                nakilla: ['Nakilla', 'sans-serif'],
                'plus-jakarta': ['"Plus Jakarta Sans"', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
