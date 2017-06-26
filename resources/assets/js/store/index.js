import Vue from "vue"
import Vuex from "vuex"
import sockets from "./sockets"
import UserModule from "./modules/user"
import ProjectsModule from "./modules/projects"
import SnackbarModule from "./modules/snackbar"
import ServerModule from "./modules/server"
import StatusesModule from "./modules/statuses"
import NotificationsModule from "./modules/notifications"

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
        statuses: StatusesModule,
        notifications: NotificationsModule
    }
});

export {sockets};
export default store