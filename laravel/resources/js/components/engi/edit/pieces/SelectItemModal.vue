<template>
    <modal name="add-modal"
           :width="modalWidth"
           :height="modalHeight"
    >
        <div class="modal-header bg-info">
            <h4>追加したいアイテムの選択</h4>
        </div>
        <div class="modal-body">
            <hr>

            <div class="select-area">

                <div class="row" v-if="items">
                    <div class="col-3" v-for="item in items">
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

export default {
    name: "SelectItemModal",

    components: {
        //
    },

    data() {
        return {
            modalWidth: window.innerWidth * 0.9,
            modalHeight: window.innerHeight * 0.9,
        }
    },

    computed: {
        ...mapState('item/category', [
            'errors',
        ]),
    },

    methods: {
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
</style>
