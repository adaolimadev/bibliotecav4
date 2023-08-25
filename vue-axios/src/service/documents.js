import api from './file'

export default {
  // store (event) {
  //   return api.post('documents/upload', event)
  // },
  mail (event) {
    return api('documents/mail', event)
  }
}
