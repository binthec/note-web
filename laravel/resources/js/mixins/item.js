import {FIRST_CATE_DIR_NAME, SAMPLE_IMG} from "../const/item";

export const itemImg = {
    methods: {
        getImageSvgPath(first_cate, uuid) {
            return '/assets/items/' + FIRST_CATE_DIR_NAME[first_cate] + '/' + uuid + '.svg';
        },

        noImage(e) {
            e.target.src = SAMPLE_IMG;
        }
    }
}
