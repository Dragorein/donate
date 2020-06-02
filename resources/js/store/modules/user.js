import axios from 'axios'
import router from '../../router/index.js'

const state = {
    user: {},
    loggedin: false,
    registerStep: 1,
    errors: {},
    message: ""
};
const getters = {};
const actions = {
    register({}, user) {
        axios
            .post("/auth/register", user, {
                headers: {
                    'accept': 'application/json',
                    'Accept-Language': 'en-US,en;q=0.8',
                    'Content-Type': `multipart/form-data`,
                }
            })
            .then(response => {
                if (response.data.response == 'continue' && state.registerStep == 1) {
                    state.registerStep = 2;
                } else if (response.data.response == 'success') {
                    state.message = response.data.message;
                    router.push({
                        path: '/'
                    });
                }
            })
            .catch(e => {
                if (e.response.status == 422) {
                    state.errors = e.response.data.errors;
                    state.message = "";
                }
            });
    },

    login({}, user) {
        axios
            .post("/auth/login", {
                email: user.email,
                password: user.password,
                token: user.csrf
            })
            .then((response) => {
                state.user = response.data.user;
                state.loggedin = response.data.loggedin;
                state.message = response.data.message;
                console.log('logged in');
            })
            .catch(e => {
                if (e.response.status == 422) {
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
    getUser({
        commit
    }) {
        axios
            .get("/auth/current")
            .then(response => {
                if (response.data != null) {
                    commit('setUser', response.data);
                    commit('setUserStatus', response.data);
                }
            });
    }
};
const mutations = {
    setUser(state, data) {
        state.user = data.user;
    },
    setUserStatus(state, data) {
        state.loggedin = data.loggedin;
    },
    setRegisterStep(state, data) {
        state.registerStep = data;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
