import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Landing from "../components/landing/container"
import Search from "../components/search/container"
import Register from "../components/register/container"
import Campaign from "../components/campaign/container"
import CampaignDetail from "../components/campaign/detailContainer"
import Payment from "../components/payment/container"

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
    {
        component: Register,
        name: "register",
        path: "/register"
    },
    {
        component: Campaign,
        name: "campaign",
        path: "/campaign"
    },
    {
        component: CampaignDetail,
        name: "campaignDetail",
        path: "/campaign/detail"
    },
    {
        component: Payment,
        name: "payment",
        path: "/payment"
    }
];

export default new VueRouter({
    mode: 'history',
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    },
    routes
});