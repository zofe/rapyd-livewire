
//window._ = require('lodash');

import Vue from 'vue';
import 'livewire-vue';
window.Vue = Vue;

window.moment = require('moment');

import lang_en from 'element-ui/lib/locale/lang/en';
//import lang_it from 'element-ui/lib/locale/lang/it';
import locale from 'element-ui/lib/locale';
locale.use(lang_en);

//quill
//import Quill from 'quill/dist/quill';
//window.Quill = Quill;

//tom select
import TomSelect from 'tom-select/dist/js/tom-select.complete';
window.TomSelect = TomSelect;

//element
import ElementUI from 'element-ui';
//Vue.use(ElementUI);

import { DatePicker } from 'element-ui';

Vue.use(DatePicker);

window.bus = new Vue({data: {}});

Vue.config.ignoredElements = [/^ion-/,/^x-rpd/]
Vue.component('rpd-select', require('./components/Select').default)
Vue.component('rpd-select-multiple', require('./components/SelectMultiple').default)
Vue.component('rpd-date', require('./components/Date').default)
Vue.component('rpd-date-time', require('./components/DateTime').default)
Vue.component('rpd-date-range', require('./components/DateRange').default)
Vue.component('rpd-address', require('./components/AddressAutocomplete').default)
Vue.component('rpd-notifies', require('./components/Notifies').default)
// Vue.component('rpd-input', require('./components/Input').default)


window.app = new Vue({
    el: '#app',
    data: {
    }
});






