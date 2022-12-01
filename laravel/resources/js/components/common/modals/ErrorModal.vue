<template>
    <modal name="error-modal" :clickToClose="click_to_close">
        <div class="alert alert-error">保存しました</div>

    </modal>
</template>

<script>
export default {
    name: "ErrorModal",
    props: {
        click_to_close: {
            default: false,
        }
    }
}
</script>

<style scoped>

</style>
