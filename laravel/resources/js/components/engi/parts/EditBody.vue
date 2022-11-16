<template>

    <div class="card-body">
        <form class="form-horizontal">
            <textbox
                :label_value="'タイトル'"
                :input_id="'title'"
            ></textbox>
        </form>
    </div>

</template>

<script>
    import Textbox from "../../common/form/Textbox";

    export default {
        name: "EditBody",

        components: {
            Textbox
        },

        props: {}
    }
</script>
