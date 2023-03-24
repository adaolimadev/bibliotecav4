import api from '@/service/api'

export default {
  // define os atributos do Objeto Cliente
  state: {
    cliente: {
      nome: '',
      email: '',
      cpf: '',
      telefone: ''
    },
    clientes: []
  },
  getters: {
    // recupera uma cliente
    CLIENTES_GET_CLIENTE: state => {
      return state.cliente
    }
  },
  mutations: {
    CLIENTES_SET_CLIENTE (state, data) {
      state.cliente = data
    }
  },
  actions: {
    // função que adiciona um cliente (recuperado/get) ao BD
    CLIENTES_ADD ({ commit, getters }) {
      return api.post('clientes/store', getters.CLIENTES_GET_CLIENTE).then(
        (response) => {
          commit('CLIENTES_SET_CLIENTE', {
            nome: '',
            email: '',
            cpf: '',
            telefone: ''
          })
          return true
        }
      ).catch(
        (error) => {
          console.log(error)
        }
      )
    },
    // função que traz todos os clientes
    CLIENTES_ALL () {
      return api.get('clientes').then(
        (response) => {
          this.clientes = response.data
          return this.clientes
        }
      ).catch(
        (error) => {
          console.log(error)
        }
      )
    },

    // função que deleta um cliente
    // eslint-disable-next-line
    async CLIENTES_DELETE ({}, id) {
      return api.delete(`clientes/${id}`)
    },

    // rota clientes/get/{id} Não encontrava pq precisava de um desempacotamento
    // eslint-disable-next-line
    CLIENTES_ONE ({commit}, id) { 
      api.get(`clientes/get/${id}`).then(
        (response) => {
          commit('CLIENTES_SET_CLIENTE', response.data)
        }
      )
    },
    CLIENTES_UPDATE ({ getters }) {
      api.post(`update/${getters.CLIENTES_GET_CLIENTE.id}`, getters.CLIENTES_GET_CLIENTE)
    }

  }
}
