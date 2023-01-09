<template>
    <modal name="add-modal"
           :draggable="true"
           :width="'800px'"
           :height="'800px'"
    >
        <div class="modal-header">
            <h4>追加したい画像を選択してください</h4>
        </div>
        <div class="modal-body">
            <select-first-category-form></select-first-category-form>
            <select-second-category-form></select-second-category-form>
            <select-third-category-form></select-third-category-form>

            <hr>

            <div class="row" v-if="items">
                <div class="col-3" v-for="item in items">
                    <img :src="'/storage/items' + item.file_path">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-dark" @click="hideAddModal">閉じる</button>
        </div>
    </modal>
</template>

<script>
// vuex
import {mapState, mapMutations, mapActions} from "vuex";
import SelectFirstCategoryForm from "../../../common/item/SelectFirstCategoryForm";
import SelectSecondCategoryForm from "../../../common/item/SelectSecondCategoryForm";
import SelectThirdCategoryForm from "../../../common/item/SelectThirdCategoryForm";

export default {
    name: "SelectItemModal",

    components: {
        SelectThirdCategoryForm,
        SelectSecondCategoryForm,
        SelectFirstCategoryForm
    },

    computed: {
        ...mapState('item/category', [
            'items'
        ]),
        ...mapState('item/category',[
            'first_category',
            'second_category',
            'third_category',
        ]),

        selectedFirstCategory(){
            return this.first_category != null;
        }
    },

    methods: {
        hideAddModal : function () {
            this.$modal.hide('add-modal');
        },
    }

}
</script>

<style scoped>

</style>
