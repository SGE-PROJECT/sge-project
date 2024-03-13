/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
        borderWidth: {
            DEFAULT: '1px',
            '0': '0',
            '2': '2px',
            '3': '3px',
            '4': '4px',
            '6': '6px',
            '8': '8px',
            '16': '16px',
        },

      extend: {
        colors: {
            'green-ut': '#03a696',
          },

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
