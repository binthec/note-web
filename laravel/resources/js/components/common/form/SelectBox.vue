<template>
    <div class="form-group row">
        <label :for="selectId" class="col-sm-2 col-form-label">{{ labelName }}</label>
        <div class="col-sm-10">
            <select
                :id="selectId"
                class="form-control"
                :class="additionalClass"
                :disabled="isDisabled"
                v-model="bindValueComputed"
            >
                <option v-for="(option, key) in options" :value="key">{{ option }}</option>
            </select>
            <div class="help-block text-danger" v-if="errorMessage">{{ errorMessage }}</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SelectBox",

    props: {
        bindValue: {
            default: null
        },
        selectId: {
            default: 'selectbox-1',
        },
        labelName: {
            default: null
        },
        isDisabled: {
            default: false
        },
        options: {
            default: []
        },
        errorMessage: {
            default: null
        },
        additionalClass: {
            default: ''
        }
    },

    computed: {
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
