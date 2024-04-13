<template>
    <modal name="delete-modal">
        <div class="wrapper">
            <div class="modal-header bg-info">
                <h4>削除の確認</h4>
            </div>
            <div class="modal-body">
                削除するコンテンツ：<br>
                <div class="title">{{ deleteTitle }}</div>
                この操作は戻せません。削除してよろしいですか。
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" @click="hideModal">キャンセル</button>
                <button type="button" class="btn btn-danger" @click="deleteEvent">削除実行</button>
            </div>
        </div>
    </modal>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "DeleteModal",

    props: {
        deleteFunc: {
            default: () => {}
        },
        deleteItemUuid: {
            default: null
        },
        deleteTitle: {
            default: null
        },
    },

    methods: {
        hideModal: function () {
            this.$modal.hide('delete-modal');
        },

        deleteEvent() {
            this.deleteFunc({uuid: this.deleteItemUuid});
            this.hideModal();
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../../../../sass/variables";

.wrapper{
    height: 100%;
    display: flex;
    flex-direction: column;

    .modal-body{
        flex: 1;

        .title{
            font-weight: bold;
            padding: 15px 10px;
            margin: 10px 0;
            background-color: $warning-bg-yellow;
        }
    }

    .modal-footer{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
}
</style>
