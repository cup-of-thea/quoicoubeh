/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: 'selector',
  theme: {
        fontFamily: {
            'sans': ['Reddit Mono', 'sans-serif'],
        },
    extend: {
        maxWidth: {
            '8xl': '88rem',
            '9xl': '96rem',
            '10xl': '104rem',
        },
        colors: {
            'amaranth-purple': '#AA1155',
            'raspberry': '#DD1155',
            'alice-blue': '#F5FCFF',
            'moonstone': '#39A2AE',
            'paynes-gray': '#4C5C68',
            'black-pearl': '#0C0C0C',
            'white': '#FFFFFF',
        },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}

