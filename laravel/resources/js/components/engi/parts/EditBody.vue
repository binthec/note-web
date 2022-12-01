<template>

    <div class="card-body">
        <textbox
            :label_value="'タイトル'"
            :input_id="'title'"
            :bind_value="engi.title"
            :set-title="setTitleEvent"
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
            'engi'
        ]),
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
