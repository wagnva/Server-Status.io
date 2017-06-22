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
            state.data = [];
            state.data.push(...params);
        },
        add(state, params){
            //key: id, value: params
            state.data[params.id] = params;
        }
    },
    namespaced: true
}