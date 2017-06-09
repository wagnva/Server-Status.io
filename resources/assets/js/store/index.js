import Vue from "vue"
import Vuex from "vuex"
import UserModule from "./modules/user.js"
import ProjectsModule from "./modules/projects"

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        projects: [
        ],
        sidebarOpen: true
    },
    mutations: {
        switchSidebar(state){
            state.sidebarOpen = !state.sidebarOpen;
        }
    },
    modules: {
        user: UserModule,
        projects: ProjectsModule
    }
});

export default store