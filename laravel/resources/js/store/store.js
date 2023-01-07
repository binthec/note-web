import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import engi from "./modules/engi";

export const store = new Vuex.Store({
    modules: {
        engi
    }
});
