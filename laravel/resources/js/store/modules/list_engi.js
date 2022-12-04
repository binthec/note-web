export default {
    namespaced: true,

    state: {
        list: {
            'current_page': 1,
            'per_page': 20,
            'order': 'desc',
            'order_column': 'update_date',
            'last_page' : null,
            'total' : null,
        },

        list_url: '/api/engi',
    },

    mutations: {
        setCurrentPage(state, payload) {
            state.list.current_page = payload.current_page;
        }
    },

    actions: {
        getList({commit, state, getters}) {
            axios.get(state.list_url, {
                params: {
                    page: state.list.current_page,
                    per_page: state.list.per_page,
                    order: state.list.order,
                    order_column: state.list.order_column
                }
                })
                .then(response => {
                    if (response.status === 200) {
                        state.list = response.data.list;
                    }
                })
                .catch(error => {
                    console.log(error);
                })
                .finally(() => {
                    //
                });
        }
    }
}
