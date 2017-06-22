import Vue from "vue"
import Vuex from "vuex"
import UserModule from "./modules/user"
import ProjectsModule from "./modules/projects"
import SnackbarModule from "./modules/snackbar"
import ServerModule from "./modules/server"
import StatusesModule from "./modules/statuses"

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        sidebarOpen: true
    },
    mutations: {
        switchSidebar(state){
            state.sidebarOpen = !state.sidebarOpen;
        },
        setSidebar(state, param){
            state.sidebarOpen = param;
        }
    },
    modules: {
        user: UserModule,
        projects: ProjectsModule,
        snackbar: SnackbarModule,
        server: ServerModule,
        statuses: StatusesModule
    }
});

export default store