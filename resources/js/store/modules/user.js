import axios from 'axios';

const state = {
    user: {},
    loggedin: false,
    errors: {},
    message: ""
};
const getters = {};
const actions = {
    getUser({commit}) {
        axios
        .get("/auth/current")
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
            state.message = response.data.message;
            console.log('logged in');
        })
        .catch(e => {
            if (e.response.status == 422){
                state.errors = e.response.data.errors;
                state.message = "";
            }
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