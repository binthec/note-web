<template>
    <default-layout>

        <list-header slot="page_header"
                     :header-icon="'nav-icon fas fa-walking'"
                     :page-title="'アイテム一覧'"
        ></list-header>

        <item-search slot="search_area"
                     :get-list="getList"
                     :params="params"
        ></item-search>

        <template v-slot:card_body>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>uuid</th>
                        <th>徒手/手具</th>
                        <th>中分類</th>
                        <th>小分類</th>
                        <th>連番</th>
                        <th>タイトル</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(row, index) in list.data">
                        <td>{{ row.uuid }}</td>
                        <td>{{ first_cate_labels[row.first_cate] }}</td>
                        <td>{{ second_cate_labels[row.first_cate][row.second_cate] }}</td>
                        <td>{{ row.third_cate ? third_cate_labels[row.second_cate][row.third_cate] : '-' }}</td>
                        <td>{{ row.note_order }}</td>
                        <td>{{ row.title }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </template>

        <Paginator slot="card_footer"
                   :list="list"
                   :set-current-page="setCurrentPage"
        ></Paginator>
    </default-layout>
</template>

<script>
// store
import {mapState, mapActions, mapMutations} from "vuex";

// component
import DefaultLayout from "../common/layout/DefaultFormLayout";
import ListHeader from "../common/parts/ListHeader";
import Paginator from "../common/parts/Paginator";
import ItemSearch from "./parts/ItemSearch";

export default {
    name: "ItemList",

    components: {
        ItemSearch,
        DefaultLayout,
        ListHeader,
        Paginator
    },

    computed: {
        ...mapState('item/list', [
            'list',
            'params'
        ]),

        ...mapState('item/category', [
            'first_cate_labels',
            'second_cate_labels',
            'third_cate_labels'
        ])
    },

    watch: {
        'list.current_page': function(val, oldVal){
            this.getList();
        },
    },

    async mounted() {
        this.getCategoryLabels();
        await this.getList();
    },

    methods: {
        ...mapMutations('item/list', [
            'setCurrentPage'
        ]),

        ...mapActions('item/list', [
            'getList',
        ]),

        ...mapActions('item/category', [
           'getCategoryLabels'
        ]),
    }
}
</script>

<style scoped>

</style>
