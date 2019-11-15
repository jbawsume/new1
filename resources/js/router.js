import Vue from 'vue'
import Router from 'vue-router'
import Home from './components/Home.vue'

Vue.use(Router)

export default new Router({
  mode:'history',
  base: process.env.Base_URL,
  routes: [
    {
      path: "/",
      name: 'home',
      component: Home
    },
    {
      path: "/books",
      name: 'book',
      component: () => import('./components/Book.vue')
    },

  ]
})
