/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        borderWidth: {
            DEFAULT: "1px",
            0: "0",
            2: "2px",
            3: "3px",
            4: "4px",
            6: "6px",
            8: "8px",
            16: "16px",
        },

        extend: {
            animation: {
                "bounce-slow": "bounce 1s ease-in-out", // Cambia '1s' por el tiempo deseado
            },
            colors: {
                "green-ut": "#03a696",
            },

            padding: {
                "50p": "50%",
                "30p": "30%",
                "20p": "20%",
                "15p": "15%",
            },
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
            boxShadow: {
                "teal-500":
                    "0 0px 8px -2px rgba(3, 166, 150, 0.1), 0 2px 6px -2px rgba(3, 166, 150, 0.06)",
            },
        },
    },
    plugins: ["@tailwindcss/forms"],
};
