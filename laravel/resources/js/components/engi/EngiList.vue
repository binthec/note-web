<template>
    <default-layout>

        <list-header slot="page_header"
                     :header-icon="'nav-icon fas fa-book'"
                     :page-title="'コンテンツ一覧'"
                     :create-path="'/engi/create'"
        ></list-header>

        <template v-slot:card_body>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>更新日時</th>
                        <th style="width: 100px">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(row, index) in list.data">
                        <td>{{ row.title }}</td>
                        <td>{{ row.updated_at }}</td>
                        <td>
                            <a href="javascript: void(0);" @click="editEntity(row)"><i class="fas fa-edit text-lg mr-3 text-olive"></i></a>
                            <a href="javascript: void(0);" @click="deleteEntity(row)"><i class="fas fa-trash-alt text-lg text-danger"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </template>

        <Paginator slot="card_footer"
                   list="list"
                   set-current-page="setCurrentPage"
        ></Paginator>
    </default-layout>
</template>

<script>

import DefaultLayout from "../common/layout/DefaultFormLayout";
import ListHeader from "../common/parts/ListHeader";
import Paginator from "../common/parts/Paginator";

import {mapState, mapActions, mapMutations} from "vuex";

export default {
    name: "EngiList",

    components: {
        DefaultLayout,
        ListHeader,
        Paginator
    },

    computed: {
        ...mapState('engi/list', [
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

        ...mapActions('engi/list', [
            'getList'
        ]),

        editEntity(row){
            window.open('/engi/' + row.uuid + '/edit', '_self');
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
