/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./storage/app/posts/**/*.md",
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
                scarlet: "#F53100",
                "atomic-tangerine": "#FD9855",
                "rajah-orange": "#FFB84D",
                powder: "#fffffe",
                "sky-magenta": "#D161A2",
                murrey: "#A20161",
                "paynes-gray": "#4C5C68",
                "rich-black": "#161E27",
                white: "#FFFFFF",
            },
            boxShadow: {
                bento: "0 2px 4px rgba(0, 0, 0, .04);",
            },
            aspectRatio: {
                "1/2": "1 / 2",
                "2/1": "2 / 1",
            },
        },
    },
    plugins: [require("@tailwindcss/typography")],
};
