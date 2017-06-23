export default {
    state: {
        data: {}
    },
    getters: {
        withId: (state) => (id) => {
            return state.data[id] || {};
        },
        forServer: (state) => (_id) => {
            const values = [];
            const id = parseInt(_id);
            for(var key in state.data){
                if(state.data.hasOwnProperty(key)){
                   values.push(state.data[key]);
                }
            }

            return values.filter(element => element.server_id === id);
        },
        current: (state, getter) => (id) => {
            let values = getter.forServer(id);

            //find the status that was the most recently created
            return values.sort((el1, el2) => {
                let date1 = new Date(el1.created_at);
                let date2 = new Date(el2.created_at);

                if(date1 > date2){
                    return -1;
                }
                if(date1 < date2){
                    return 1;
                }

                return 0;

            })[0] || {}; //return the first element -> the newest element or just an empty object

        }
    },
    mutations: {
        add(state, params){
            //key: id, value: params
            state.data[params.id] = params;
        }
    },
    namespaced: true
}