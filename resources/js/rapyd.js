
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



Vue.component('select-component', require('./components/Select').default)
Vue.component('select-multiple-component', require('./components/SelectMultiple').default)
Vue.component('date-component', require('./components/Date').default)
Vue.component('input-component', require('./components/Input').default)

Vue.component('nav-section', {
    template: `<div>This is odd</div>`
});

window.app = new Vue({
    el: '#app',
    data: {
    }
});





