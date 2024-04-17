import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '10.10.55.102', // Usa la dirección IP específica de tu interfaz de red
        port: 3000, // Puedes especificar un puerto si el puerto 3000 ya está ocupado
        hmr: {
            // Configura HMR para que también utilice la dirección IP
            host: '10.10.55.102',
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
