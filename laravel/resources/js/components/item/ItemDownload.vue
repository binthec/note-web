<template>
    <default-layout>
        <list-header slot="page_header"
                     :header-icon="'nav-icon fas fa-file-download'"
                     :page-title="'アイテムダウンロード'"
        ></list-header>

        <download-search slot="search_area"></download-search>

        <download-body slot="card_body"></download-body>

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
import DownloadBody from "./download/DownloadBody";

// store
import {mapState, mapActions, mapMutations} from "vuex";
import DownloadSearch from "./download/DownloadSearch";

export default {
    name: "ItemDownload",

    components: {
        DownloadSearch,
        DownloadBody,
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
    }
}
</script>

<style scoped>

</style>
