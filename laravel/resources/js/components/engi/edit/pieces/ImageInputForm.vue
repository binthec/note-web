<template>
    <div class="form-group">

        <!-- 画像選択するところ -->
        <div id="ground-wrapper" class="clearfix">

            <!-- タイトルが入る -->
            <div class="title-area">{{ engi.title }}</div>

            <!-- 追加された画像が入る所 -->
            <div id="piece added"></div>

            <!-- 追加ボタン -->
            <div class="piece add-btn text-center" @click="showAddModal" :style="computedPieceSize">
                <i class="fas fa-plus text-xl"></i>
            </div>
        </div>

        <select-item-modal></select-item-modal>
    </div>
</template>

<script>
import SelectItemModal from "./SelectItemModal";
import {mapState} from "vuex";

export default {
    name: "ImageInputForm",

    data() {
        return {
            pieceW: 100,
            pieceH:100,
        }
    },

    components: {
        SelectItemModal
    },

    mounted() {
        // this.addPiece();

        // ウィンドウをリサイズした時の処理
        window.addEventListener('resize', this.handleSize);

        this.$nextTick(() => {
            this.setPieceSize();
        });
    },

    computed: {
        ...mapState('engi/edit', [
            'engi'
        ]),

        computedPieceSize(){
            return {
                height: this.pieceH - 10 + 'px',
                width: this.pieceW - 10 + 'px',
            }
        },
    },

    methods: {
        handleSize(){
            this.setPieceSize();
        },

        setPieceSize() {
            this.pieceW = this.pieceH = 800 / 4;
        },

        addPiece() {
            const piece = document.createElement('div');
            piece.className = "piece";
            document.getElementById('added').prepend(piece);
        },

        showAddModal: function () {
            this.$modal.show('add-modal');
        },
    }
}
</script>

<style lang="scss" scoped>
@import "../../../../../sass/variables";

#ground-wrapper {
    border: solid 2px $gray-border;
    width: 800px;
    height: 1128px;
    padding: 20px;

    ::v-deep {
        .piece {
            float: left;
            min-width: 120px;
            //width: auto;
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

        .title-area{
            border-bottom: solid 2px $gray-border;
            padding: 3px 10px;
            display: inline-block;
            margin-bottom: 20px;
            font-size: 18px;
        }
    }
}
</style>
