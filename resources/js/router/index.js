import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Landing from "../components/landing/container"
import Search from "../components/search/container"
import Register from "../components/register/container"
import Campaign from "../components/campaign/container"
import CampaignDetail from "../components/campaign/detailContainer"
import Payment from "../components/payment/container"
import PaymentDone from "../components/payment/doneContainer"
import Profile from "../components/profile/container"
import Dashboard from "../components/dashboard/container"
import Start from "../components/start/container"

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
        path: "/campaign/detail/:id"
    },
    {
        component: Payment,
        name: "payment",
        path: "/payment"
    },
    {
        component: PaymentDone,
        name: "payment",
        path: "/payment/done"
    },
    {
        component: Profile,
        name: "profile",
        path: "/profile"
    },
    {
        component: Dashboard,
        name: "dashboard",
        path: "/dashboard"
    },
    {
        component: Start,
        name: "start",
        path: "/start"
    }
];

export default new VueRouter({
    mode: 'history',
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    },
    routes
});
