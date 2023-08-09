import Vue from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'

import axios from 'axios'
import VueAxios from 'vue-axios'
import store from './store'
import VueBarcode from 'vue-barcode'
// import { store } from './vuex'

Vue.config.productionTip = false

Vue.use(VueAxios, axios)

new Vue({
  router,
  vuetify,
  store,
  VueBarcode,
  render: h => h(App)
}).$mount('#app')
