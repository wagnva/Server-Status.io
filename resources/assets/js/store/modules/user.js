export default {
    state: {
        id: "",
        name: "",
        email: "",
        created_at: "",
        updated_at: ""
    },
    mutations: {
        set(state, param){
            state.id = param.user.id;
            state.name = param.user.name;
            state.email = param.user.email;
            state.created_at = param.user.created_at;
            state.updated_at = param.user.updated_at;
        }
    },
    namespaced: true
};