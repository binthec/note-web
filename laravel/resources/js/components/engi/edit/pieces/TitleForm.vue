<template>
    <textbox
        :label-name="'タイトル'"
        :input-id="'title'"
        :bind-value="engi.title"
        :set-title="setEvent"
        :error-message="errorMessage"
        :is-disabled="!is_editor_mode"
        :additional-class="additionalClass"
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

        errorMessage(){
            if(this.errors['engi.title'] == null) return null;
            else return this.errors['engi.title'][0];
        },

        additionalClass(){
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
