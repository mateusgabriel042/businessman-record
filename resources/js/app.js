require('./bootstrap');

import vue from 'vue'
window.Vue = vue;

import App from './views/App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import routes from './routers/router';
import VueMask from 'v-mask'

Vue.use(VueMask);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
	mode: 'history',
	base: '/',
	routes: routes
});

const app = new Vue({
	el: '#app',
	components: {App},
	router
});