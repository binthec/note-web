<template>
    <default-layout>

        <list-header slot="page_header"
                     :header-icon="'nav-icon fas fa-file-download'"
                     :page-title="'アイテムダウンロード'"
        ></list-header>

        <template v-slot:card_body>
            <div class="card-body row">
                <div class="col-4" v-for="(item, index) in list.data">
                    <div class="piece">
                        <span class="item-title">{{ item.title }}</span>
                        <div class="item-img">
                            <img :src="getFilePath(item.first_cate, item.uuid)">
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <Paginator slot="card_footer"
                   :list="list"
                   :set-current-page="setCurrentPage"
        ></Paginator>
    </default-layout>
</template>

<script>
// component
import DefaultLayout from "../common/layout/DefaultLayout";
import ListHeader from "../common/parts/ListHeader";
import Paginator from "../common/parts/Paginator";

// store
import {mapState, mapActions, mapMutations} from "vuex";

// script
import {getImageSvgPath} from "../../script/item"

export default {
    name: "ItemDownload",

    components: {
        DefaultLayout,
        ListHeader,
        Paginator
    },

    computed: {
        ...mapState('item/download', [
            'list',
        ])
    },

    watch: {
        'list.current_page': function (val, oldVal) {
            this.getList();
        },
    },

    async mounted() {
        this.setListPerPage({value: 30});
        await this.getList();
    },

    methods: {
        ...mapMutations('item/download', [
            'setCurrentPage',
            'setListPerPage'
        ]),

        ...mapActions('item/download', [
            'getList',
        ]),

        getFilePath(first_cate, uuid) {
            return getImageSvgPath(first_cate, uuid);
        },
    }
}
</script>

<style lang="scss" scoped>
@import "../../../sass/variables";

.piece {
    border: solid 2px $gray-border;
    border-radius: 15px;
    margin-bottom: 10px;
    min-height: 180px;
    background-color: #ffffff;
    position: relative;

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
