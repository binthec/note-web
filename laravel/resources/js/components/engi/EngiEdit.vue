<template>
    <default-form-layout>
        <edit-header slot="page_header"
                     :header-icon="'nav-icon fas fa-edit'"
                     :page-title="'演技編集'"
                     :cancel-event="goList"
                     :save-event="clickSubmit"
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

// mixins
import {layout} from "../../mixins/layout";

// common
import DefaultFormLayout from "../common/layout/DefaultFormLayout";
import PageHeader from "../common/parts/PageTitle";

// for engi
import EditBody from "./edit/parts/EditBody";
import EditHeader from "../common/parts/EditHeader";
import CardFooter from "../common/card/CardFooter";

export default {
    name: "EngiEdit",

    mixins: [layout],

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
        propsUuid: {
            default: null
        }
    },

    async created() {
        this.initUuid({uuid: this.propsUuid});
    },

    async mounted() {
        // 大分類を取得
        await this.getFirstCategories();

        if (!this.propsUuid){ // 新規作成の場合
            this.setFirstCategory({value: Object.entries(this.first_categories)[0][0]});
        }else{
            this.setEditorMode({value: false});
            await this.getEngi();
            this.setFirstCategory({value: this.engi.first_cate});
        }
        this.initCategories();

        this.hideLoadingAnimation();
    },

    computed: {
        ...mapState('engi/edit', [
            'engi',
            'show_success_modal',
            'show_error_modal',
            'uuid'
        ]),

        ...mapState('item/category', [
            'first_categories',
            'first_category'
        ]),
    },

    watch: {
        show_success_modal(new_bool, old_bool) {
            if (new_bool === true) {
                this.showSuccessModal();
            } else {
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
            'setEditorMode'
        ]),

        ...mapActions('engi/edit', [
            'getEngi',
            'createEngi',
            'updateEngi',
        ]),

        ...mapMutations('item/category', [
            'setFirstCategory'
        ]),

        ...mapActions('item/category', [
            'getFirstCategories',
            'getSecondCategories',
            'initCategories'
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
                this.updateEngi({onlyBasicInfo: false});
            } else {
                this.createEngi({onlyBasicInfo: false});
            }
        },
    }
}
</script>

<style scoped>

</style>
