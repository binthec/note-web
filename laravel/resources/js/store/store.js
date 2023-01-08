import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import engi from "./modules/engi";
import item from "./modules/item";

export const store = new Vuex.Store({
    modules: {
        engi,
        item
    }
});
