import api from '@/service/api'

export default {
  state: {
    livro: {
      titulo: '',
      autor: '',
      editora: '',
      genero: '',
      ano: ''
    }
  },
  getters: {
    LIVROS_GET_LIVRO: state => {
      return state.livro
    }
  },
  mutations: {
    LIVROS_SET_LIVRO (state, data) {
      state.livro = data
    }
  },
  actions: {
    LIVROS_ADD ({ commit, getters }) {
      return api.post('livros/store', getters.LIVROS_GET_LIVRO).then(
        (response) => {
          commit('LIVROS_SET_LIVRO', {
            titulo: '',
            autor: '',
            editora: '',
            genero: '',
            ano: ''
          })

          return true
        }
      ).catch(
        (error) => {
          console.log(error)
        }
      )
    }
  }
}
