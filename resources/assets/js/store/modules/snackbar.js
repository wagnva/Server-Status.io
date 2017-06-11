export default {
    state: {
        all: []
    },
    mutations: {
        add(state, params){
            state.all.push({
                visible: true,
                msg: params.msg || "An Error occurred",
                timeout: params.timeout || 6000,
                multiline: params.multiline || false
            });
        },
        remove(state, params){
            state.all[params.index].visible = false;
        }
    },
    actions: {

    },
    namespaced: true
}