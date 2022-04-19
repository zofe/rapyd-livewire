
window._ = require('lodash');

import Vue from 'vue';
import 'livewire-vue';
window.Vue = Vue;


import lang_en from 'element-ui/lib/locale/lang/en';
import lang_it from 'element-ui/lib/locale/lang/it';
import locale from 'element-ui/lib/locale';
locale.use(lang_en);






import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);

Vue.config.ignoredElements = [/^ion-/,/^x-rpd/]
Vue.component('rpd-select', require('./components/Select').default)
Vue.component('rpd-select-multiple', require('./components/SelectMultiple').default)
Vue.component('rpd-date', require('./components/Date').default)
// Vue.component('rpd-input', require('./components/Input').default)


window.app = new Vue({
    el: '#app',
    data: {
    }
});






