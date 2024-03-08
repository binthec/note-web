<template>
    <div class="form-group">
        <!-- メニューバー -->
        <customize-engi-sheet-menu
            :delete-items="deleteItems"
            :reset-delete-items="resetEvent"
            :add-item-event="showAddModal"
        ></customize-engi-sheet-menu>

        <!-- 画像選択するところ -->
        <div id="ground-wrapper" class="clearfix">


            <div id="print-area">
                <!-- タイトルが入る -->
                <div class="title-area">{{ engi.title }}</div>

                <!-- 追加された画像が入る所 -->
                <draggable tag="div"
                           class="row"
                           :list="engi.content_data"
                           :options="ddOptions"
                >
                    <div class="piece added" :class="additionalClass" v-for="(item, key) in engi.content_data"
                         :key="item.uuid">
                        <div class="inner clearfix" :class="innerClass">
                            <input type="checkbox" :id="'del_' + item.uuid" :value="item.uuid" v-model="deleteItems">
                            <span class="item-title">{{ item.title }}</span>
                            <div class="item-img">
                                <img :src="getFilePath(item.first_cate, item.uuid)" @error="noImage">
                            </div>
                        </div>
                    </div>
                </draggable>
            </div>
        </div>

        <!-- アイテム選択のモーダル -->
        <select-item-modal :get-file-path="getFilePath"></select-item-modal>
    </div>
</template>

<script>
import {FIRST_CATE_DIR_NAME, SAMPLE_IMG} from '../../../../const/item';

import SelectItemModal from "./SelectItemModal";
import {mapMutations, mapState} from "vuex";
import draggable from "vuedraggable";
import CustomizeEngiSheetMenu from "./CustomizeEngiSheetMenu";

export default {
    name: "CustomizeEngiSheet",

    data() {
        return {
            pieceH: 120,
            pieceW: 120,
            innerClassLabel: {
                1: 'height-1',
                2: 'height-2',
                3: 'height-3',
                4: 'height-4',
            },
            ddOptions: {
                animation: 300
            },
            deleteItems: [],
        }
    },

    components: {
        CustomizeEngiSheetMenu,
        SelectItemModal,
        draggable
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

        showAddModal: function () {
            this.updateSelectedItems({value: this.engi.content_data}); // TODO 参照渡し
            this.$modal.show('add-modal');
        },

        resetEvent() {
            this.deleteItems = [];
        },

        getFilePath(first_cate, uuid) {
            return '/assets/items/' + FIRST_CATE_DIR_NAME[first_cate] + '/' + uuid + '.svg';
        },

        noImage(e){
            e.target.src = SAMPLE_IMG;
        }


        /**
         * add button は動かさないので、開始イベントを抑止する
         * https://zenn.dev/tomosuke/articles/24e492873a7b37
         *
         * @param event
         */
        // pointerdown(event) {
        //     event.stopImmediatePropagation();
        // }
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
                background-color: #ffffff;
                position: relative;

                input[type="checkbox"] {
                    transform: scale(1.5);
                    position: absolute;
                    top: 12px;
                    right: 12px;
                    z-index: 999;
                }

                .item-img {
                    position: absolute;
                    display: flex;
                    width: 100%;
                    height: 100%;
                    padding: 40px 5px 5px 5px;

                    img {
                        margin: auto;
                        width: 100%;
                        height: 100%;
                    }
                }

                &.height-1 { /* 1個のとき */
                    height: 200px;
                }

                &.height-2 { /* 2個のとき */
                    height: 195px;
                }

                &.height-3 { /* 3個のとき */
                    height: 240px;
                }

                &.height-4 { /* 4個のとき */
                    height: 177px;
                }

            }

            &.sortable-ghost {
                .inner {
                    @extend .inner;
                    background-color: #dccf8f;
                    opacity: .6;
                }
            }

            &.added {
                .item-title {
                    display: inline-block;
                    margin: 5px 35px 0 8px;
                    padding-right: 5px;
                    position: absolute;
                    z-index: 10;
                    background: rgba(255, 255, 255, 0.8);
                    font-weight: 700;
                }
            }
        }

        .title-area {
            border-bottom: solid 2px $gray-border;
            padding: 3px 10px;
            display: inline-block;
            margin-bottom: 20px;
            font-size: 18px;
            width: 50%;
        }

        /**
         * 出力用
         */
        #print-area.printing{
            .inner {
                border-color: #000;
            }

            .title-area {
                border-bottom: solid 2px #000;
            }

            input[type="checkbox"]{
                display: none;
            }
        }
    }
}
</style>
