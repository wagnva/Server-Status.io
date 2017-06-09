export default {
    state: {
        data: []
    },
    mutations: {
        set(state, params){
            state.data.push(...params);
        }
    },
    namespaced: true
}