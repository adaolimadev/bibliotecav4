import axios from 'axios'
import baseUrl from './base_url'

// const token = sessionStorage.getItem('logado').token

const api = axios.create({
  baseURL: baseUrl,
  headers: {
    Accept: 'multipart/form-data',
    'Content-Type': 'multipart/form-data'
  }
})

export default api
