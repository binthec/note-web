<template>
    <textbox
        :label_value="'1行のアイテム数'"
        :input_id="'item_num'"
        :bind_value="engi.item_num"
        :set-title="setEvent"
        :error_message="error_message"
        :additional_class="additional_class"
    ></textbox>
</template>

<script>

import textbox from "../../../common/form/Textbox";
import {mapMutations, mapState} from "vuex";

export default {
    name: "ItemNumForm",

    components: {
        textbox
    },

    computed: {
        ...mapState('engi/edit', [
            'engi',
            'errors',
        ]),

        error_message(){
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

        setEvent(event) {
            this.setItemNum({value: event.target.value});
        }
    }
}
</script>

<style scoped>

</style>
