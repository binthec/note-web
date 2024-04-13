export default {
    namespaced: true,

    state: {
        list: {
            data: {},
            current_page: 1,
            per_page: 20,
            from: null,
            last_page : null,
            to: null,
            total : null,
        },

        order_column: 'updated_at',
        order_direction: 'desc',

        list_url: '/api/engi',
        delete_url: '/api/engi/'
    },

    mutations: {
        setCurrentPage(state, payload) {
            state.list.current_page = payload.current_page;
        },

        setList(state, payload){
            state.list.data = payload.data;
            state.list.current_page = payload.current_page;
            state.list.from = payload.from;
            state.list.last_page = payload.last_page;
            state.list.to = payload.to;
            state.list.total = payload.total;
        }
    },

    actions: {
        getList({commit, state, getters}) {
            axios.get(state.list_url, {
                params: {
                    page: state.list.current_page,
                    per_page: state.list.per_page,
                    order_column: state.order_column,
                    order_direction: state.order_direction,
                }
            })
                .then(response => {
                    if (response.status === 200) {
                        commit('setList', response.data.list);
                    }
                })
                .catch(error => {
                    console.log(error);
                })
                .finally(() => {
                    //
                });
        },

        deleteEngi({dispatch, commit, state, getters}, {uuid}) {
            axios.delete(state.delete_url + uuid)
                .then(res => {
                    dispatch('getList');
                })
                .catch(err => {
                    console.log('エラーだね deleteEngi');
                    console.log(err);
                })
        }
    }
}
