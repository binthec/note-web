<template>

    <div class="container-fluid">

        <page-title
            :header_icon="header_icon"
            :page_title="page_title"
        ></page-title>

        <div class="row mb-2">
            <div class="col-sm-12">
                <button class="btn btn-dark" @click="clickBackEvent">キャンセル</button>
                <button class="btn btn-primary" @click="clickSubmitEvent">登録</button>
            </div>
        </div>

    </div><!-- /.container-fluid -->

</template>

<script>
    import PageTitle from "./PageTitle";

    export default {
        name: "EditHeader",

        components: {
            PageTitle
        },

        props: [
            'header_icon',
            'page_title',
            'submit_func',
            'go_back_func',
        ],

        methods: {
            clickSubmitEvent(e) {
                this.submit_func(e);
            },
            clickBackEvent(e) {
                this.go_back_func(e);
            }
        }
    }
</script>

<style scoped>

</style>
