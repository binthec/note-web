<template>
    <select-category-form
        :category-name="'小分類'"
        :categories="third_categories"
        :bind-value="third_category"
        @update:bindValue="changeThirdCategory"
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

    computed: {
        ...mapState('item/category', [
            'third_categories',
            'third_category'
        ]),
    },

    methods: {
        ...mapMutations('item/category', [
            'setThirdCategory'
        ]),
        ...mapActions('item/category', [
            //
        ]),

        changeThirdCategory(value) {
            this.setSecondCategory({value: value});
            // 画像を取ってくる
        },
    }
}
</script>

<style scoped>

</style>
