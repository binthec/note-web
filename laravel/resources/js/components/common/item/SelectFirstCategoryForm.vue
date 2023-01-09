<template>
    <div class="form-group row">
        <label for="first_category" class="col-sm-2 col-form-label">大分類</label>
        <div class="col-sm-10">
            <select class="form-control" v-model="bindValueComputed">
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
    name: "SelectFirstCategoryForm",

    data() {
        return {
            bindValue: {
                default: 100,
            }
       }
    },

    created(){
        this.getFirstCategories();
    },

    computed: {
        ...mapState('item/category', [
            'errors',
            'first_categories',
        ]),

        error_message(){
            if(this.errors['first_category'] == null) return null;
            else return this.errors['first_category'][0];
        },

        bindValueComputed: {
            get(){
                return this.bindValue;
            },
            set(value){
                this.setFirstCategory({value: value});
                this.getSecondCategories();
            }
        }
    },

    methods: {
        ...mapActions('item/category', [
            'getFirstCategories',
            'getSecondCategories',
        ]),

        ...mapMutations('item/category',[
            'setFirstCategory'
        ]),
    }
}
</script>

<style scoped>

</style>
