/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        padding: {
            '50p': '50%',
            '30p': '30%',
            '20p': '20%',
            '15p': '15%',
          },
      },
    },
    plugins: [
      "@tailwindcss/forms"
    ],
  }