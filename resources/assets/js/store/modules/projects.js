export default {
    state: {
        data: []
    },
    mutations: {
        set(state, params){
            state.data = [];
            state.data.push(...params);
        },
        add(state, params){
            state.data.unshift(params);
        },
        remove(state, id){
            //find the index
            let index = state.data.findIndex(element => (element.id === id));
            state.data.$remove(index);
        }
    },
    getters: {
        withId: (state, getters) => (id) => {
            let projects = state.data;
            return projects.helper.find(projects, element => {
                return element.id === id
            });
        },
        map: (state, getters, rootState, rootGetters) => (project) =>{
            if(!project.server){return project;}
            project.server.forEach((element, index) => {
                project.server[index] = rootGetters["server/withId"](element)
            });

            return project;
        }
    },
    actions: {
        create({commit}, params){

            const cb = params.cb || (() => {});

            const promise = axios.post("projects", {
                title: params.title,
                description: params.description
            }).then((response) => {

                //add a snackbar msg with the successful msg
                commit("snackbar/add", {
                    msg: response.data.msg,
                    timeout: 2000
                }, {root: true});

                //add the project to the state
                commit("add", response.data.data);
            }).catch((error) => {
                commit("snackbar/add", {
                    msg: error.response.data.description,
                    multiline: true
                }, {root: true});
            });

            cb(promise);
        }
    },
    namespaced: true
}