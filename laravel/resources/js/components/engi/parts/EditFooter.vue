<template>
    <div class="card-footer clearfix">
        <button class="btn btn-dark" @click="clickSubmitEvent">キャンセル</button>
        <button class="btn btn-primary float-right" @click="clickBackEvent">登録</button>
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
