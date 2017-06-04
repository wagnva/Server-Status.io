require('./bootstrap');

import Vue from "vue"
import VueRouter from "vue-router"
import Vuetify from "vuetify"
import Vuex, {mapState} from "vuex"

Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(Vuex);

window.Vue = Vue;
window.mapState = mapState;

Vue.component("base-layout", require("./layout/BaseLayout.vue"));

//All the containers for the routes
const Containers = {
    Dashboard: require("./features/dashboard/DashboardContainer.vue")
};

const routerInstance = new VueRouter({
   routes: [
       {
           path: "/",
           component: Containers.Dashboard
       }
   ]
});

import store from "./store"

const app = new Vue({
    router: routerInstance,
    store : store
}).$mount("#app");

console.log("App mounted");