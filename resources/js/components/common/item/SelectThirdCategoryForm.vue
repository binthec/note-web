<template>
    <div class="form-group row">
        <label for="first_category" class="col-sm-2 col-form-label">小分類</label>
        <div class="col-sm-10">
            <select class="form-control" v-model="bindValueComputed">
                <option v-for="(option, key) in third_categories" :value="key">{{ option }}</option>
            </select>
            <div class="help-block text-danger" v-if="error_message">{{ error_message }}</div>
        </div>
    </div>
</template>

<script>
// Vuex Mapping
import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';

export default {
    name: "SelectThirdCategoryForm",

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
            'third_categories'
        ]),

        error_message(){
            if(this.errors['third_categories'] == null) return null;
            else return this.errors['third_categories'][0];
        },

        bindValueComputed: {
            get(){
                return this.bindValue;
            },
            set(value){
                this.setThirdCategory({value: value});
                this.getItems();
            }
        }

    },

    methods: {
        ...mapActions('item/category', [
            'getItems'
        ]),

        ...mapMutations('item/category', [
            'setThirdCategory'
        ])
    }
}
</script>

<style scoped>

</style>
