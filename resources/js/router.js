import Vue from "vue";
import Router from "vue-router";
Vue.use(Router);

import home from "./pages/Home";
import events from "./pages/Events";
import documents from "./pages/Documents";
import users from "./pages/Users";

const routes = [{
        path: "/home",
        component: home,
        name: "home"
    },
    {
        path: "/tradeevents",
        component: events,
        name: "events"
    },
    {
        path: "/documents",
        component: documents,
        name: "documents"
    },
    {
        path: "/users",
        component: users,
        name: "users"
    }
];

export default new Router({
    mode: "history",
    routes
});
