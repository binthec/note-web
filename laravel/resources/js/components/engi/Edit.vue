<template>
    <default-layout>
        <edit-header slot="page_header"
                     :header_icon="'nav-icon fas fa-edit'"
                     :page_title="'演技編集'"
                     :submit_func="clickSubmit"
                     :go_back_func="goList"
        ></edit-header>

        <edit-body slot="card_body"></edit-body>

        <edit-footer slot="card_footer"
                     :submit_func="clickSubmit"
                     :go_back_func="goList"
        ></edit-footer>

    </default-layout>
</template>

<script>
    // Vuex Mapping
    import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';

    // common
    import DefaultLayout from "../common/layout/DefaultLayout";
    import PageHeader from "../common/parts/PageTitle";

    // for engi
    import EditBody from "./parts/EditBody";
    import EditHeader from "../common/parts/EditHeader";
    import EditFooter from "./parts/EditFooter";

    export default {
        name: "EngiEdit",

        data() {
            return {
                list_path: '/engi'
            }
        },

        components: {
            DefaultLayout,
            PageHeader,
            EditHeader,
            EditBody,
            EditFooter
        },

        props: {
            uuid: {
                default: null
            }
        },

        computed: {
            ...mapState('edit_engi', [

            ]),
        },

        created(){
            this.initUuid({uuid : this.uuid});
        },

        methods: {
            ...mapMutations('edit_engi', [
                'initUuid'
            ]),

            goList() {
                location.href = this.list_path;
            },

            clickSubmit() {
                if(this.engi_uuid){
                    this.updateEngi();
                }else{
                    this.createEngi();
                }
                console.log('submit!');
            }
        }
    }
</script>

<style scoped>

</style>
