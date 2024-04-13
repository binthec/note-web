<template>
    <div class="form-group row">
        <label :for="inputId" class="col-sm-2 col-form-label">{{ labelName }}</label>
        <div class="col-sm-10">
            <input
                class="form-control"
                :type="inputType"
                :id="inputId"
                :class="additionalClass"
                :value="bindValue"
                :disabled="isDisabled"
                @change="setTitle"
            >
            <div class="help-block text-danger" v-if="errorMessage">{{ errorMessage }}</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Textbox",

    props: {
        labelName: {
            default: null,
        },
        inputId: {
            default: 'textbox-1',
        },
        additionalClass: {
            default: ''
        },
        inputType: {
            default: 'text'
        },
        bindValue:{
            default: null,
        },
        setTitle: {
            default: () => {}
        },
        errorMessage: {
            default: null,
        },
        hasError: {
            default: false,
        },
        isDisabled: {
            default: false
        }
    }
}
</script>

<style scoped>

</style>
