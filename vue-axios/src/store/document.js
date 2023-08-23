export default {
  state: {
    list: [],
    document: {
      data: '',
      usercadastrou: '',
      obs: '',
      ispdf: '',
      codpessoa: '',
      image: ''
    }
  },
  mutations: {
    DOCUMENT_SET_LIST (state, event) {
      state.list = event
    }
  },
  getters: {
    DOCUMENT_GET_LIST: state => {
      return state.list
    }
  },
  actions: {}
}
