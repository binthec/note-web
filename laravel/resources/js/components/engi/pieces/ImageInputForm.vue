<template>
    <div class="form-group">

        <!-- 画像選択するところ -->
        <div id="ground-wrapper" class="clearfix"></div>

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
            document.getElementById('ground-wrapper').appendChild(piece);
        }
    }
}
</script>

<style scoped>
#ground-wrapper {
    border: solid 2px #cccccc;
    width: 100%;
    padding: 10px;
}

#ground-wrapper ::v-deep .piece {
    float: left;
    min-width: 120px;
    width: auto;
    height: 120px;
    border: solid 2px #ccc;
    border-radius: 15px;
    background-color: #1c7430;
}
</style>
