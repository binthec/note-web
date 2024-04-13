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
        <delete-modal
            :delete-func="deleteEngi"
            :delete-item-uuid="deleteItemUuid"
            :deleteTitle="deleteTitle"
        ></delete-modal>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import DeleteModal from "../../common/modals/DeleteModal";

export default {
    name: "ListBody",

    data() {
        return {
            deleteItemUuid: null,
            deleteTitle: null,
        }
    },

    components: {DeleteModal},

    computed: {
        ...mapState('engi/list', [
            'list',
        ])
    },

    methods: {
        ...mapActions('engi/list', [
            'deleteEngi',
        ]),

        editEntity(row) {
            window.open('/engi/' + row.uuid + '/edit', '_self');
        },

        showDeleteModal(row) {
            this.$modal.show('delete-modal');
            this.deleteItemUuid = row.uuid;
            this.deleteTitle = row.title;
        },

    }
}
</script>

<style scoped>

</style>
