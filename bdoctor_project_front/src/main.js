import { createApp } from "vue";
import chart from "./js/chart";
import "bootstrap/dist/css/bootstrap.min.css";
import {createRouter, createWebHistory} from 'vue-router';
import App from "./App.vue";

import Homepage from './components/Homepage.vue';
import ProfilePage from './pages/ProfilePage.vue';
const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/search?:specialization', name: 'home', component: Homepage },
        { path: '/profiles/:id', name: 'profile', component: ProfilePage },

        // { path: '/about', component: About },
    ] //provides routes options in an array
})

createApp(App).use(router).mount("#app"); 