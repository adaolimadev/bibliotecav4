export default {
  state: {
    snack: {
      texto: '',
      cor: null,
      ativar: false
    },
    reset: {
      texto: '',
      cor: null,
      ativar: false
    }
  },

  getters: {
    GET_SNACK: state => {
      return state.snack
    },
    GET_RESET_SNACK: state => {
      return state.reset
    }
  },

  mutations: {
    SET_SNACK: (state, payload) => {
      state.snack.texto = payload.text
      state.snack.cor = payload.color
      state.snack.ativar = false
    },
    SET_OPEN: (state, payload) => {
      state.snack.ativar = payload
    }
  },

  actions: {
    CLEAR_SNACK ({ commit, getters }) {
      commit('SET_SNACK', getters.GET_RESET_SNACK)
    }
  }
}
