<template>
    <div class="form-group">

        <!-- 画像選択するところ -->
        <div id="ground-wrapper" class="clearfix">

            <!-- タイトルが入る -->
            <div class="title-area">{{ engi.title }}</div>

            <div class="row">
                <!-- 追加された画像が入る所 -->
                <div id="piece added"></div>

                <!-- 追加ボタン -->
                <div
                    id="add-btn"
                    class="piece add-btn text-center"
                    :style="pieceStyle"
                    @click="showAddModal">
                    <i class="fas fa-plus text-xl"></i>
                </div>
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
            pieceH: 120,
            pieceW: 120,
        }
    },

    components: {
        SelectItemModal
    },

    mounted() {
        // this.addPiece();
    },

    computed: {
        ...mapState('engi/edit', [
            'engi'
        ]),

        pieceStyle() {
            let length = (800 / this.engi.item_num) - 10;
            return {
                width: length + 'px',
                height: length + 'px',
            }
        }
    },

    methods: {
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
            //float: left;
            //min-width: 120px;
            //width: auto;
            min-height: 120px;
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
                    background-color: $bg-info;
                }
            }
        }

        .title-area {
            border-bottom: solid 2px $gray-border;
            padding: 3px 10px;
            display: inline-block;
            margin-bottom: 20px;
            font-size: 18px;
        }
    }
}
</style>
