import axios from 'axios';

const state = {
    user: {},
    loggedin: false
};
const getters = {};
const actions = {
    // getUser({commit}) {
    //     axios
    //     .get("/user/current")
    //     .then(response => {
    //         commit('setUser', response.data);
    //     });
    // },
    login({}, user) {
        axios
        .post("/user/login", {
            email: user.email,
            password: user.password
        })
        .then((response) => {
            state.loggedin = true;
            state.user = response.data.user;
            console.log('ok');
        })
        .catch(e => {
            console.error(e);
        });
    },
};
const mutations = {
    // setUser(state, data) {
    //     state.user = data;
    // }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}