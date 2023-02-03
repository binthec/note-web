<template>
    <div>
        <div class="input-group">
            <search-text
                v-model="params.search_text"
                @press-enter="getList"
                :search-text-class="'col-md-6'"
                :placeholder="'タイトルで検索'"
            ></search-text>
            <span class="input-group-append">
                <search-button @click="getList"></search-button>
            </span>
        </div>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import SearchText from "../../common/search/SearchText";
import SearchButton from "../../common/search/SearchButton";

export default {
    name: "DownloadSearch",

    components: {
        SearchButton,
        SearchText,
    },

    props: {},

    computed: {
        ...mapState('item/download', [
            'params'
        ]),
    },

    methods: {
        ...mapActions('item/download', [
            'getList'
        ])
    }
}
</script>

<style lang="scss" scoped>
</style>
