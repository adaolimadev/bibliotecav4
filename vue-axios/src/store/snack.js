export default {
  state: {
    snack: {
      texto: 'testsete',
      cor: null
    }
  },

  getters: {
    GET_SNACK: state => {
      return state.snack
    }
  },

  mutations: {
    SET_SNACK: (state, text, color) => {
      state.texto = text
      state.cor = color
    }
  },

  actions: {
    abrir () {}
  }
}
