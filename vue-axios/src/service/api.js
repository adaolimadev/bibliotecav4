import axios from 'axios'
import baseUrl from './base_url'

// const token = sessionStorage.getItem('logado').token

const api = axios.create({
  baseURL: baseUrl,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json'
  }
})

export default api
