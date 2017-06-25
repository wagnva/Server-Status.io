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
    namespaced: true
}