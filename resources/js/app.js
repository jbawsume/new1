require('./bootstrap');

import Vue from 'vue';
import Articles from './components/articles.vue'
import Navbar from './components/navbar.vue'

Vue.component('articles',Articles);
Vue.component('navbar',Navbar);


const app = new Vue({
	el: '#app'
});
