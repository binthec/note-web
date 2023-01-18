<template>
    <div class="card-body">
        <h4>基本設定</h4>
        <!-- タイトル -->
        <title-form></title-form>
        <!-- 1行に設定するアイテム数 -->
        <item-num-form></item-num-form>
        <!-- どのカテゴリ（大分類：手具 or 徒手）のシートか -->
        <select-first-category-form></select-first-category-form>
        <!-- 基本設定だけ保存するボタン -->
        <save-basic-info-button></save-basic-info-button>

        <h4>演技内容設定</h4>
        <!-- 演技編集シート -->
        <customize-engi-sheet></customize-engi-sheet>
    </div>

</template>

<script>
// common
import TitleForm from "../pieces/TitleForm";
import ItemNumForm from "../pieces/ItemNumForm";
import SaveBasicInfoButton from "../pieces/SaveBasicInfoButton";
import SelectFirstCategoryForm from "../pieces/SelectFirstCategoryForm";
import CustomizeEngiSheet from "../pieces/CustomizeEngiSheet";

export default {
    name: "EditBody",

    components: {
        CustomizeEngiSheet,
        SelectFirstCategoryForm,
        SaveBasicInfoButton,
        ItemNumForm,
        TitleForm,
    }
}
</script>
