<template>
    <default-layout>

        <list-header slot="page_header"
                     :header-icon="'nav-icon fas fa-book'"
                     :page-title="'コンテンツ一覧'"
                     :create-path="'/engi/create'"
        ></list-header>

        <list-body slot="card_body"></list-body>

        <Paginator slot="card_footer"
                   :list="list"
                   :set-current-page="setCurrentPage"
        ></Paginator>
    </default-layout>
</template>

<script>

import DefaultLayout from "../common/layout/DefaultFormLayout";
import ListHeader from "../common/parts/ListHeader";
import Paginator from "../common/parts/Paginator";

import {mapState, mapActions, mapMutations} from "vuex";
import ListBody from "./list/ListBody";

// mixins
import {layout} from "../../mixins/layout";

export default {
    name: "EngiList",

    mixins: [layout],

    components: {
        ListBody,
        DefaultLayout,
        ListHeader,
        Paginator
    },

    computed: {
        ...mapState('engi/list', [
            'list',
        ])
    },

    watch: {
        'list.current_page': function (val, oldVal) {
            this.getList();
        },
    },

    async mounted() {
        await this.getList();
        this.hideLoadingAnimation();
    },

    methods: {
        ...mapMutations('engi/list', [
            'setCurrentPage'
        ]),

        ...mapActions('engi/list', [
            'getList'
        ]),
    }
}
</script>

<style scoped>

</style>
