<template>
    <div class="card-body">
        <h4>基本設定</h4>
        <!-- タイトル -->
        <title-form></title-form>
        <!-- 1行に設定するアイテム数 -->
        <item-num-form></item-num-form>

        <h4>演技内容設定</h4>
        <!-- 画像選択 -->
        <image-input-form></image-input-form>
    </div>

</template>

<script>
// vuex
import {mapState, mapMutations, mapActions} from "vuex";

// common
import TitleForm from "../pieces/TitleForm";
import ImageInputForm from "../pieces/ImageInputForm";
import ItemNumForm from "../pieces/ItemNumForm";

export default {
    name: "EditBody",

    components: {
        ItemNumForm,
        ImageInputForm,
        TitleForm,
    },
}
</script>
