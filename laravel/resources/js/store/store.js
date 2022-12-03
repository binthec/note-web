import Vue from 'vue';
import Vuex from 'vuex';

import edit_engi from './modules/edit_engi';
import list_engi from "./modules/list_engi";

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        edit_engi,
        list_engi
    }
});
