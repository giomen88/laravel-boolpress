import Vue from 'vue'
import VueRouter from 'vue-router'

import HomePage from './components/pages/HomePage';
import AboutPage from './components/pages/AboutPage';
import ContactsPage from './components/pages/ContactsPage';

Vue.use(VueRouter)

const routes = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/', component: HomePage, name: 'HomePage' },
        {path: '/about', component: AboutPage, name: 'AboutPage' },
        {path: '/contacts', component: ContactsPage, name: 'ContactsPage' },
        // {path: '/posts/{}', component: PostDetailsPage, name: 'PostDetailsPage' },
    ]
});

export default routes;
