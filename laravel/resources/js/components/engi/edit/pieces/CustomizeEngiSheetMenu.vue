<template>
    <div id="menu-bar" class="clearfix">
        <button
            id="delete-btn"
            type="button"
            class="btn btn-danger"
            @click="deleteEvent"
            :disabled="deleteItems.length < 1"
        ><i class="far fa-trash-alt"></i> 選択した項目を削除</button>

        <button
            id="preview-btn"
            type="button"
            class="btn btn-warning"
            @click="previewEvent"
        ><i class="far fa-file-pdf"></i> プレビュー</button>
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
}

#preview-btn{
    float: right;
}

#delete-btn{
    float: left;
}
</style>
