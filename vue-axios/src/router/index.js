import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CadLivro from '../views/CadLivro.vue'
import EditLivro from '../views/EditLivro.vue'
import ListLivro from '../views/ListLivro.vue'
import ListCliente from '../views/ListCliente.vue'
import CadCliente from '../views/CadCliente.vue'
import EditClienteApi from '../views/EditClienteApi.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/listlivro',
    name: 'listlivro',
    component: ListLivro
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
  },
  {
    path: '/listcliente',
    name: 'listcliente',
    component: ListCliente
  },
  {
    path: '/cadcliente',
    name: 'cadcliente',
    component: CadCliente
  },
  {
    path: '/editcliente',
    name: 'editcliente',
    component: EditClienteApi
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router
