require('./bootstrap');

import Vue from 'vue';

require('./mixins');


Vue.component('Example',require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
});
