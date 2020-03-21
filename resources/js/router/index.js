import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Search from "../components/search/container"
import Landing from "../components/landing/container"

const routes = [
    {
        component: Landing,
        name: "landing",
        path: "/"
    },
    {
        component: Search,
        name: "search",
        path: "/search"
    },
];

export default new VueRouter({
    mode: 'history',
    routes
});