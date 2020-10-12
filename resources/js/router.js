import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import home from './pages/Home';
import events from './pages/Events';

const routes = [{
        path: '/home',
        component: home,
        name: 'home'
    },
    {
        path: '/events',
        component: events,
        name: 'events'
    }

]

export default new Router({
    mode: 'history',
    routes
})
