<template>
    <div id="menu-bar">
        <button
            type="button"
            class="btn btn-danger"
            @click="deleteEvent"
            :disabled="deleteItems.length < 1"
        >選択した項目を削除</button>

        <button
            id="preview-btn"
            type="button"
            class="btn btn-warning"
            @click="previewEvent"
        >プレビュー</button>
    </div>
</template>

<script>
import {mapState} from "vuex";

export default {
    name: "CustomizeEngiSheetMenu",

    props: {
        deleteItems : {
            default : []
        },
        resetDeleteItems : {
            default: () => {}
        }
    },

    computed: {
        ...mapState('engi/edit',[
            'engi'
        ]),

    },

    methods: {
        previewEvent(){
            console.log('プレビューボタンが押されたよ');
        },

        deleteEvent(){
            this.deleteItems.forEach(index => {
                this.engi.content_data.splice(index, 1);
            });
            // 親の削除予定のアイテム配列をリセットする
            this.resetDeleteItems();
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../../../../../sass/variables";

#menu-bar {
    margin: 10px 0;
    width: $content-min-width;
    text-align: right;
}

#preview-btn{
    margin-left: 10px;
}
</style>
