export default {
    namespaced: true,

    state: {
        params: {
            search_text: null,
        },

        list: {
            data: {},
            current_page: 1,
            per_page: 20,
            from: null,
            last_page: null,
            to: null,
            total: null,
        },

        order_column: 'id',
        order_direction: 'asc',

        list_url: '/api/items',
    },

    mutations: {
        setCurrentPage(state, payload) {
            state.list.current_page = payload.current_page;
        },
        setListOrder(state, payload) {
            state.order_direction = payload.value;
        },
        setListOrderColumn(state, payload) {
            state.order_column = payload.value;
        },
        setList(state, payload) {
            state.list.data = payload.data;
            state.list.current_page = payload.current_page;
            state.list.from = payload.from;
            state.list.last_page = payload.last_page;
            state.list.to = payload.to;
            state.list.total = payload.total;
        },
        setListPerPage(state, payload) {
            state.list.per_page = payload.value;
        },
    },

    actions: {
        getList({commit, state, getters}) {
            axios.get(state.list_url, {
                params: {
                    page: state.list.current_page,
                    per_page: state.list.per_page,
                    order_column: state.order_column,
                    order_direction: state.order_direction,
                    search_text: state.params.search_text
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
        }
    }
}
