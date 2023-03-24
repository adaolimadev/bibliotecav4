<template>
<v-container class="col-md-6 mt-4" id="container-cad">
    <h1>EDITAR CLIENTE </h1>
    <div id="app" class="mt-4 ml-12 mr-12">
        <form >
        <v-text-field
            label="Nome"
            required
            v-model="CLIENTES_GET_CLIENTE.nome"
        ></v-text-field>

        <v-text-field
            label="Email"
            required
            v-model="CLIENTES_GET_CLIENTE.email"
        ></v-text-field>

        <v-text-field
            label="CPF"
            required
            v-model="CLIENTES_GET_CLIENTE.cpf"
        ></v-text-field>

        <v-text-field
            label="Telefone"
            required
            v-model="CLIENTES_GET_CLIENTE.telefone"
        ></v-text-field>
        <v-row
            justify="space-around"
            class="mt-4 mb-2"
        >
        <v-btn
            color="primary"
            type="submit"
            @click="atualizar"
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
import { mapActions, mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters([
      'CLIENTES_GET_CLIENTE'
    ])
  },
  methods: {
    ...mapActions([
      'CLIENTES_ONE',
      'CLIENTES_UPDATE'
    ]),

    async carregaCliente (id) {
      await this.CLIENTES_ONE(id)
    },

    async atualizar () {
      await this.CLIENTES_UPDATE(this.CLIENTES_GET_CLIENTE)
      // return this.$router.push('/clientes')
    }

  },
  async mounted () {
    // Pega o ID que foi passado pela rota junto com o botão
    console.log(`Chegou o ID: ${this.$route.params.id}`)
    await this.carregaCliente(this.$route.params.id)
  }
}
</script>
