require('./bootstrap');

import Vue from "vue"
import VueRouter from "vue-router"
import Vuetify from "vuetify"
import Vuex, {mapState, mapGetters} from "vuex"
import Validator from "./helper/validator"
import ArrayHelper from "./helper/array"
import Normalizer from "./helper/normalizer"
import * as Moment from "moment"

Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(Vuex);

//Helper methods etc.
window.Vue = Vue;
window.mapState = mapState;
window.mapGetters = mapGetters;
window.array = ArrayHelper;
window.Normalizer = Normalizer;
window.moment = Moment;

Vue.prototype.$http = axios;
Vue.prototype.is = Validator;
Vue.prototype.array = ArrayHelper;
Vue.prototype.Normalizer = Normalizer;
Vue.prototype.Echo = window.Echo;
Vue.prototype.moment = Moment;

Array.prototype.helper = ArrayHelper;

Vue.component("base-layout", require("./layout/BaseLayout.vue"));
Vue.component("snackbar-manager", require("./components/SnackbarManager.vue"));
Vue.component("app-preloader", require("./features/loader/AppPreloader.vue"));

/*
    Setup the router
 */
const Containers = {
    Dashboard: require("./features/dashboard/DashboardContainer.vue"),
    Project: require("./features/project/ProjectContainer.vue"),
    NewProject: require("./features/project/NewProjectContainer.vue"),
    Server: require("./features/server/ServerContainer.vue")
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
           path: "/project/:projectId",
           name: "project",
           component: Containers.Project
       },
       {
           path: "/project/:projectId/server/:serverId",
           name: "server",
           component: Containers.Server
       }
   ]
});


//Load the userdata into the store
import store from "./store"

var $userdiv = $("#user");
var userData = JSON.parse($userdiv.text());

store.commit("user/set", {user: userData});

$userdiv.remove();

//setup the normalizer
Normalizer.setStore(store);

//Start the app
const app = new Vue({
    router: routerInstance,
    store : store
}).$mount("#app");


//ECHO TEST
window.Echo.channel("App.User." + userData.id)
    .listen("ServerStatusChangeEvent", (e) => {
        console.log(e);
    });
