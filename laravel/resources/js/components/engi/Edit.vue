<template>
    <default-layout>
        <page-header slot="page_header"
                     :header_icon="'nav-icon fas fa-edit'"
                     :header_title="'演技編集'"
        ></page-header>

        <edit-body slot="card_body"></edit-body>

    </default-layout>
</template>

<script>
import DefaultLayout from "../common/layout/DefaultLayout";
import PageHeader from "../common/parts/PageTitle";
import EditBody from "./parts/EditBody";

export default {
    name: "EngiEdit",

    components: {
        EditBody,
        DefaultLayout,
        PageHeader
    }
}
</script>

<style scoped>

</style>
