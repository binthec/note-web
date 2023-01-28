<template>
    <div class="form-group row">
        <label :for="categoryInputId" class="col-sm-2 col-form-label">{{ categoryName }}</label>
        <div class="col-sm-10">
            <select class="form-control" v-model="bindValueComputed" :disabled="isDisabled" :id="categoryInputId">
                <option v-for="(option, key) in categories" :value="key">{{ option }}</option>
            </select>
            <div class="help-block text-danger" v-if="errorMessage">{{ errorMessage }}</div>
        </div>
    </div>
</template>

<script>
// Vuex Mapping
import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';

export default {
    name: "SelectCategoryForm",

    props: {
        bindValue: {
            default: null,
        },
        categoryName: {
            default: null,
        },
        categories: {
            default: [],
        },
        errorMessage: {
            default: null,
        },
        isDisabled: {
            default: false
        },
        categoryInputId: {
            default: 'category'
        }
    },

    computed: {
        ...mapState('item/category', [
            'errors',
        ]),

        bindValueComputed: {
            get() {
                return this.bindValue;
            },
            set(value) {
                this.$emit('update:bindValue', value);
            }
        }
    }
}
</script>

<style scoped>

</style>
