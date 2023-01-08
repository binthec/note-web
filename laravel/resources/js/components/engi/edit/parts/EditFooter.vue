<template>
    <div class="card-footer clearfix">
        <a href="javascript:void(0);" class="btn btn-dark" @click="clickBackEvent">キャンセル</a>
        <a href="javascript:void(0);" class="btn btn-primary float-right" @click="clickSubmitEvent">登録</a>
    </div>
</template>

<script>
    export default {
        name: "EditFooter",

        props: [
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
