import {FIRST_CATE_DIR_NAME} from "../const/item";

export function getImageSvgPath(first_cate, uuid) {
    return '/assets/items/' + FIRST_CATE_DIR_NAME[first_cate] + '/' + uuid + '.svg';
}


