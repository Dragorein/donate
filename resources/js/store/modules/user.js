import axios from 'axios';

const state = {
    user: {},
    loggedin: false
};
const getters = {};
const actions = {
    getUser({commit}) {
        axios
        .get("/user/current")
        .then(response => {
            if(response.data != null) {
                commit('setUser', response.data);
                commit('setUserStatus', response.data);
            }
        });
    },
    login({}, user) {
        axios
        .post("/auth/login", {
            email: user.email,
            password: user.password
        })
        .then((response) => {
            state.user = response.data.user;
            state.loggedin = response.data.loggedin;
            console.log('logged in');
        })
        .catch(e => {
            console.error(e);
        });
    },
    logout() {
        axios
        .post("/auth/logout")
        .then((response) => {
            console.log('logged out');
        })
        .catch(e => {
            console.error(e);
        });
    },
};
const mutations = {
    setUser(state, data) {
        state.user = data.user;
    },
    setUserStatus(state, data) {
        state.loggedin = data.loggedin;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}