<template>
    <div class="form-group row">
        <label for="first_category" class="col-sm-2 col-form-label">大分類</label>
        <div class="col-sm-10">
            <select class="form-control">
                <option v-for="(option, key) in first_categories" :value="key">{{ option }}</option>
            </select>
            <div class="help-block text-danger" v-if="error_message">{{ error_message }}</div>
        </div>
    </div>
</template>

<script>
// Vuex Mapping
import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';

export default {
    name: "SelectCategoryForm",

    created(){
        this.getCategories();
    },

    computed: {
        ...mapState('item/edit', [
            'errors',
            'item',
            'first_categories',
        ]),

        error_message(){
            if(this.errors['item.first_category'] == null) return null;
            else return this.errors['item.first_category'][0];
        },
    },

    methods: {
        ...mapActions('item/edit', [
            'getCategories'
        ]),
    }
}
</script>

<style scoped>

</style>
