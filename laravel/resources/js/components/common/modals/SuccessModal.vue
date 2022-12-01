<template>
    <modal name="success-modal" :clickToClose="click_to_close">
        <div class="alert alert-success">保存しました</div>

    </modal>
</template>

<script>
export default {
    name: "SuccessModal",
    props: {
        click_to_close: {
            default: false,
        }
    }
}
</script>

<style scoped>

</style>
