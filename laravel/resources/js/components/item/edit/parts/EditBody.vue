<template>
    <div class="card-body">
        <h4>基本設定</h4>
        <!-- タイトル -->
        <title-form></title-form>
        <!-- カテゴリ選択 -->
        <select-category-form></select-category-form>
    </div>

</template>

<script>
// vuex
import {mapState, mapMutations, mapActions} from "vuex";

// common
import TitleForm from "../pieces/TitleForm";
import SelectCategoryForm from "../pieces/SelectCategoryForm";

export default {
    name: "EditBody",

    components: {
        SelectCategoryForm,
        TitleForm,
    },
}
</script>
