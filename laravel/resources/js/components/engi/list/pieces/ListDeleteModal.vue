<template>
    <modal name="delete-modal">
        <div class="modal-header bg-info">
            <h4>削除の確認</h4>
        </div>
        <div class="modal-body">
            削除してよろしいですか。
        </div>
        <div class="modal-footer clearfix">
            <button type="button" class="btn btn-dark" @click="hideModal">キャンセル</button>
            <button type="button" class="btn btn-danger" @click="deleteEvent">削除実行</button>
        </div>
    </modal>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "ListDeleteModal",

    props: {
        deleteItemUuid : {
            default: null
        }
    },

    methods: {
        ...mapActions('engi/list', [
            'deleteEngi',
            'getList'
        ]),

        hideModal: function () {
            this.$modal.hide('delete-modal');
        },

        deleteEvent(){
            this.deleteEngi({uuid: this.deleteItemUuid});
            this.hideModal();
        }
    }
}
</script>

<style scoped>

</style>
