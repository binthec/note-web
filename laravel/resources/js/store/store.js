import Vue from 'vue';
import Vuex from 'vuex';

import engi_list from './modules/edit_list';


Vue.use(Vuex);

const store = new Vuex.Store({
   modules: {
       engi_list,
   }
});

export default store;
