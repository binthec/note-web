<template>
    <input
        type="text"
        class="form-control"
        :id="searchTextId"
        :class="searchTextClass"
        :maxlength="maxLength"
        :placeholder="placeholder"
        v-model="dataValue"
        @keypress="keyPressed"
    >
</template>

<script>
export default {
    name: "SearchText",

    props: {
        value: {
            type: String,
            default: null
        },
        searchTextId: {
            type: String,
            default: null
        },
        searchTextClass: {
            type: String,
            default: null
        },
        maxLength: {
            type: Number,
            default: 100
        },
        placeholder: {
            type: String,
            default: null
        }
    },

    computed: {
        dataValue: {
            get() {
                return this.value;
            },
            set(value) {
                this.$emit('input', value);
            }
        }
    },

    methods: {
        keyPressed(event) {
            console.log('event.keyCode だよ');
            console.log(event.keyCode);
            if(event.keyCode == 13){
                this.$emit('press-enter');
            }
        }
    }
}
</script>

<style scoped>

</style>
