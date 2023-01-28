<template>
    <select-category-form
        :category-name="'小分類'"
        :categories="third_categories"
        :bind-value="third_category"
        @update:bindValue="changeThirdCategory"
        :is-disabled="isDisabled"
        :category-input-id="'third-cate-select'"
    ></select-category-form>
</template>

<script>
import SelectCategoryForm from "../../../common/item/SelectCategoryForm";
import {mapActions, mapMutations, mapState} from "vuex";

export default {
    name: "SelectThirdCategoryForm",

    components: {
        SelectCategoryForm
    },

    created() {
        this.getThirdCategories();
    },

    computed: {
        ...mapState('item/category', [
            'second_category',
            'third_categories',
            'third_category'
        ]),

        isDisabled(){
            return this.third_categories === null;
        }
    },

    methods: {
        ...mapMutations('item/category', [
            'setThirdCategory'
        ]),
        ...mapActions('item/category', [
            'getThirdCategories',
            'getItems'
        ]),

        async changeThirdCategory(value) {
            console.log('changeThirdCategory 入りました');
            this.setThirdCategory({value: value});
            await this.getItems();
            this.$emit('change-item-elm-style');
        },
    }
}
</script>

<style scoped>

</style>
