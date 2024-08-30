import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'; 
import { fileURLToPath } from 'url';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue(),
        
    ],
    resolve: { 
        alias: {
            '@': fileURLToPath(new URL('./resources/js/src', import.meta.url)),
            vue: 'vue/dist/vue.esm-bundler.js',
        },
        
    },
    server: {
        watch: {
            usePolling: true,
        },
        // unning the Vite development server on Windows Subsystem for Linux 2 (WSL2)
        hmr: {
            host: 'localhost',
        },
    }
});
