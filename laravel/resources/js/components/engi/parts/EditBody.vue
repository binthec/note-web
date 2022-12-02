<template>

    <div class="card-body">
        <textbox
            :label_value="'タイトル'"
            :input_id="'title'"
            :bind_value="engi.title"
            :set-title="setTitleEvent"
            :error_message="title_error_message"
            :additional_class="additional_class"
        ></textbox>
    </div>

</template>

<script>
// vuex
import {mapState, mapMutations, mapActions} from "vuex";

// common
import Textbox from "../../common/form/Textbox";

export default {
    name: "EditBody",

    components: {
        Textbox
    },

    props: {},

    computed: {
        ...mapState('edit_engi', [
            'engi',
            'errors',
        ]),

        title_error_message(){
            if(this.errors['engi.title'] == null) return null;
            else return this.errors['engi.title'][0];
        },

        additional_class(){
            if(this.title_error_message) return 'is-invalid';
            else return '';
        }
    },

    methods: {
        ...mapMutations('edit_engi', [
            'setTitle',
        ]),

        setTitleEvent(event) {
            this.setTitle({title: event.target.value});
        }
    }
}
</script>
