export default {
    state: {
        data: [{
            title: "Server title",
            description: "Status changed ...",
            icon: "error_outline",
            read: false,
            visible: true,
            id: 0,
            mode: "info"
        }],
        windowOpen: false
    },
    mutations: {
        add: (state, params) => {
            state.data.push({
                title: params.title || "",
                description: params.description || "",
                icon: params.icon || "error_outline",
                read: false,
                visible: true,
                id: state.data.length, //id of the notification: basically just the index
                mode: params.mode || "info"
            });
        },
        setWindow: (state, open) => {
            state.windowOpen = open;
        },
        switchWindow: (state) => {
            state.windowOpen = !state.windowOpen;
        },
        markAllAsRead: (state, getters) => {
            state.data.forEach(element => element.read = true);
        },
        close: (state, id) => {
            state.data[id].visible = false;
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