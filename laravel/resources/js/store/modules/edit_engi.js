export default {
    namespace: true,

    state: {
        uuid: null,
        engi : {
            title: null,
        },
    },

    getters: {

    },

    mutations: {
        initUuid(state, payload){
            state.uuid = payload.uuid;
        }
    },

    actions: {

    }
}
