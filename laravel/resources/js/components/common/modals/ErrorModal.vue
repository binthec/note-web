<template>
    <modal name="error-modal" :clickToClose="click_to_close" :pivotY="0.3" :height="50">
        <div class="alert alert-danger">エラーが発生しました</div>
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
.alert{
    height: 100%;
    min-height: auto;
}
</style>
