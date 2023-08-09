import api from '@/service/api'

export default {
  state: {
    livro: {
      titulo: '',
      autor: '',
      editora: '',
      genero: '',
      ano: ''
    },
    livros: [],
    headers: [
      { text: '#', value: 'id', aling: 'start', sortable: 'false' },
      { text: 'Título', value: 'titulo', align: 'center' },
      { text: 'Autor', value: 'autor', align: 'center' },
      { text: 'Editora', value: 'editora', align: 'center' },
      { text: 'Ano', value: 'ano', align: 'center' },
      { text: 'Gênero', value: 'genero', align: 'center' },
      { text: 'Editar / Excluir', value: 'acao', align: 'center' }
    ],
    generos: ['Ação', 'Aventura', 'Comédia', 'Drama', 'Romance', 'Suspense']
  },
  getters: {
    GET_HEADERS: state => {
      return state.headers
    },
    GET_GENEROS: state => {
      return state.generos
    },
    GET_LIVROS: state => {
      return state.livros
    },
    GET_LIVRO: state => {
      return state.livro
    }
  },
  mutations: {
    SET_LIVROS: (state, payload) => {
      state.livros = payload
    },
    SET_LIVRO: (state, payload) => {
      state.livro = payload
    },
    CLEAR_LIVRO: (state) => {
      state.livro = {
        titulo: '',
        autor: '',
        editora: '',
        genero: '',
        ano: ''
      }
    }
  },
  actions: {
    // Método que busca no BD os livros e manda pra mutations setLivros, neste caso esta desempacotando o 'commit' do 'context' padrão
    BD_LIVROS_ALL ({ commit }) {
      api.get('livros')
        .then((response) => {
          commit('SET_LIVROS', response.data)
        })
    },

    // Método que adiciona no BD um livro recuperado da State ('GET_LIVRO') e aciona a função CLEAR_LIVRO para limpar o state atual
    // poderia usar context.getter e context.commit usando só context por parametros
    BD_LIVROS_ADD ({ getters, commit }) {
      api.post('livros/store', getters.GET_LIVRO)
        .then((response) => {
          commit('CLEAR_LIVRO')
          commit('SET_SNACK', { text: 'Livro Cadastrado com sucesso!', color: 'success' })
        })
    },

    // Método que remove do BD um livro recebendo o 'id' por parametro e logo após aciona o método 'BD_LIVROS_ALL' para atualizar o state de livros
    BD_LIVROS_DEL ({ dispatch, commit }, id) {
      api.delete('livros/' + id)
        .then(() => {
          dispatch('BD_LIVROS_ALL')
          commit('SET_SNACK', { text: 'Livro Excluído com sucesso!', color: 'error' })
        })
    },

    // Método que salva um livro editado pegando o 'livro atual' e mandando pra api update juntamente com o ID deste livro
    async BD_LIVROS_SAVE ({ getters, dispatch, commit }) {
      await api.post(`livros/update/${getters.GET_LIVRO.id}`, getters.GET_LIVRO)
        .then(() => {
          dispatch('BD_LIVROS_ALL')
          commit('SET_SNACK', { text: 'Livro Editado com sucesso!', color: 'blue' })
        })
    },

    async BD_LIVROS_PRINT ({ dispatch, commit }, id) {
      await api.post('livros/print/' + id)
        .then(() => {
          dispatch('BD_LIVROS_ALL')
          commit('SET_SNACK', { text: 'Livro Impresso com sucesso!', color: 'success' })
          console.log('passo aqui!')
        })
    }
  }
}
