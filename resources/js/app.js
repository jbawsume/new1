require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueApollo from 'vue-apollo';
import App from './components/App.vue'

import ApolloClient from "apollo-boost";

Vue.use(VueApollo);
Vue.use(VueRouter)

const apolloProvider = new VueApollo({
  defaultClient: new ApolloClient({
    uri: "graphql"
  })
});


//import Routes from './router.js';
//import Home from './components/Home.vue'
//import Book from './components/Book.vue'
//const Foo = { template: '<div>foo</div>' }

const Home = Vue.component('home', require('./components/Home.vue').default);
const Book = Vue.component('book', require('./components/Book.vue').default);

//const Home = Vue.component("home", () => import("./components/Home.vue").default);


//let Home = require('./components/Home.vue').default;
//let Book = require('./components/Book.vue').default;

const routes = [
    { path: '/', component: Home },
    { path: '/books', component: Book }
  ]

const router = new VueRouter({
    //mode: 'history',
    //base: process.env.BASE_URL,
    //base: "localhost/new1/public",
    routes // short for `routes: routes`
  })


Vue.config.productionTip = false

const app = new Vue({
    el:'#app',
    apolloProvider,
    router,
    ...App
}).$mount('#app');
