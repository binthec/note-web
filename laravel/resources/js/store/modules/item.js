import list from "./item/list";
import edit from "./item/edit";
import category from "./item/category";

const item = {
    namespaced: true,
    modules: {
        list,
        edit,
        category
    }
}

export default item
