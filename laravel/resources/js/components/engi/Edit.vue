<template>
    <default-form-layout>
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

    </default-form-layout>
</template>

<script>
    // Vuex Mapping
    import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';

    // common
    import DefaultFormLayout from "../common/layout/DefaultFormLayout";
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
            DefaultFormLayout,
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
                'show_success_modal',
                'show_error_modal',
            ]),
        },

        created(){
            this.initUuid({uuid : this.uuid});
        },

        watch: {
            show_success_modal(new_bool, old_bool){
                if(new_bool === true) this.showSuccessModal();
            },
            show_error_modal(new_bool, old_bool){
                if(new_bool === true) this.showErrorModal();
            },
        },

        methods: {
            ...mapMutations('edit_engi', [
                'initUuid',
            ]),
            ...mapActions('edit_engi', [
                'createEngi',
                'updateEngi'
            ]),

            showSuccessModal() {
                this.$modal.show('success-modal');
            },

            showErrorModal() {
                this.$modal.show('error-modal');
            },

            goList() {
                location.href = this.list_path;
            },

            clickSubmit() {
                if(this.uuid){
                    console.log('update');
                    this.updateEngi();
                }else{
                    console.log('create');
                    this.createEngi();
                }
                console.log('submit!');
            }
        }
    }
</script>

<style scoped>

</style>
