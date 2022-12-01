import {update} from "lodash/object";

export default {
    namespaced: true,

    state: {
        uuid: null,
        engi : {
            title: null,
        },
        errors: {},

        engi_create_url: '/api/engi',

        show_success_modal: false,
        show_error_modal: false,
    },

    getters: {
        getFormData(state, getters, rootState, rootGetters){
            const update_data = new FormData();
            update_data.append('engi', JSON.stringify(state.engi));
            return update_data;
        }
    },

    mutations: {
        initUuid(state, payload){
            state.uuid = payload.uuid;
        },
        setTitle(state, payload){
            state.engi.title = payload.title;
        },
        showSuccessModal(state){
            state.show_success_modal = true;
        },
        showErrorModal(state){
            state.show_error_modal = true;
        }
    },

    actions: {
        createEngi({commit, state, getters}){
            axios.post(state.engi_create_url, getters.getFormData)
                .then(response => {
                    console.log(response);
                    if(response.status === 201){
                        commit('showSuccessModal');
                        window.location.replace('/engi');
                    }
                })
                .catch(error => {
                    if(error.response.status === 422){
                        state.errors = {...state.errors, ...error.response.date.errors}
                    }else{
                        console.log(error);

                        // commit('showErrorModal');
                        // setTimeout(() => {
                        //     window.location.reload();
                        // }, 1000);
                    }
                });
                // .finally(() => {
                //     //
                // })
            ;
        },
        updateEngi(){
            //
        },
    }
}
