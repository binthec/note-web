<template>
    <default-form-layout>
        <edit-header slot="page_header"
                     :header_icon="'nav-icon fas fa-edit'"
                     :page_title="'コンテンツ編集'"
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

    // for item
    import EditBody from "./edit/parts/EditBody";
    import EditHeader from "../common/parts/EditHeader";
    import EditFooter from "./edit/parts/EditFooter";

    export default {
        name: "ItemEdit",

        data() {
            return {
                list_path: '/items'
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
            ...mapState('item/edit', [
                'show_success_modal',
                'show_error_modal',
            ]),
        },

        created(){
            this.initUuid({uuid : this.uuid});
        },

        async mounted(){
            if(!this.uuid) return;
            await this.getItem();
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
            ...mapMutations('item/edit', [
                'initUuid',
            ]),
            ...mapActions('item/edit', [
                'getItem',
                'createItem',
                'updateItem',
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
                    this.updateItem();
                }else{
                    this.createItem();
                }
            }
        }
    }
</script>

<style scoped>

</style>
