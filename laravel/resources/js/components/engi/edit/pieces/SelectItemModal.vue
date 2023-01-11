<template>
    <modal name="add-modal"
           :width="modalWidth"
           :height="modalHeight"
           :reset="true"
    >
        <div class="modal-header bg-info">
            <h4>追加したいアイテムの選択</h4>
        </div>
        <div class="modal-body">
            <select-second-category-form></select-second-category-form>
            <select-third-category-form></select-third-category-form>

            <hr>

            <div class="select-area">

                <div class="row" v-if="items">
                    <div class="item-box col-3" v-for="item in items">
                        <img :src="'/storage/items' + item.file_path">
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-dark" @click="hideAddModal" href="javascript: void(0);">閉じる</a>
        </div>
    </modal>
</template>

<script>
// vuex
import {mapState, mapMutations, mapActions} from "vuex";
import SelectSecondCategoryForm from "./SelectSecondCategoryForm";
import SelectThirdCategoryForm from "./SelectThirdCategoryForm";

export default {
    name: "SelectItemModal",

    components: {
        SelectThirdCategoryForm,
        SelectSecondCategoryForm
    },

    data() {
        return {
            modalWidth: window.innerWidth * 0.9,
            modalHeight: window.innerHeight * 0.9,
        }
    },

    mounted() {
        window.addEventListener('resize', this.handleResize);
    },

    computed: {
        ...mapState('item/category', [
            'errors',
            'items'
        ]),
    },

    methods: {
        handleResize(){
            this.modalWidth = window.innerWidth * 0.9;
            this.modalHeight = window.innerHeight * 0.9;
        },

        hideAddModal: function () {
            this.$modal.hide('add-modal');
        },
    }

}
</script>

<style scoped>
.select-area{
    width: 100%;
}

.item-box{
    border: 4px solid #17a2b8;
    border-radius: 10px;
    width: 100%;
    min-height: 100px;
    margin: 5px;
    padding: 5px;
}
</style>
