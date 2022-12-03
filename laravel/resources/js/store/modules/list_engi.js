export default {
    namespaced: true,

    state: {
        list: {
            'current_page' : 1,
            'per_page': 20,
            'sort_asc': 'desc',
            'sort_column': 'update_date',
        },

        list_url: '/api/engi',
    },

    actions: {
        getList({commit, state, getters}){
            axios.get(state.list_url)
                .then(response => {
                    if(response.status === 200){
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
