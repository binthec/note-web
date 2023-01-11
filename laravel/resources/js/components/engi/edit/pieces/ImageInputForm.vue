<template>
    <div class="form-group">

        <!-- 画像選択するところ -->
        <div id="ground-wrapper" class="clearfix" :style="{ height : wrapperHeightComputed + 'px' }">
            <!-- 追加された画像が入る所 -->
            <div id="added"></div>

            <!-- 追加ボタン -->
            <div class="piece add-btn text-center" @click="showAddModal">
                <i class="fas fa-plus text-xl"></i>
            </div>
        </div>

        <select-item-modal></select-item-modal>
    </div>
</template>

<script>
import SelectItemModal from "./SelectItemModal";

export default {
    name: "ImageInputForm",

    data() {
        return {
            wrapperHeight: {
                default: 100
            }
        }
    },

    components: {SelectItemModal},

    mounted() {
        // this.addPiece();

        // ウィンドウをリサイズした時の処理
        window.addEventListener('resize', this.handleSize);

        // A4サイズっぽくなるようにラッパーの縦を調整
        this.$nextTick(() => {
            this.setWrapperHeight();
        });
    },

    computed: {
        wrapperHeightComputed() {
            return this.wrapperHeight;
        },
    },

    methods: {
        handleSize(){
            this.setWrapperHeight();
        },

        setWrapperHeight() {
            let wrapper = document.getElementById("ground-wrapper");
            this.wrapperHeight = wrapper.offsetWidth * 1.41;
        },

        addPiece() {
            const piece = document.createElement('div');
            piece.className = "piece";
            document.getElementById('added').prepend(piece);
        },

        showAddModal: function () {
            this.$modal.show('add-modal');
        },
    }
}
</script>

<style lang="scss" scoped>
@import "../../../../../sass/variables";

#ground-wrapper {
    border: solid 2px $gray-border;
    width: 100%;
    padding: 10px;

    ::v-deep {
        .piece {
            float: left;
            min-width: 120px;
            width: auto;
            height: 120px;
            border: solid 2px $gray-border;
            border-radius: 15px;
            margin-bottom: 10px;

            &:nth-child(n+2) {
                margin-left: 10px;
            }

            &.add-btn {
                display: table;

                i {
                    display: table-cell;
                    vertical-align: middle;
                }

                &:hover {
                    background-color: $blue;
                }
            }
        }
    }
}
</style>
