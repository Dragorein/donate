const state = {
    user: {
        name: "franz"
    }
};
const getters = {};
const actions = {
    login({}, user) {
        axios
        .post("/user/login", {
            email: user.email,
            password: user.password
        })
        .then((response) => {
            console.log(response);
        })
        .catch(e => {
            console.error(e);
        });
    },
};
const mutations = {};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}