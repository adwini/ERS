/** @type {import('tailwindcss').Config} */
export default {
    daisyui: {
        themes: ["night", "fantasy"],
    },
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
};
