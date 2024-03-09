// store
import {mapActions, mapState} from "vuex";

// component
import SuccessModal from "../components/common/modals/SuccessModal";
import ErrorModal from "../components/common/modals/ErrorModal";
import { VueLoading } from "vue-loading-template";

export const layout = {
    components: {
        SuccessModal,
        ErrorModal,
        VueLoading,
    },

    computed: {
        ...mapState('loading', [
            'is_loading'
        ])
    },

    methods: {
        ...mapActions('loading', [
            'hideLoadingAnimation'
        ])
    }
}
