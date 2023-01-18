<template>
    <div id="menu-bar">
        <button type="button" class="btn btn-danger" @click="deleteEvent">選択した項目を削除する</button>
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
        deleteEvent(){
            this.deleteItems.forEach(index => {
                this.engi.content_data.splice(index, 1);
            });
            this.resetDeleteItems;
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
</style>
