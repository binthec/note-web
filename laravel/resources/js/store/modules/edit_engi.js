export default {
    namespaced: true,

    state: {
        uuid: null,
        engi : {
            title: null,
        },
    },

    mutations: {
        initUuid(state, payload){
            state.uuid = payload.uuid;
        },
        setTitle(state, payload){
            state.engi.title = payload.title;
        }
    }
}
