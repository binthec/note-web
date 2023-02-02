<template>
    <default-layout>

        <list-header slot="page_header"
                     :header-icon="'nav-icon fas fa-file-download'"
                     :page-title="'アイテムダウンロード'"
        ></list-header>

        <template v-slot:card_body>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>uuid</th>
                        <th>タイトル</th>
                        <th>更新日時</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(row, index) in list.data">
                        <td>{{ row.uuid }}</td>
                        <td>{{ row.title }}</td>
                        <td>{{ row.updated_at }}</td>
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

        editEntity(row){
            window.open('/items/' + row.uuid + '/edit', '_self');
        },

        deleteEntity(row){
            console.log('delete');
            console.log(row);
        },
    }
}
</script>

<style scoped>

</style>
