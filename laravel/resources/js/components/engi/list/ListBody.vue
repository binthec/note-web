<template>
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
                    <a href="javascript: void(0);" @click="showDeleteModal(row)"><i class="fas fa-trash-alt text-lg text-danger"></i></a>
                </td>
            </tr>
            </tbody>
        </table>

        <!-- 削除確認モーダル -->
        <list-delete-modal :delete-item-uuid="deleteItemUuid"></list-delete-modal>
    </div>
</template>

<script>
import {mapState} from "vuex";
import ListDeleteModal from "./pieces/ListDeleteModal";

export default {
    name: "ListBody",

    data() {
        return {
            deleteItemUuid: null,
        }
    },

    components: {ListDeleteModal},
    computed: {
        ...mapState('engi/list', [
            'list',
        ])
    },

    methods: {
        editEntity(row) {
            window.open('/engi/' + row.uuid + '/edit', '_self');
        },

        showDeleteModal(row) {
            this.$modal.show('delete-modal');
            this.deleteItemUuid = row.uuid;
        },

    }
}
</script>

<style scoped>

</style>
