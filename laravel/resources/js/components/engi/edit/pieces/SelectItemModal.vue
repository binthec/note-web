<template>
    <modal name="add-modal"
           :width="modalWidth"
           :height="modalHeight"
           :reset="true"
    >
        <div class="modal-header bg-info">
            <h4>追加したいアイテムの選択</h4>
        </div>
        <div class="modal-body">
            <select-second-category-form></select-second-category-form>
            <select-third-category-form></select-third-category-form>

            <hr>

            <div class="select-area">

                <div class="row" v-if="items">
                    <div class="item-box col-3" v-for="item in items">
                        <label :for="'item-' + item.note_order">
                            <div class="item">
                                <input
                                    type="checkbox"
                                    :id="'item-' + item.note_order"
                                    :value="item.uuid"
                                    @change="updateCheckedItem(item.uuid)"
                                >
                                <!--<img :src="'/storage/items' + item.file_path">-->
                                {{ item.title }}
                            </div>
                        </label>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer clearfix">
            <button type="button" class="btn btn-dark" @click="hideAddModal">閉じる</button>
            <button type="button" class="btn btn-primary" @click="addItems">追加する</button>
        </div>
    </modal>
</template>

<script>
// vuex
import {mapState, mapMutations, mapActions} from "vuex";
import SelectSecondCategoryForm from "./SelectSecondCategoryForm";
import SelectThirdCategoryForm from "./SelectThirdCategoryForm";

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

    mounted() {
        window.addEventListener('resize', this.handleResize);
    },

    computed: {
        ...mapState('item/category', [
            'errors',
            'items',
            'selected_items'
        ]),
    },

    methods: {
        ...mapMutations('item/category', [
            'updateSelectedItems',
            'resetSelectedItems'
        ]),

        ...mapMutations('engi/edit',[
            'addItemsToContentData',
        ]),

        handleResize() {
            this.modalWidth = window.innerWidth * 0.9;
            this.modalHeight = window.innerHeight * 0.9;
        },

        hideAddModal: function () {
            this.$modal.hide('add-modal');
        },

        updateCheckedItem(itemUuid) {
            let uuids = _.toArray(this.selected_items);

            if (uuids.indexOf(itemUuid) === -1) {
                uuids.push(itemUuid);
            } else {
                uuids.splice(uuids.indexOf(itemUuid), 1);
            }

            this.updateSelectedItems({value: uuids});
        },

        addItems() {
            console.log('追加するよ！');
            this.addItemsToContentData({value: this.selected_items});

            this.hideAddModal();
            this.resetSelectedItems();
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
        border: 4px solid $bg-info;
        border-radius: 10px;
    }

    .item {
        padding: 5px;

        input[type="checkbox"] {
            transform: scale(1.5);
            margin: 0 3px;
        }
    }
}

.modal-footer {
    display: block;

    button:nth-child(2) {
        float: right;
    }
}

</style>
