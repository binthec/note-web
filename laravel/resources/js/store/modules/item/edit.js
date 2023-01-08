export default {
    namespaced: true,

    state: {
        uuid: null,
        item: {
            title: null,
            first_category: 1,
            second_category: null,
            third_category: null,
        },
        errors: {},

        list_url: '/items',
        show_url: '/api/items/',
        create_url: '/api/items',
        get_cate_url: '/api/items/categories',

        first_categories: [],
        second_categories: [],
        third_categories: [],

        show_success_modal: false,
        show_error_modal: false,
    },

    getters: {
        getFormData(state, getters, rootState, rootGetters) {
            const update_data = new FormData();
            update_data.append('item', JSON.stringify(state.item));

            // デバッグ用
            // console.log(...update_data.entries());
            // console.log(update_data.getAll('contents'));

            return update_data;
        }
    },

    mutations: {
        initUuid(state, payload) {
            state.uuid = payload.uuid;
        },
        setTitle(state, payload) {
            state.item.title = payload.value;
        },
        showSuccessModal(state) {
            state.show_success_modal = true;
        },
        showErrorModal(state) {
            state.show_error_modal = true;
        }
    },

    actions: {
        getItem({commit, state, getters}) {
            axios.get(state.show_url + state.uuid)
                .then(response => {
                    state.item = response.data.item;
                })
                .catch(error => {
                    console.log(error);
                    if (error.response.status === 404) {
                        window.location.replace('/404');
                    }
                })
        },

        createItem({commit, state, getters}) {
            state.errors = {};
            axios.post(state.create_url, getters.getFormData)
                .then(response => {
                    if (response.status === 201) {
                        commit('showSuccessModal');
                        setTimeout(() => {
                            window.location.replace(state.list_url);
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

        updateItem({commit, state, getters}) {
            state.errors = {};
            axios.post(state.show_url + state.uuid, getters.getFormData, {
                headers: {'X-HTTP-Method-Override': 'PUT'}
            })
                .then(response => {
                    if (response.status === 200) {
                        commit('showSuccessModal');
                        setTimeout(() => {
                            window.location.replace(state.list_url);
                        });
                    }
                })
                .catch(error => {
                    console.log(error);
                    // if (error.response.status === 422) {
                    //     state.errors = {...state.errors, ...error.response.data.errors};
                    // } else {
                    //     commit('showErrorModal');
                    //     setTimeout(() => {
                    //         window.location.reload();
                    //     }, 1000);
                    // }
                })
                .finally(() => {
                    //
                });
        },

        /**
         * 分類を取得
         *
         * @param commit
         * @param state
         * @param getters
         */
        getCategories({commit, state, getters}){
            axios.get(state.get_cate_url)
                .then(response => {
                    console.log(response);
                    state.first_categories = response.data.first_categories;
                })
                .catch(error => {
                    console.log(error);
                    // if (error.response.status === 404) {
                    //     window.location.replace('/404');
                    // }
                })
        },
    }
}
