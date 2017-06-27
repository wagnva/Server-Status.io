export default {
    state: {
        data: {}
    },
    getters: {
        withId: (state) => (id) => {
            return state.data[id] || {};
        }
    },
    mutations: {
        set(state, params){
            state.data = {};
            params.forEach(element => {
                Vue.set(state.data, element.id, element);
            });
        },
        add(state, params){
            //key: id, value: params
            state.data[params.id] = params;
        },
        addStatus(state, params){
            //adds a new status id to a server
            state.data[params.serverID].statuses.push(params.statusID);
        }
    },
    actions: {
        addStatus({commit, getters}, params){
            /*
                Takes care of adding a new status to a server
                Adds the id to the server, the status to the status store, and also dispatches a notification
             */

            //add the status to the status module
            commit("statuses/add", params.currentStatus, {root: true});

            //add the status id to the server
            commit("addStatus", {
                serverID: params.forServer,
                statusID: params.currentStatus.id
            });


            //adds a notification if the status changed to "offline"
            if(params.currentStatus.status === "offline"){
                //get the server title
                let title = getters.withId(params.forServer).title;

                commit("notifications/add", {
                    title: title,
                    description: "The server status changed to: " + params.currentStatus.status,
                    mode: "error"
                }, {root: true});
            }

        }
    },
    namespaced: true
}