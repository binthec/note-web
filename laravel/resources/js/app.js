/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('admin-lte');

import Vue from "vue";
// window.Vue = require('vue'); // もともと書いてあった

// vue 設定ファイルの読み込み
import vue_routes from "./components/vue_routes";
import { store } from './store/store';

// その他ライブラリ
import VModal from "vue-js-modal";

Vue.use(VModal);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * ルート設定ファイルから component を読み込む
 */
for (let i in vue_routes) {
    let tag = vue_routes[i].tag;        // タグ
    let directory = vue_routes[i].dir;  // ディレクトリ名
    let file_name = vue_routes[i].file; // ファイル名

    Vue.component(tag, require('./components/' + directory + '/' + file_name + '.vue').default);
}

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store
});
