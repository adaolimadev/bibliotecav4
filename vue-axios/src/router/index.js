import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from '@/layout/MainApp.vue'
import CadLivro from '../views/CadLivro.vue'
import EditLivro from '../views/EditLivro.vue'
import ListLivro from '../views/ListLivro.vue'
import ListCliente from '../views/ListCliente.vue'
import CadCliente from '../views/CadCliente.vue'
import EditClienteApi from '../views/EditClienteApi.vue'
import PrintEtiquetaBalflex from '../views/PrintEtiquetaBalflex.vue'
import PrintEtiquetaFragil from '../views/PrintEtiquetaFragil.vue'
import UploadFile from '../views/UploadPdf.vue'
import HomeView from '../views/HomeView.vue'
import SendMail from '../views/SendMail.vue'

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
          path: '/home',
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
        },
        {
          path: '/upload',
          name: 'upload',
          component: UploadFile
        },
        {
          path: '/mail',
          name: 'mail',
          component: SendMail
        }
      ]
    },
    {
      path: '/print-balflex',
      name: 'print-balflex',
      component: PrintEtiquetaBalflex
    },
    {
      path: '/print-fragil',
      name: 'print-fragil',
      component: PrintEtiquetaFragil
    }
  ]
})

export default router
