<template>
    <select-category-form
        :category-name="'小分類'"
        :categories="third_categories"
        :bind-value="third_category"
        @update:bindValue="changeThirdCategory"
        :is-disabled="isDisabled"
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

    data() {
        return {
            isDisabled: true,
        }
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
    },

    watch: {
        third_category(new_val, old_val){
            console.log('third_category の変更を検知したよ');

            if(new_val === null){
                this.isDisabled = true;
            }else{
                this.isDisabled = false;
            }
        },
    },

    methods: {
        ...mapMutations('item/category', [
            'setThirdCategory'
        ]),
        ...mapActions('item/category', [
            'getThirdCategories',
            'getItems'
        ]),

        changeThirdCategory(value) {
            this.getItems();
        },
    }
}
</script>

<style scoped>

</style>
