<template>
    <textbox
        :label_value="'タイトル'"
        :input_id="'title'"
        :bind_value="engi.title"
        :set-title="setEvent"
        :error_message="error_message"
        :is-disabled="!is_editor_mode"
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
        ...mapState('engi/edit', [
            'engi',
            'errors',
            'is_editor_mode'
        ]),

        error_message(){
            if(this.errors['engi.title'] == null) return null;
            else return this.errors['engi.title'][0];
        },

        additional_class(){
            if(this.error_message) return 'is-invalid';
            else return '';
        }
    },

    methods: {
        ...mapMutations('engi/edit', [
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
