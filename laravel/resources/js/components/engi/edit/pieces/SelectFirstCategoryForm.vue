<template>
    <select-category-form
        :category-name="'手具or徒手？'"
        :categories="first_categories"
        :error-message="errorMessage"
        :bind-value="first_category"
        @update:bindValue="changeFirstCategory"
        :is-disabled="!is_editor_mode"
    ></select-category-form>
</template>

<script>
import SelectCategoryForm from "../../../common/item/SelectCategoryForm";
import {mapActions, mapMutations, mapState} from "vuex";

export default {
    name: "SelectFirstCategoryForm",

    components: {
        SelectCategoryForm
    },

    created() {
        //
    },

    watch: {
        first_category(new_value, old_value) {
            this.setEngiFirstCategory({value: new_value});
            this.getSecondCategories();
        },
    },

    computed: {
        ...mapState('item/category', [
            'first_categories',
            'first_category'
        ]),
        ...mapState('engi/edit', [
            'engi',
            'is_editor_mode'
        ]),

        errorMessage() {
            // if (this.errors['first_category'] == null) return null;
            // else return this.errors['first_category'][0];

            return null;
        },
    },

    methods: {
        ...mapMutations('engi/edit', [
            'setEngiFirstCategory'
        ]),
        ...mapMutations('item/category', [
            'setFirstCategory',
        ]),
        ...mapActions('engi/edit', [

        ]),
        ...mapActions('item/category', [
            'getFirstCategories',
            'getSecondCategories'
        ]),

        changeFirstCategory(value) {
            console.log('changeFirstCategory の中!');
            console.log(value);
            this.setEngiFirstCategory({value: value});
            this.setFirstCategory({value: value});
        },
    }
}
</script>

<style scoped>

</style>
