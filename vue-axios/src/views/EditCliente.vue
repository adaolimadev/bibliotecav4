<template>
<v-container class="col-md-6 mt-4" id="container-cad">
    <h1>EDITAR CLIENTE </h1>
    <div id="app" class="mt-4 ml-12 mr-12">
        <form @submit.prevent="atualizarCliente()">
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
            Atualizar
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
</v-container>
</template>

<script>
export default {
  data () {
    return {
      baseUrl: 'http://localhost:8000/public/api/',
      idCliente: '',
      nome: '',
      email: '',
      cpf: '',
      telefone: ''
    }
  },
  methods: {
    async carregarCliente (id) {
      this.axios.get(`${this.baseUrl}clientes/get/${id}`).then(
        (response) => {
          this.nome = response.data.nome
          this.email = response.data.email
          this.cpf = response.data.cpf
          this.telefone = response.data.telefone
        }
      ).catch(
        (error) => {
          console.log(error)
        }
      )
    },

    async atualizarCliente () {
      const upCliente = {
        nome: this.nome,
        email: this.email,
        cpf: this.cpf,
        telefone: this.telefone
      }
      this.axios.post(`${this.baseUrl}clientes/update/${this.idCliente}`, upCliente)

      this.$router.push({ name: 'listcliente', params: { reload: true } })
    }
  },
  mounted () {
    // Pega o ID que foi passado pela rota junto com o botao delete
    this.idCliente = (this.$route.params.id)
    console.log(`Chegou o ID: ${this.idCliente}`)
    this.carregarCliente(this.idCliente)
  }
}
</script>
