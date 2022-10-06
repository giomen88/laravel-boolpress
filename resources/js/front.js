require('./bootstrap');

window.Vue = require('vue');

import router from './router.js';
import App from './components/App.vue';

const root = new Vue({
    router,
    el: '#root', 
    render: h => h(App)
});