<template>
    <a href="javascript:void(0);" class="btn btn-primary" :class="additionalClass" @click="clickEvent">{{ btnName }}</a>
</template>

<script>
export default {
    name: "SaveButton",

    props: {
        btnName: {
            default: '登録'
        },
        saveEvent: {
            default: () => {}
        },
        additionalClass: {
            default: ''
        }
    },

    methods: {
        clickEvent(e) {
            this.saveEvent(e);
        },
    }
}
</script>

<style scoped>

</style>
