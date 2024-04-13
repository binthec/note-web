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
        get_category_labels: '/api/items/getCategoryLabels',

        // 各カテゴリ名のラベル
        first_cate_labels: [],
        second_cate_labels: [],
        third_cate_labels: [],

        // アイテムの中身
        first_categories: [],
        second_categories: [],
        third_categories: [],
        items: [],

        selected_items: [],
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
        },
        updateSelectedItems(state, payload) {
            state.selected_items = payload.value;
        },
        resetSelectedItems(state, payload) {
            state.selected_items = [];
        },
        setCategoryLabels(state, payload){
            state.first_cate_labels  = payload.first_cate_labels;
            state.second_cate_labels = payload.second_cate_labels;
            state.third_cate_labels  = payload.third_cate_labels;
        }
    },

    actions: {
        /**
         * デフォルト表示の際にカテゴリを取ってくる
         *
         * @param dispatch
         * @param commit
         * @param state
         * @param getters
         * @returns {Promise<void>}
         */
        async initCategories({dispatch, commit, state, getters}) {
            if (state.first_category != null) {
                await dispatch('getSecondCategories');
                await dispatch('getThirdCategories');
                dispatch('getItems');
            }
        },

        /**
         * 大分類を取得
         *
         * @param commit
         * @param state
         * @param getters
         */
        async getFirstCategories({commit, state, getters}) {
            await axios.get(state.get_first_cate_url)
                .then(response => {
                    state.first_categories = response.data.first_categories;
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
        async getSecondCategories({commit, state, getters}) {
            await axios.get(state.get_second_cate_url + '/' + state.first_category)
                .then(response => {
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
        async getThirdCategories({commit, state, getters}) {
            await axios.get(state.get_third_cate_url + '/' + state.second_category)
                .then(response => {
                    state.third_categories = response.data.third_categories;
                    state.third_category = (state.third_categories === null) ? null : Object.entries(state.third_categories)[0][0];
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
        async getItems({commit, state, getters}) {
            let cate_name = '';
            let cate_id = null;
            if (state.third_categories == null) {
                cate_name = 'second_cate';
                cate_id = state.second_category;
            } else {
                cate_name = 'third_cate';
                cate_id = state.third_category;
            }
            await axios.get(state.get_items_url + '/' + cate_name + '/' + cate_id)
                .then(response => {
                    state.items = response.data.items;

                    // console.log('items の中身');
                    // console.log(state.items);
                })
                .catch(error => {
                    console.log(error);
                    // if (error.response.status === 404) {
                    //     window.location.replace('/404');
                    // }
                })
        },

        async getCategoryLabels({commit, state}){
            await axios.get(state.get_category_labels)
                .then(response => {
                    commit('setCategoryLabels', response.data);
                })
                .catch(error => {
                    console.log(error);
                    // if (error.response.status === 404) {
                    //     window.location.replace('/404');
                    // }
                })
        }
    }
}
