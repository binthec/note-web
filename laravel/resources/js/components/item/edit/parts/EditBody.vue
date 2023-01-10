<template>
    <div class="card-body">
        <h4>基本設定</h4>
        <!-- タイトル -->
        <title-form></title-form>
    </div>

</template>

<script>
// vuex
import {mapState, mapMutations, mapActions} from "vuex";

// common
import TitleForm from "../pieces/TitleForm";

export default {
    name: "EditBody",

    components: {
        TitleForm,
    },
}
</script>
