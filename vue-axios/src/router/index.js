import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CadLivro from '../views/CadLivro.vue'
import EditLivro from '../views/EditLivro.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/cadlivro',
    name: 'cadlivro',
    component: CadLivro
  },
  {
    path: '/editlivro',
    name: 'editlivro',
    component: EditLivro
  }
]

const router = new VueRouter({
  routes
})

export default router
