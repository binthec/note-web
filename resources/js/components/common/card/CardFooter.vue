<template>
    <div class="card-footer clearfix">
        <cancel-button :cancel-event="cancelEvent"></cancel-button>
        <save-button
            :save-event="saveEvent"
            :additional-class="'float-right'"
        ></save-button>
    </div>
</template>

<script>
import cancelButton from "../buttons/CancelButton";
import saveButton from "../buttons/SaveButton";

export default {
    name: "CardFooter",

    components: {
        cancelButton,
        saveButton
    },

    props: {
        cancelEvent: {
            default: () => {}
        },
        saveEvent: {
            default: () => {}
        }
    }
}
</script>

<style scoped>

</style>
