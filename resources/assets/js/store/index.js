import Vue from "vue"
import Vuex from "vuex"

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        projects: [
            {title: "Test 1"},
            {title: "Test 2"},
            {title: "Test 3"},
            {title: "Test 4"},
            {title: "Test 5"},
            {title: "Test 6"},
            {title: "Test 7"}
        ]
    }
});

export default store