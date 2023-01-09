<template>
    <div class="form-group row">
        <label for="first_category" class="col-sm-2 col-form-label">中分類</label>
        <div class="col-sm-10">
            <select class="form-control" v-model="bindValueComputed">
                <option v-for="(option, key) in second_categories" :value="key">{{ option }}</option>
            </select>
            <div class="help-block text-danger" v-if="error_message">{{ error_message }}</div>
        </div>
    </div>
</template>

<script>
// Vuex Mapping
import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';

export default {
    name: "SelectSecondCategoryForm",

    data() {
        return {
            bindValue: {
                default: null,
            }
        }
    },

    computed: {
        ...mapState('item/category', [
            'errors',
            'second_categories',
        ]),

        error_message(){
            if(this.errors['second_categories'] == null) return null;
            else return this.errors['second_categories'][0];
        },

        bindValueComputed: {
            get(){
                return this.bindValue;
            },
            set(value){
                this.setSecondCategory({value: value});
                this.getThirdCategories();
            }
        }

    },

    methods: {
        ...mapActions('item/category', [
            'getThirdCategories',
        ]),

        ...mapMutations('item/category',[
            'setSecondCategory'
        ]),
    }
}
</script>

<style scoped>

</style>
