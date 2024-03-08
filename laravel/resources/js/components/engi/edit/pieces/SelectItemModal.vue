<template>
    <modal name="add-modal"
           :width="modalWidth"
           :height="'auto'"
           :reset="true"
           :scrollable="true"
           @opened="changeItemElmStyle"
    >
        <div class="modal-header bg-info">
            <h4>追加したいアイテムの選択</h4>
        </div>
        <div class="modal-body">
            <select-second-category-form @change-item-elm-style="changeItemElmStyle"></select-second-category-form>
            <select-third-category-form @change-item-elm-style="changeItemElmStyle"></select-third-category-form>

            <hr>

            <div class="select-area">

                <div class="row" v-if="items.length > 0">
                    <div class="item-box col-3" v-for="(item, key) in items">
                        <label :for="'item_' + item.uuid" :class="{ checked: isChecked(item.uuid) }"
                               :id="'label_' + item.uuid">
                            <span class="cover" :id="'cover_' + item.uuid"></span>
                            <input type="checkbox"
                                   :id="'item_' + item.uuid"
                                   :value="key"
                                   :checked="isChecked(item.uuid)"
                                   @change="updateCheckedItem(key)"
                            >
                            <span class="item-title">{{ item.title }}</span>
                            <div class="item-img">
                                <img :src="getFilePath(item.first_cate, item.uuid)" @error="noImage">
                            </div>
                        </label>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer clearfix">
            <button type="button" class="btn btn-dark" @click="hideAddModal">追加する</button>
        </div>
    </modal>
</template>

<script>
// vuex
import {mapState, mapMutations, mapActions} from "vuex";

// component
import SelectSecondCategoryForm from "./SelectSecondCategoryForm";
import SelectThirdCategoryForm from "./SelectThirdCategoryForm";

// const
import {ONE_SHEET_MAX_CNT, SAMPLE_IMG} from "../../../../const/item";

export default {
    name: "SelectItemModal",

    components: {
        SelectThirdCategoryForm,
        SelectSecondCategoryForm
    },

    data() {
        return {
            modalWidth: window.innerWidth * 0.9,
            modalHeight: window.innerHeight * 0.9,
        }
    },

    props: {
        getFilePath: {
            default: () => {
            }
        }
    },

    mounted() {
        window.addEventListener('resize', this.handleResize);
    },

    computed: {
        ...mapState('item/category', [
            'errors',
            'items',
            'selected_items'
        ]),

        ...mapState('engi/edit', [
            'engi'
        ]),

        isChecked() {
            return (uuid) => {
                // この uuid を持ったアイテムが既に選択されているかどうか判断して返す
                return this.selected_items.some((item) => {
                    return item.uuid === uuid;
                });
            }
        },

        isCapacityFull() {
            return this.selected_items.length >= ONE_SHEET_MAX_CNT[this.engi.item_num];
        }
    },

    methods: {
        ...mapMutations('item/category', [
            'updateSelectedItems',
            'resetSelectedItems'
        ]),

        ...mapMutations('engi/edit', [
            'addItemsToContentData',
        ]),

        handleResize() {
            this.modalWidth = window.innerWidth * 0.9;
            this.modalHeight = window.innerHeight * 0.9;
        },

        hideAddModal: function () {
            this.$modal.hide('add-modal');
        },

        /**
         * チェックボックスに変更があった場合の処理
         *
         * @param key
         */
        updateCheckedItem(key) {
            let uuid = this.items[key]['uuid']; // uuid を取得
            // 既に選択済みかどうか判定
            let itemIndex = this.selected_items.findIndex(item => {
                return item.uuid === uuid;
            });

            if (itemIndex === -1) { // チェックを入れた場合
                // 配列に追加
                this.selected_items.push(this.items[key]);
            } else { // チェックを外した場合
                // 配列から削除
                this.selected_items.splice(itemIndex, 1);
            }

            // 選択可能数の上限を超えるかを見て、アイテムboxのスタイルを変更する
            this.changeItemElmStyle();
        },

        changeItemElmStyle() {
            if (this.isCapacityFull) { // もうこれ以上選択できないとき
                this.items.forEach((item, index) => {
                    let selected = this.selected_items.some(selected_item => {
                        return selected_item.uuid === item.uuid;
                    });
                    let cover = document.getElementById('cover_' + item.uuid);
                    let itemElm = document.getElementById('item_' + item.uuid);
                    if (selected) {
                        // 選択されてるものは、引き続き変更できるようにする
                        cover.style.display = 'none';
                        itemElm.disabled = false;
                    }else{
                        // 選択されてないものは、選択できないように style を変更する
                        cover.style.display = 'block';
                        itemElm.disabled = true;
                    }
                });
            } else {
                // まだ選択できるときは、全てのアイテムボックスを選択可能に変更
                document.querySelectorAll(".item-box").forEach(box => {
                    box.querySelector('.cover').style.display = 'none';
                    box.querySelector('input').disabled = false;
                });
            }
        },

        noImage(e){
            e.target.src = SAMPLE_IMG;
        }
    }

}
</script>

<style lang="scss" scoped>
@import "../../../../../sass/variables";

.select-area {
    width: 100%;
}

.item-box {
    label {
        display: inline-block;
        width: 100%;
        min-height: 100px;
        height: 200px;
        border: solid 2px $gray-border;
        border-radius: 10px;
        position: relative;

        input[type="checkbox"] {
            transform: scale(1.5);
            position: absolute;
            top: 12px;
            right: 12px;
            z-index: 100;
        }

        .item-img {
            position: absolute;
            display: flex;
            width: 100%;
            height: 100%;
            padding: 30px 5px 5px 5px;

            img {
                z-index: 1;
                margin: auto;
                width: 100%;
                height: 100%;
            }
        }

        .item-title {
            display: inline-block;
            margin: 5px 35px 0 8px;
            padding-right: 5px;
            position: absolute;
            z-index: 10;
            background: rgba(255, 255, 255, 0.8);
        }

        &.checked {
            border: 2px solid $bg-info;
        }
    }

    .cover {
        width: 100%;
        height: 100%;
        background-color: #ccc;
        opacity: 0.6;
        position: absolute;
        z-index: 200;
        border-radius: 10px;
        display: none;
    }
}

</style>
