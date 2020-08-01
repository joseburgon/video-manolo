import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './views/Home';
import Movie from './views/Movie';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/', name: 'home', component: Home,
        },
        {
            path: '/movie/:id', name: 'movie', component: Movie,
        }
    ]
});