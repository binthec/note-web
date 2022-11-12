import Vue from 'vue';
import Vuex from 'vuex';

import engi_list from './modules/edit_list';

Vue.use(Vuex);

export const store = new Vuex.Store({
   modules: {
       engi_list,
   }
});
