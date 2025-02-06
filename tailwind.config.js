/** @type {import('tailwindcss').Config} */
import defaultTheme from'tailwindcss/defaultTheme';
export default {
 content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],

  theme: {
    extend: {
        fontFamily: {
          sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        },
      },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}

