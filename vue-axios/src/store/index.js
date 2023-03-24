import Vue from 'vue'
import Vuex from 'vuex'

import livros from './livros'
import clientes from './clientes'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    Livros: livros,
    Clientes: clientes
  }
})
