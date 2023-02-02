<template>
    <default-layout>

        <list-header slot="page_header"
                     :header-icon="'nav-icon fas fa-walking'"
                     :page-title="'アイテム一覧'"
        ></list-header>

        <template v-slot:card_body>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>uuid</th>
                        <th>徒手or手具</th>
                        <th>中分類</th>
                        <th>小分類</th>
                        <th>連番</th>
                        <th>タイトル</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(row, index) in list.data">
                        <td>{{ row.uuid }}</td>
                        <td>{{ row.first_cate }}</td>
                        <td>{{ row.second_cate }}</td>
                        <td>{{ row.third_cate }}</td>
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

import DefaultLayout from "../common/layout/DefaultFormLayout";
import ListHeader from "../common/parts/ListHeader";
import Paginator from "../common/parts/Paginator";

import {mapState, mapActions, mapMutations} from "vuex";

export default {
    name: "ItemList",

    components: {
        DefaultLayout,
        ListHeader,
        Paginator
    },

    computed: {
        ...mapState('item/list', [
            'list',
        ])
    },

    watch: {
        'list.current_page': function(val, oldVal){
            this.getList();
        },
    },

    async mounted() {
        await this.getList();
    },

    methods: {
        ...mapMutations('item/list', [
            'setCurrentPage'
        ]),

        ...mapActions('item/list', [
            'getList',
        ]),
    }
}
</script>

<style scoped>

</style>
