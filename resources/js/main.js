import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


//import createApp from Vue
import { createApp } from 'vue';

//import component App
import App from './src/App.vue';

//import config router
import router from './src/router'

//create App Vue
const app = createApp(App);

//gunakan "router" di Vue dengan plugin "use"
app.use(router).mount('#app');
