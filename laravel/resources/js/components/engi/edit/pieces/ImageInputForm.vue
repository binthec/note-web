<template>
    <div class="form-group">

        <!-- 画像選択するところ -->
        <div id="ground-wrapper" class="clearfix">
            <!-- 追加された画像が入る所 -->
            <div id="added"></div>

            <!-- 追加ボタン -->
            <div class="piece add-btn text-center" @click="showAddModal">
                <i class="fas fa-plus text-xl"></i>
            </div>
        </div>

        <modal name="add-modal"
               :draggable="true"
        >
            <div class="modal-header">
                <h4>追加したい画像を選択してください</h4>
            </div>
            <div class="modal-body">
                <p>you're reading this text in a modal!</p>
                <button class="btn btn-dark" @click="hideAddModal">閉じる</button>
            </div>
        </modal>

    </div>
</template>

<script>
export default {
    name: "ImageInputForm",

    mounted() {
        // this.addPiece();
    },

    methods: {
        addPiece() {
            const piece = document.createElement('div');
            piece.className = "piece";
            document.getElementById('added').prepend(piece);
        },

        showAddModal : function() {
            this.$modal.show('add-modal');
        },

        hideAddModal : function () {
            this.$modal.hide('add-modal');
        },
    }
}
</script>

<style lang="scss" scoped>
@import "../../../../../sass/variables";

#ground-wrapper {
    border: solid 2px $gray-border;
    width: 100%;
    padding: 10px;

    ::v-deep {
        .piece {
            float: left;
            min-width: 120px;
            width: auto;
            height: 120px;
            border: solid 2px $gray-border;
            border-radius: 15px;
            margin-bottom: 10px;

            &:nth-child(n+2) {
                margin-left: 10px;
            }

            &.add-btn {
                display: table;

                i {
                    display: table-cell;
                    vertical-align: middle;
                }

                &:hover {
                    background-color: $blue;
                }
            }
        }
    }
}
</style>
