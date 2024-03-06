<template>
    <modal name="download-item-modal"
           :width="'50%'"
           :height="'auto'"
           :scrollable="true"
    >
        <div class="modal-header bg-info">
            <h4 class="item-title">{{ item.title }}</h4>
        </div>
        <div class="modal-body">
            <div class="wrapper">
                <div class="item-img text-center" id="download-img">
                    <img :src="getFilePath(item.first_cate, item.uuid)">
                </div>
            </div>
            <span>ダウンロード：</span>
            <button type="button" class="btn btn-info" @click="downloadPng(item.uuid)">PNG</button>
            <button type="button" class="btn btn-info" @click="downloadSvg">SVG</button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-dark" @click="hideModal">閉じる</button>
        </div>
    </modal>
</template>

<script>
import {getImageSvgPath} from "../../../script/item";
import * as htmlToImage from 'html-to-image';
import {toPng, toJpeg, toBlob, toPixelData, toSvg} from 'html-to-image';
import * as download from "downloadjs";

export default {
    name: "DownloadModal",

    props: {
        item: {
            default: {}
        }
    },

    methods: {
        hideModal() {
            this.$modal.hide('download-item-modal');
        },

        getFilePath(first_cate, uuid) {
            return getImageSvgPath(first_cate, uuid);
        },

        downloadPng(uuid) {
            let node = document.getElementById('download-img');
            htmlToImage
                .toPng(node)
                .then(function (dataUrl) {
                    download(dataUrl, uuid);
                })
                .catch(function (error) {
                    console.error('oops, something went wrong!', error);
                });
        },

        downloadSvg() {
            download(this.getFilePath(this.item.first_cate, this.item.uuid));
        }
    }
}
</script>

<style lang="scss" scoped>
.item-title {
    font-weight: 700;
}

.modal-body {
    background-color: #eee;

    .wrapper {
        padding: 20px;
        margin: auto;

        .item-img {
            background-color: #fff;
            text-align: center;
            padding: 15px;
        }
    }

    span {
        font-weight: 500;
    }

    button {
        margin-right: 10px;
    }

}
</style>
