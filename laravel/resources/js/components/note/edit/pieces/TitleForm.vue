<template>
    <textbox
        :label_value="'タイトル'"
        :input_id="'title'"
        :bind_value="item.title"
        :set-title="setEvent"
        :error_message="error_message"
        :additional_class="additional_class"
    ></textbox>
</template>

<script>
import {mapMutations, mapState} from "vuex";

import textbox from "../../../common/form/Textbox";

export default {
    name: "TitleForm",

    components: {
        textbox
    },

    computed: {
        ...mapState('item/edit', [
            'item',
            'errors',
        ]),

        error_message(){
            if(this.errors['item.title'] == null) return null;
            else return this.errors['item.title'][0];
        },

        additional_class(){
            if(this.error_message) return 'is-invalid';
            else return '';
        }
    },

    methods: {
        ...mapMutations('item/edit', [
            'setTitle',
        ]),

        setEvent(event) {
            this.setTitle({value: event.target.value});
        }
    }
}
</script>

<style scoped>

</style>
