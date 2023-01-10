<template>
    <default-form-layout>
        <edit-header slot="page_header"
                     :header-icon="'nav-icon fas fa-edit'"
                     :page-title="'演技編集'"
                     :cancel-event="clickSubmit"
                     :save-event="goList"
        ></edit-header>

        <edit-body slot="card_body"></edit-body>

        <card-footer slot="card_footer"
                     :cancel-event="goList"
                     :save-event="clickSubmit"
        ></card-footer>
    </default-form-layout>
</template>

<script>
// Vuex Mapping
import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';

// common
import DefaultFormLayout from "../common/layout/DefaultFormLayout";
import PageHeader from "../common/parts/PageTitle";

// for engi
import EditBody from "./edit/parts/EditBody";
import EditHeader from "../common/parts/EditHeader";
import CardFooter from "../common/card/CardFooter";

export default {
    name: "EngiEdit",

    data() {
        return {
            list_path: '/engi'
        }
    },

    components: {
        CardFooter,
        DefaultFormLayout,
        PageHeader,
        EditHeader,
        EditBody,
    },

    props: {
        uuid: {
            default: null
        }
    },

    computed: {
        ...mapState('engi/edit', [
            'show_success_modal',
            'show_error_modal',
        ]),

        ...mapState('item/category', [
            'first_categories',
            'first_category'
        ]),
    },

    created() {
        this.initUuid({uuid: this.uuid});
        this.getFirstCategories();
    },

    async mounted() {
        if (!this.uuid) return;
        await this.getEngi();
    },


    watch: {
        show_success_modal(new_bool, old_bool) {
            if (new_bool === true){
                this.showSuccessModal();
            }else{
                this.hideSuccessModal();
            }
        },
        show_error_modal(new_bool, old_bool) {
            if (new_bool === true) this.showErrorModal();
        },
    },

    methods: {
        ...mapMutations('engi/edit', [
            'initUuid',
            'setEngiFirstCategory'
        ]),

        ...mapActions('engi/edit', [
            'getEngi',
            'createEngi',
            'updateEngi',
        ]),

        ...mapActions('item/category', [
            'getFirstCategories'
        ]),

        showSuccessModal() {
            this.$modal.show('success-modal');
        },

        hideSuccessModal() {
            this.$modal.hide('success-modal');
        },

        showErrorModal() {
            this.$modal.show('error-modal');
        },

        goList() {
            location.href = this.list_path;
        },

        clickSubmit() {
            if (this.uuid) {
                this.updateEngi();
            } else {
                this.createEngi();
            }
        },
    }
}
</script>

<style scoped>

</style>
