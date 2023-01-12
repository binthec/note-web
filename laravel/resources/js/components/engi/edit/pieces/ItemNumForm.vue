<template>
    <SelectBox
        :label-name="'1行のアイテム数'"
        :select-id="'item-num'"
        :bind-value="engi.item_num"
        @update:bindValue="setEvent"
        :error-message="errorMessage"
        :is-disabled="!is_editor_mode"
        :options="options"
    ></SelectBox>
</template>

<script>

import textbox from "../../../common/form/Textbox";
import {mapMutations, mapState} from "vuex";
import SelectBox from "../../../common/form/SelectBox";

export default {
    name: "ItemNumForm",

    components: {
        SelectBox,
    },

    data(){
        return {
            options: {
                1: 1,
                2: 2,
                3: 3,
                4: 4,
            }
        }
    },

    computed: {
        ...mapState('engi/edit', [
            'engi',
            'errors',
            'is_editor_mode'
        ]),

        errorMessage(){
            if(this.errors['engi.item_num'] == null) return null;
            else return this.errors['engi.item_num'][0];
        },

        additional_class(){
            if(this.error_message) return 'is-invalid';
            else return '';
        }
    },

    methods: {
        ...mapMutations('engi/edit', [
            'setItemNum',
        ]),

        setEvent(value) {
            this.setItemNum({value: value});
        }
    }
}
</script>

<style scoped>

</style>
