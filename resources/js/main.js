import Vue from 'vue';
import App from './App';

require('./bootstrap');

const app = new Vue({
    el: '#app',

    components: {
        App
    },
});
