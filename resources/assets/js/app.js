require('./bootstrap');

import Vue from "vue"
import VueRouter from "vue-router"
import Vuetify from "vuetify"
import Vuex, {mapState, mapGetters} from "vuex"
import Validator from "./helper/validator"

Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(Vuex);

window.Vue = Vue;
window.mapState = mapState;
window.mapGetters = mapGetters;

Vue.prototype.$http = axios;
Vue.prototype.is = Validator;

Vue.component("base-layout", require("./layout/BaseLayout.vue"));
Vue.component("snackbar-manager", require("./components/SnackbarManager.vue"));

/*
    Setup the router
 */
const Containers = {
    Dashboard: require("./features/dashboard/DashboardContainer.vue"),
    Project: require("./features/project/ProjectContainer.vue"),
    NewProject: require("./features/project/NewProjectContainer.vue")
};

const routerInstance = new VueRouter({
   routes: [
       {
           path: "/",
           name: "home",
           component: Containers.Dashboard
       },
       {
           path: "/project/new",
           name: "project_new",
           component: Containers.NewProject
       },
       {
           path: "/project/:id",
           name: "project",
           component: Containers.Project
       }
   ]
});

/*
    Load the userdata into the store
 */
import store from "./store"

var $userdiv = $("#user");
var userData = JSON.parse($userdiv.text());

store.commit("user/set", {user: userData});

$userdiv.remove();


/*
    Start the App
 */

const app = new Vue({
    router: routerInstance,
    store : store
}).$mount("#app");




