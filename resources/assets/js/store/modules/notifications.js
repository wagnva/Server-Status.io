export default {
    state: {
        data: [{
            title: "Server title",
            description: "Status changed ...",
            icon: "error_outline",
            read: false,
            visible: true
        }],
        windowOpen: true
    },
    mutations: {
        add: (state, params) => {
            state.data.push({
                title: params.title || "",
                description: params.description || "",
                icon: params.icon || "error_outline",
                read: false,
                visible: true
            });
        },
        setWindow: (state, open) => {
            state.windowOpen = open;
        },
        switchWindow: (state) => {
            state.windowOpen = !state.windowOpen;
        }
    },
    getters: {
        countUnread: (state, getters) => {
            return state.data.filter(element => !element.read).length;
        },
        visible: (state, getters) => {
            return state.data.filter(element => element.visible);
        }
    },
    namespaced: true
}