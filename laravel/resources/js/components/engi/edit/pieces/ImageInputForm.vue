<template>
    <div class="form-group">

        <!-- 画像選択するところ -->
        <div id="ground-wrapper" class="clearfix">

            <!-- タイトルが入る -->
            <div class="title-area">{{ engi.title }}</div>

            <!-- 追加された画像が入る所 -->
            <draggable tag="div" :list="engi.content_data" class="row" @start="onStart" @end="onEnd">
                <div class="piece added" :class="additionalClass" v-for="(item, key) in engi.content_data" :key="item.uuid">
                    <div class="inner" :class="innerClass">
                        <span class="item-title">{{ item.title }}</span>
                    </div>
                </div>

                <!-- 追加ボタン -->
                <div
                    id="add-btn"
                    class="piece add-btn"
                    :class="additionalClass"
                    :key="'add-btn-key'"
                    name="add-btn"
                >
                    <div class="inner text-center" :class="innerClass" @click="showAddModal">
                        <div class="icon-box">
                            <i class="fas fa-plus text-xl"></i>
                        </div>
                    </div>
                </div>
            </draggable>

        </div>

        <select-item-modal></select-item-modal>
    </div>
</template>

<script>
import SelectItemModal from "./SelectItemModal";
import {mapMutations, mapState} from "vuex";
import draggable from "vuedraggable";

export default {
    name: "ImageInputForm",

    data() {
        return {
            pieceH: 120,
            pieceW: 120,
            innerClassLabel: {
                1: 'height-200',
                2: 'height-200',
                3: 'height-240',
                4: 'height-177',
            }
        }
    },

    components: {
        SelectItemModal,
        draggable
    },

    mounted() {
        document.getElementById('add-btn').addEventListener('pointerdown', this.pointerdown);
    },

    destroyed() {
        document.getElementById('add-btn').removeEventListener('pointerdown', this.pointerdown);
    },

    computed: {
        ...mapState('engi/edit', [
            'engi'
        ]),

        ...mapState('item/category', [
            'selected_items'
        ]),

        pieceStyle() {
            let length = (800 / this.engi.item_num) - 20;
            return {
                width: length + 'px',
                height: length + 'px',
            }
        },

        additionalClass() {
            return this.engi.item_num ? 'col-' + (12 / this.engi.item_num) : 'col-3';
        },

        innerClass() {
            return this.innerClassLabel[this.engi.item_num];
        }
    },

    methods: {
        ...mapMutations('item/category', [
            'updateSelectedItems'
        ]),

        addPiece() {
            const piece = document.createElement('div');
            piece.className = "piece";
            document.getElementById('added').prepend(piece);
        },

        showAddModal: function () {
            this.updateSelectedItems({value: this.engi.content_data}); // TODO 参照渡し
            this.$modal.show('add-modal');
        },

        onStart(event) {
            document.getElementById('add-btn').style.display = "none";
        },

        onEnd(event) {
            document.getElementById('add-btn').style.display = "block";
        },

        /**
         * add button は動かさないので、開始イベントを抑止する
         * https://zenn.dev/tomosuke/articles/24e492873a7b37
         *
         * @param event
         */
        pointerdown(event) {
            event.stopImmediatePropagation();
        }
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
            .inner {
                border: solid 2px $gray-border;
                border-radius: 15px;
                margin-bottom: 10px;
                min-height: 120px;

                &.height-200 {
                    height: 200px;
                }

                &.height-240 {
                    height: 240px;
                }

                &.height-177 {
                    height: 177px;
                }
            }

            &.add-btn {
                .inner {
                    @extend .inner;

                    .icon-box {
                        position: absolute;
                        left: 50%;
                        top: 50%;

                        i {
                            transform: translate(-50%, -50%);
                        }
                    }

                    &:hover {
                        background-color: $bg-info;
                    }
                }
            }

            &.added {
                .item-title {
                    display: inline-block;
                    margin: 5px 0 0 8px;
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
