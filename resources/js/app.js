require('./bootstrap');

import vue from 'vue'
window.Vue = vue;

import App from './views/App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import routes from './routers/router';


Vue.use(VueRouter)
Vue.use(VueAxios, axios);
const router = new VueRouter({
	mode: 'history',
	base: '/testes/businessman-record/public/',
	routes: routes
});

const app = new Vue({
	el: '#app',
	components: {App},
	router
});