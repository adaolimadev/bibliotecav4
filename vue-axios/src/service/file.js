import axios from 'axios'
import baseUrl from './base_url'

// const token = sessionStorage.getItem('logado').token

// const api = axios.create({
//   baseURL: baseUrl,
//   headers: {
//     Accept: 'multipart/form-data',
//     'Content-Type': 'multipart/form-data'
//   }
// })

const file = async (url, value) => {
  const options = {
    method: 'POST',
    url: baseUrl + url,
    headers: {
      Accept: 'application/json',
      'Content-Type': 'multipart/form-data'
    },
    data: value
  }
  return await axios.request(options)
}

export default file
