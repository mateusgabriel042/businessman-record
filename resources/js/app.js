require('./bootstrap');

import Vue from 'vue';

import App from './views/app.vue';

const app = new Vue({
	el: '#app',
	components: {'app':App}
});