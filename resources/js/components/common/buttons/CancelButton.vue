<template>
    <a href="javascript:void(0);" class="btn btn-dark" :class="additionalClass" @click="clickEvent">{{ btnName }}</a>
</template>

<script>
export default {
    name: "CancelButton",

    props: {
        btnName: {
            default: 'キャンセル'
        },
        cancelEvent: {
            default: () => {}
        },
        additionalClass: {
            default: ''
        }
    },

    methods: {
        clickEvent(e) {
            this.cancelEvent(e);
        },
    }
}
</script>

<style scoped>

</style>
