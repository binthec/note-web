<template>
    <default-layout>

        <list-header slot="page_header"
                     :header_icon="'nav-icon fas fa-book'"
                     :page_title="'コンテンツ一覧'"
                     :create_path="'/engi/create'"
        ></list-header>

        <template v-slot:card_body>
            <div class="card-body">
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
                            <a href="javascript: void(0);" @click="editContent(row)"><i class="fas fa-edit text-lg mr-3 text-olive"></i></a>
                            <a href="javascript: void(0);" @click="deleteContent(row)"><i class="fas fa-trash-alt text-lg text-danger"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </template>

        <template v-slot:card_footer>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </template>
    </default-layout>
</template>

<script>

import DefaultLayout from "../common/layout/DefaultFormLayout";
import ListHeader from "../common/parts/ListHeader";
import {mapState, mapActions} from "vuex";

export default {
    name: "EngiList",

    components: {
        DefaultLayout,
        ListHeader,
    },

    computed: {
        ...mapState('list_engi', [
            'list',
        ])
    },

    async mounted() {
        await this.getList();
    },

    methods: {
        ...mapActions('list_engi', [
            'getList'
        ]),

        editContent(row){
            window.location.replace('/engi/' + row.uuid + '/edit');
        },

        deleteContent(row){
            console.log('delete');
            console.log(row);
        },
    }
}
</script>

<style scoped>

</style>
