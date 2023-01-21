<template>
    <div id="menu-bar" class="clearfix">
        <button
            id="delete-btn"
            type="button"
            class="btn btn-danger"
            :disabled="deleteItems.length < 1"
            @click="deleteEvent"
        ><i class="far fa-trash-alt"></i> 選択した項目を削除
        </button>

        <button
            id="preview-btn"
            type="button"
            class="btn btn-warning"
            @click="previewEvent"
        ><i class="far fa-file-pdf"></i> プレビュー
        </button>

        <button
            id="add-btn"
            type="button"
            class="btn btn-warning"
            :disabled="isDisabledAddItems"
            @click="addItemEvent"
        ><i class="fas fa-sitemap"></i> アイテム追加
        </button>
    </div>
</template>

<script>
import {mapState} from "vuex";
import {ONE_SHEET_MAX_CNT} from '../../../../const/item.js';

export default {
    name: "CustomizeEngiSheetMenu",

    props: {
        deleteItems: {
            default: []
        },
        resetDeleteItems : {
            default: () => {}
        },
        addItemEvent : {
            default: () => {}
        }
    },

    computed: {
        ...mapState('engi/edit', [
            'engi'
        ]),

        /**
         * 1シート内の最大アイテム数を超えてる場合はアイテム追加ボタンを非活性に
         *
         * @returns {boolean}
         */
        isDisabledAddItems() {
            return this.engi.content_data.length >= ONE_SHEET_MAX_CNT[this.engi.item_num];
        }
    },

    methods: {
        previewEvent() {
            console.log('プレビューボタンが押されたよ');
        },

        deleteEvent() {
            this.deleteItems.forEach((uuid) => {
                let index = this.engi.content_data.findIndex((item) => {
                    return item.uuid === uuid
                });
                // 削除予定アイテムが含まれる場合に、アイテムを削除する
                if (index !== -1) this.engi.content_data.splice(index, 1);
            });


            // 親の削除予定のアイテム配列をリセットする
            this.resetDeleteItems();
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../../../../../sass/variables";

#menu-bar {
    margin: 10px 0;
    width: $content-min-width;
}

#preview-btn, #add-btn {
    float: right;
}

#preview-btn {
    margin-left: 10px;
}

#delete-btn {
    float: left;
}
</style>
