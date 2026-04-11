import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
<<<<<<< HEAD
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
=======
>>>>>>> 6cbe6e64ea295590b9ddd9aea98fc5d30f3e768d
});
