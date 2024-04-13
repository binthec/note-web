const loading = {
    namespaced: true,

    state: {
        is_loading: true,
    },

    mutations : {
        start(state){
            state.is_loading = true;
        },

        end(state){
            state.is_loading = false;
        }
    },

    actions: {
        showLoadingAnimation(state) {
            state.commit("start");
        },

        hideLoadingAnimation(state){
            state.commit("end");
        }
    }
}

export default loading
