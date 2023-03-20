<template>
    <div id="app" class="mt-4 ml-12 mr-12">
        <form @submit.prevent="createCliente()">
        <v-text-field
            v-model="nome"
            label="Nome"
            required
        ></v-text-field>

        <v-text-field
            v-model="email"
            label="Email"
            required
        ></v-text-field>

        <v-text-field
            v-model="cpf"
            label="CPF"
            required
        ></v-text-field>

        <v-text-field
            v-model="telefone"
            label="Telefone"
            required
        ></v-text-field>
        <v-row
            justify="space-around"
            class="mt-4 mb-2"
        >
        <v-btn
            color="primary"
            type="submit"
        >
            <v-icon left>
            mdi-check
            </v-icon>
            Cadastrar
        </v-btn>
        <router-link to="/listcliente">
          <v-btn
              color="error"
          >
              <v-icon left>
              mdi-close
              </v-icon>
              Cancelar
          </v-btn>
        </router-link>
        </v-row>
        </form>
    </div>
</template>

<script>
export default {
  name: 'FormLivro',
  data () {
    return {
      baseUrl: 'http://localhost:8000/public/api/',
      nome: '',
      email: '',
      cpf: '',
      telefone: ''
    }
  },
  methods: {
    createCliente () {
      const newCliente = {
        nome: this.nome,
        email: this.email,
        cpf: this.cpf,
        telefone: this.telefone
      }
      console.log(newCliente)
      this.axios.post(`${this.baseUrl}clientes/store`, newCliente)
      this.limparCampos()
    },
    limparCampos () {
      this.nome = ''
      this.email = ''
      this.cpf = ''
      this.telefone = ''
      this.datanasc = ''
    }
  }
}
</script>
<style scoped>
</style>
