<template>
    <div class="card-body row">
        <div class="col-4" v-for="(item, index) in list.data" @click="showModal(item)">
            <div class="piece">
                <span class="item-title">{{ item.title }}</span>
                <div class="item-img">
                    <img :src="getFilePath(item.first_cate, item.uuid)">
                </div>
            </div>
        </div>
        <download-modal :item="clickedItem"></download-modal>
    </div>
</template>

<script>
import {getImageSvgPath} from "../../../script/item";
import {mapState} from "vuex";
import DownloadModal from "./DownloadModal";

export default {
    name: "DownloadBody",

    components: {DownloadModal},

    data() {
        return {
            clickedItem: {},
        }
    },

    computed: {
        ...mapState('item/download', [
            'list',
        ])
    },

    methods: {
        getFilePath(first_cate, uuid) {
            return getImageSvgPath(first_cate, uuid);
        },

        showModal(item) {
            console.log('clicked!');
            this.$modal.show('download-item-modal');
            this.clickedItem = item;
        },
    }
}
</script>

<style lang="scss" scoped>
@import "../../../../sass/variables";

.piece {
    border: solid 2px $gray-border;
    border-radius: 15px;
    margin-bottom: 10px;
    min-height: 180px;
    background-color: #ffffff;
    position: relative;

    &:hover{
        border: solid 2px $bg-info;
        cursor: pointer;
    }

    .item-title {
        display: inline-block;
        margin: 5px 35px 0 8px;
        padding-right: 5px;
        position: absolute;
        z-index: 10;
        background: rgba(255, 255, 255, 0.8);
        font-weight: 700;
    }

    .item-img {
        position: absolute;
        display: flex;
        width: 100%;
        height: 100%;
        padding: 40px 5px 5px 5px;

        img {
            margin: auto;
            width: 100%;
            height: 100%;
        }
    }
}
</style>
