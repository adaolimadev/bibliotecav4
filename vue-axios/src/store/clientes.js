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
    clientes: [],
    headers: [
      { text: '#', value: 'id', aling: 'start', sortable: 'false' },
      { text: 'Nome', value: 'nome', align: 'center' },
      { text: 'Email', value: 'email', align: 'center' },
      { text: 'CPF', value: 'cpf', align: 'center' },
      { text: 'Telefone', value: 'telefone', align: 'center' },
      { text: 'Editar / Excluir', value: 'acao', align: 'center' }
    ]
  },
  getters: {
    // recupera uma cliente
    GET_CLIENTE: state => {
      return state.cliente
    },
    GET_CLIENTES: state => {
      return state.clientes
    },
    GET_HEADERS_CLIENTES: state => {
      return state.headers
    }
  },
  mutations: {
    SET_CLIENTE (state, payload) {
      state.cliente = payload
    },
    SET_CLIENTES (state, payload) {
      state.clientes = payload
    },
    CLEAR_CLIENTE: (state) => {
      state.cliente = {
        nome: '',
        email: '',
        cpf: '',
        telefone: ''
      }
    }
  },
  actions: {
    // função que traz todos os clientes
    BD_CLIENTES_ALL ({ commit }) {
      api.get('clientes').then(
        (response) => {
          commit('SET_CLIENTES', response.data)
        }
      ).catch(
        (error) => {
          console.log(error)
        }
      )
    },

    BD_CLIENTES_ADD ({ getters, commit }) {
      api.post('clientes/store', getters.GET_CLIENTE)
        .then(() => {
          commit('CLEAR_CLIENTE')
        })
    },

    BD_CLIENTES_DEL ({ dispatch }, id) {
      api.delete(`clientes/${id}`)
        .then(() => {
          dispatch('BD_CLIENTES_ALL')
        })
    },

    BD_CLIENTES_SAVE ({ getters, dispatch }) {
      api.post(`clientes/update/${getters.GET_CLIENTE.id}`, getters.GET_CLIENTE)
        .then(() => {
          dispatch('BD_CLIENTES_ALL')
        })
    }
  }
}
