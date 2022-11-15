<template>
    <default-layout>
        <edit-header slot="page_header"
                     :header_icon="'nav-icon fas fa-edit'"
                     :page_title="'演技編集'"
                     :submit_func="clickSubmit"
                     :go_back_func="goList"
        ></edit-header>

        <edit-body slot="card_body"></edit-body>

    </default-layout>
</template>

<script>
import DefaultLayout from "../common/layout/DefaultLayout";
import PageHeader from "../common/parts/PageTitle";
import EditBody from "./parts/EditBody";
import EditHeader from "../common/parts/EditHeader";

export default {
    name: "EngiEdit",

    data(){
        return {
            list_path: '/engi'
        }
    },

    components: {
        EditHeader,
        EditBody,
        DefaultLayout,
        PageHeader
    },

    methods: {
        goList(){
            location.href = this.list_path;
        },
        clickSubmit(){
            // if(this.engi_uuid){
            //     this.updateEngi();
            // }else{
            //     this.createEngi();
            // }
            console.log('submit!');
        }
    }
}
</script>

<style scoped>

</style>
