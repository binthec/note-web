<template>
    <button
        type="button"
        class="btn btn-primary float-right"
        :disabled="isDisabled"
        @click="saveBasicInfo"
    >{{ buttonName }}</button>
</template>

<script>
import {mapActions, mapState} from "vuex";

import SaveButton from "../../../common/buttons/SaveButton";

export default {
    name: "SaveBasicInfoButton",

    components: {
        SaveButton
    },

    data() {
        return {
            isDisabled: false,
            buttonName: '基本情報を保存'
        }
    },

    computed: {
        ...mapState('engi/edit', [
            'uuid'
        ])
    },

    methods: {
        ...mapActions('engi/edit', [
            'createEngi',
            'updateEngi'
        ]),

        saveBasicInfo() {
            if (this.uuid) {
                this.updateEngi({onlyBasicInfo: true});
            } else {
                this.createEngi({onlyBasicInfo: true});
            }

            this.buttonName = '基本情報を変更';
        }
    }
}
</script>

<style scoped>

</style>
