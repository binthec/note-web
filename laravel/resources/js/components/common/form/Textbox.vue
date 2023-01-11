<template>
    <div class="form-group row">
        <label :for="input_id" class="col-sm-2 col-form-label">{{ label_value }}</label>
        <div class="col-sm-10">
            <input
                class="form-control"
                :type="input_type"
                :class="additional_class"
                :id="input_id"
                :value="bind_value"
                :disabled="isDisabled"
                @change="setTitle"
            >
            <div class="help-block text-danger" v-if="error_message">{{ error_message }}</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Textbox",

    props: {
        label_value: {
            default: null,
        },
        input_id: {
            default: 'textbox-1',
        },
        additional_class: {
            default: ''
        },
        input_type: {
            default: 'text'
        },
        bind_value:{
            default: null,
        },
        setTitle: {
            default: () => {}
        },
        error_message: {
            default: null,
        },
        has_error: {
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
