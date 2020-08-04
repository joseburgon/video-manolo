import Vue from 'vue';
import router from './router';
import store from './store';
import App from './App';

require('./bootstrap');

const app = new Vue({
    el: '#app',

    components: {
        App
    },

    store,

    router,
});
