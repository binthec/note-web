import {update} from "lodash/object";

export default {
    namespaced: true,

    state: {
        uuid: null,
        engi: {
            title: 'タイトルを入れてください',
            item_num: 4,
            first_cate: null,
            content_data: []
        },
        errors: {},

        list_url: '/engi',
        show_url: '/api/engi/',
        create_url: '/api/engi',

        show_success_modal: false,
        show_error_modal: false,

        // 基本情報部分のモード。true でテキストボックスを表示
        is_editor_mode: true,

        // vue で form.submit する際に必要になるので取っておく
        csrf_token : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
            state.engi.title = payload.value;
        },
        setItemNum(state, payload) {
            state.engi.item_num = payload.value;
        },
        setEngiFirstCategory(state, payload) {
            state.engi.first_cate = payload.value;
        },
        showSuccessModal(state) {
            state.show_success_modal = true;
        },
        hideSuccessModal(state) {
            state.show_success_modal = false;
        },
        showErrorModal(state) {
            state.show_error_modal = true;
        },
        setEditorMode(state, payload){
            state.is_editor_mode = payload.value;
        },
        addItemsToContentData(state, payload){
            payload.value.forEach(function (val, key){
                state.engi.content_data.push(val);
            })
        }
    },

    actions: {
        async getEngi({commit, state, getters}) {
            await axios.get(state.show_url + state.uuid)
                .then(response => {
                    state.engi = response.data.engi;
                })
                .catch(error => {
                    if (error.response.status === 404) {
                        window.location.replace('/404');
                    }
                })
        },

        createEngi({commit, state, getters}, {onlyBasicInfo}) {
            state.errors = {};
            axios.post(state.create_url, getters.getFormData)
                .then(response => {
                    if (response.status === 201) {
                        commit('initUuid', {uuid: response.data.uuid});
                        commit('showSuccessModal');

                        // 基本情報のみ変更の場合は画面遷移しない
                        if(onlyBasicInfo){
                            setTimeout(() => {
                                commit('hideSuccessModal');
                            }, 1000)
                        }else{
                            setTimeout(() => {
                                window.location.replace(state.list_url);
                            }, 1000)
                        }
                    }
                })
                .catch(error => {
                    console.log(error);
                    // if (error.response.status === 422) {
                    //     state.errors = {...state.errors, ...error.response.data.errors}
                    // } else {
                    //     commit('showErrorModal');
                    //     setTimeout(() => {
                    //         window.location.reload();
                    //     }, 1000);
                    // }
                });
            // .finally(() => {
            //     //
            // })
            ;
        },

        updateEngi({commit, state, getters}, {onlyBasicInfo}) {
            state.errors = {};
            axios.post(state.show_url + state.uuid, getters.getFormData, {
                headers: {'X-HTTP-Method-Override': 'PUT'}
            })
                .then(response => {
                    if (response.status === 200) {
                        commit('showSuccessModal');
                        // 基本情報のみ変更の場合は画面遷移しない
                        if(onlyBasicInfo){
                            setTimeout(() => {
                                commit('hideSuccessModal');
                            }, 1000)
                        }else{
                            setTimeout(() => {
                                window.location.replace(state.list_url);
                            }, 1000)
                        }
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
