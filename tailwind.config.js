import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
import preset from "./vendor/filament/support/tailwind.config.preset";

export default {
    presets: [preset],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
    ],
    darkMode: "selector",
    theme: {
        fontFamily: {
            sans: ["Luciole", "sans-serif"],
        },
        screens: {
            sm: "425px",
            md: "768px",
            lg: "1024px",
            xl: "1440px",
        },
        extend: {
            maxWidth: {
                "8xl": "88rem",
                "9xl": "96rem",
                "10xl": "104rem",
            },
            colors: {
                "amaranth-purple": "#AA1155",
                raspberry: "#DD1155",
                "alice-blue": "#F5FCFF",
                moonstone: "#39A2AE",
                "paynes-gray": "#4C5C68",
                "black-pearl": "#0C0C0C",
                white: "#FFFFFF",
            },
        },
    },
    plugins: [
        require("@tailwindcss/typography"),
        require("@tailwindcss/typography"),
        forms,
    ],
};
