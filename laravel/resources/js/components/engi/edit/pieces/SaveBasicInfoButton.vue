<template>
    <button v-if="is_editor_mode"
        type="button"
        class="btn btn-primary float-right"
        @click="saveBasicInfo"
    >基本情報を保存
    </button>

    <button v-else
        type="button"
        class="btn btn-warning float-right"
        @click="changeToEditorMode"
    >基本情報を編集
    </button>
</template>

<script>
import {mapActions, mapMutations, mapState} from "vuex";

import SaveButton from "../../../common/buttons/SaveButton";

export default {
    name: "SaveBasicInfoButton",

    components: {
        SaveButton
    },

    data() {
        return {
            isDisabled: false,
            buttonName: '基本情報を保存'
        }
    },

    computed: {
        ...mapState('engi/edit', [
            'uuid',
            'is_editor_mode'
        ])
    },

    methods: {
        ...mapActions('engi/edit', [
            'createEngi',
            'updateEngi'
        ]),

        ...mapMutations('engi/edit',[
            'setEditorMode'
        ]),

        ...mapActions('item/category', [
            'getSecondCategories'
        ]),

        saveBasicInfo() {
            if (this.uuid) {
                this.updateEngi({onlyBasicInfo: true});
            } else {
                this.createEngi({onlyBasicInfo: true});
            }

            this.getSecondCategories();
            this.buttonName = '基本情報を変更';
            this.setEditorMode({value: false});
        },

        changeToEditorMode(){
            this.setEditorMode({value: true});
        }
    }
}
</script>

<style scoped>

</style>
