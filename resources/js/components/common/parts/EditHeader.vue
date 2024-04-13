<template>
    <div class="container-fluid">
        <page-title
            :header-icon="headerIcon"
            :page-title="pageTitle"
        ></page-title>

        <div class="row mb-2">
            <div class="col-sm-12">
                <cancel-button
                    :cancel-event="cancelEvent"
                    :additional-class="'mr-3'"
                ></cancel-button>
                <save-button :save-event="saveEvent"></save-button>
            </div>
        </div>
    </div>
</template>

<script>
    import PageTitle from "./PageTitle";
    import cancelButton from "../buttons/CancelButton";
    import saveButton from "../buttons/SaveButton";

    export default {
        name: "EditHeader",

        components: {
            PageTitle,
            cancelButton,
            saveButton
        },

        props:{
            headerIcon: {
                default: ''
            },
            pageTitle: {
                default: ''
            },
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
