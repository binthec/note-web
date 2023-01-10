export default {
    namespaced: true,

    state: {
        first_category: null,
        second_category: null,
        third_category: null,

        errors: {},

        get_first_cate_url: '/api/items/getFirstCategories',
        get_second_cate_url: '/api/items/getSecondCategories',
        get_third_cate_url: '/api/items/getThirdCategories',
        get_items_url: '/api/items/getItems',

        first_categories: [],
        second_categories: [],
        third_categories: [],
        items: [],
    },

    getters: {
        //
    },

    mutations: {
        setFirstCategory(state, payload) {
            state.first_category = payload.value;
        },
        setSecondCategory(state, payload) {
            state.second_category = payload.value;
        },
        setThirdCategory(state, payload) {
            state.third_category = payload.value;
        }
    },

    actions: {
        /**
         * 大分類を取得
         *
         * @param commit
         * @param state
         * @param getters
         */
        getFirstCategories({commit, state, getters}) {
            axios.get(state.get_first_cate_url)
                .then(response => {
                    console.log('response ↓');
                    console.log(response);
                    state.first_categories = response.data.first_categories;
                    state.first_category = Object.entries(state.first_categories)[0][0];
                    console.log(state.first_category);
                })
                .catch(error => {
                    console.log(error);
                    // if (error.response.status === 404) {
                    //     window.location.replace('/404');
                    // }
                })
        },

        /**
         * 中分類を取得
         *
         * @param commit
         * @param state
         * @param getters
         */
        getSecondCategories({commit, state, getters}) {
            axios.get(state.get_second_cate_url + '/' + state.first_category)
                .then(response => {
                    console.log(response);
                    state.second_categories = response.data.second_categories;
                    state.second_category = Object.entries(state.second_categories)[0][0];
                })
                .catch(error => {
                    console.log(error);
                    // if (error.response.status === 404) {
                    //     window.location.replace('/404');
                    // }
                })
        },

        /**
         * 小分類を取得
         *
         * @param commit
         * @param state
         * @param getters
         */
        getThirdCategories({commit, state, getters}) {
            axios.get(state.get_third_cate_url + '/' + state.second_category)
                .then(response => {
                    console.log(response);
                    state.third_categories = response.data.third_categories;
                })
                .catch(error => {
                    console.log(error);
                    // if (error.response.status === 404) {
                    //     window.location.replace('/404');
                    // }
                })
        },

        /**
         * items を取得
         *
         * @param commit
         * @param state
         * @param getters
         */
        getItems({commit, state, getters}) {
            let cate_name = '';
            let cate_id = null;
            if(state.third_categories == null){
                cate_name = 'second_cate';
                cate_id = state.second_category;
            }else{
                cate_name = 'third_cate';
                cate_id = state.third_category;
            }
            axios.get(state.get_items_url + '/' + cate_name + '/' + cate_id)
                .then(response => {
                    console.log(response.data.items);
                    state.items = response.data.items;
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
