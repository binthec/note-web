<template>
    <div class="form-group">

        <!-- 画像選択するところ -->
        <div id="ground-wrapper" class="clearfix">
            <!-- 追加された画像が入る所 -->
            <div id="added"></div>

            <!-- 追加ボタン -->
            <div class="piece add-btn text-center" @click="">
                <i class="fas fa-plus text-xl"></i>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "ImageInputForm",

    mounted() {
        this.addPiece();
    },

    methods: {
        addPiece() {
            const piece = document.createElement('div');
            piece.className = "piece";
            document.getElementById('added').prepend(piece);
        }
    }
}
</script>

<style lang="scss" scoped>
#ground-wrapper {
    border: solid 2px #cccccc;
    width: 100%;
    padding: 10px;
}

#ground-wrapper ::v-deep {
    .piece {
        float: left;
        min-width: 120px;
        width: auto;
        height: 120px;
        border: solid 2px #ccc;
        border-radius: 15px;
        margin-bottom: 10px;
    }

    .piece:nth-child(n+2) {
        margin-left: 10px;
    }
}



.piece.add-btn{
    display: table;
}
.piece.add-btn i{
    display: table-cell;
    vertical-align: middle;
}

.piece.add-btn:hover{
    background-color: #cce5f6;
}

</style>
