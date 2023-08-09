import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from '@/layout/MainApp.vue'
import CadLivro from '../views/CadLivro.vue'
import EditLivro from '../views/EditLivro.vue'
import ListLivro from '../views/ListLivro.vue'
import ListCliente from '../views/ListCliente.vue'
import CadCliente from '../views/CadCliente.vue'
import EditClienteApi from '../views/EditClienteApi.vue'
import PrintEtiqueta from '../views/PrintEtiqueta.vue'
import UploadFile from '../views/UploadPdf.vue'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: Main,
      component: Main,
      children: [
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
        },
        {
          path: '/upload',
          name: 'upload',
          component: UploadFile
        }
      ]
    },
    {
      path: '/print',
      name: 'Print',
      component: PrintEtiqueta
    }
  ]
})

export default router
