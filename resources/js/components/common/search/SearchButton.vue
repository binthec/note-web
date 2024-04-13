<template>
    <button
        class="btn btn-primary btn-search"
        type="button"
        @click="click"
    ><i class="fa fa-search"></i> 検索</button>
</template>

<script>
export default {
    name: "SearchButton",

    methods: {
        click() {
            this.$emit('click');
        }
    }
}
</script>

<style scoped>

</style>
