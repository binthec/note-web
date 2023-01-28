<template>
    <select-category-form
        :category-name="'中分類'"
        :categories="second_categories"
        :bind-value="second_category"
        @update:bindValue="changeSecondCategory"
        :category-input-id="'second-cate-select'"
    ></select-category-form>
</template>

<script>
import SelectCategoryForm from "../../../common/item/SelectCategoryForm";
import {mapActions, mapMutations, mapState} from "vuex";

export default {
    name: "SelectSecondCategoryForm",

    components: {
        SelectCategoryForm
    },

    computed: {
        ...mapState('item/category', [
            'second_categories',
            'second_category'
        ]),
    },

    methods: {
        ...mapMutations('item/category', [
            'setSecondCategory'
        ]),
        ...mapActions('item/category', [
            'getThirdCategories',
            'getItems'
        ]),

        async changeSecondCategory(value) {
            this.setSecondCategory({value: value});
            await this.getThirdCategories();
            await this.getItems();
            this.$emit('change-item-elm-style');
        },
    }
}
</script>

<style scoped>

</style>
