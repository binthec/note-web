<template>
    <div class="row">

        <div>
            <div class="input-group">
                <search-text
                    v-model="params.search_text"
                    @press-enter="getList"
                    :search-text-class="'search-text-class'"
                    :placeholder="'タイトルで検索'"
                ></search-text>
                <span class="input-group-append">
                    <search-button @click="getList"></search-button>
                </span>
            </div>
        </div>

    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import SearchText from "../../common/search/SearchText";
import SearchButton from "../../common/search/SearchButton";

export default {
    name: "ItemSearch",

    components: {
        SearchButton,
        SearchText,
    },

    props: {
        getList: {
            default: {},
        },
        params:{
            default: null,
        }
    }
}
</script>

<style lang="scss" scoped>
.search-text-class {
    width: 400px;
}
</style>
