import {update} from "lodash/object";

export default {
    namespaced: true,

    state: {
        uuid: null,
        engi: {
            title: null,
        },
        errors: {},

        engi_list_url: '/engi',
        engi_url: '/api/engi/',
        engi_create_url: '/api/engi',

        show_success_modal: false,
        show_error_modal: false,
    },

    getters: {
        getFormData(state, getters, rootState, rootGetters) {
            const update_data = new FormData();
            update_data.append('engi', JSON.stringify(state.engi));

            // デバッグ用
            // console.log(...update_data.entries());
            // console.log(update_data.getAll('engi'));

            return update_data;
        }
    },

    mutations: {
        initUuid(state, payload) {
            state.uuid = payload.uuid;
        },
        setTitle(state, payload) {
            state.engi.title = payload.title;
        },
        showSuccessModal(state) {
            state.show_success_modal = true;
        },
        showErrorModal(state) {
            state.show_error_modal = true;
        }
    },

    actions: {
        getEngi({commit, state, getters}) {
            axios.get(state.engi_url + state.uuid)
                .then(response => {
                    state.engi = response.data.engi;
                })
                .catch(error => {
                    if (error.response.status === 404) {
                        window.location.replace('/404');
                    }
                })
        },

        createEngi({commit, state, getters}) {
            state.errors = {};
            axios.post(state.engi_create_url, getters.getFormData)
                .then(response => {
                    if (response.status === 201) {
                        commit('showSuccessModal');
                        setTimeout(() => {
                            window.location.replace(state.engi_list_url);
                        }, 1000)
                    }
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        state.errors = {...state.errors, ...error.response.data.errors}
                    } else {
                        commit('showErrorModal');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    }
                });
            // .finally(() => {
            //     //
            // })
            ;
        },

        updateEngi({commit, state, getters}) {
            state.errors = {};
            axios.post(state.engi_url + state.uuid, getters.getFormData, {
                headers: {'X-HTTP-Method-Override': 'PUT'}
            })
                .then(response => {
                    if (response.status === 200) {
                        commit('showSuccessModal');
                        setTimeout(() => {
                            window.location.replace(state.engi_list_url);
                        });
                    }
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        state.errors = {...state.errors, ...error.response.data.errors};
                    } else {
                        commit('showErrorModal');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    }
                })
                .finally(() => {
                    //
                });
        },
    }
}
