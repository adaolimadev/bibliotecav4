<template>
  <div>
    <v-container class="col-md-6 mt-4" id="container-cad">
      <template v-if="GET_CLIENTE.id">
          <h1>EDITAR CLIENTE</h1>
      </template>
      <template v-else>
          <h1>CADASTRAR CLIENTE</h1>
      </template>
      <div id="app" class="mt-4 ml-12 mr-12">
        <v-text-field
            v-model="GET_CLIENTE.nome"
            label="Nome"
            required
        ></v-text-field>

        <v-text-field
            v-model="GET_CLIENTE.email"
            label="Email"
            required
        ></v-text-field>

        <v-text-field
            v-model="GET_CLIENTE.cpf"
            label="CPF"
            required
        ></v-text-field>

        <v-text-field
            v-model="GET_CLIENTE.telefone"
            label="Telefone"
            required
        ></v-text-field>
        <v-row
            justify="space-around"
            class="mt-4 mb-2"
        >
        <template v-if="GET_CLIENTE.id">
                    <v-btn
                        color="primary"
                        @click="editar()"
                    >
                        <v-icon left>mdi-check</v-icon>
                        Salvar
                    </v-btn>
                </template>
                <template v-else>
                    <v-btn
                        color="primary"
                        @click="cadastrar()"
                    >
                        <v-icon left>mdi-check</v-icon>
                        Cadastrar
                    </v-btn>
                </template>
          <v-btn
              color="error"
              @click="voltar()"
          >
              <v-icon left>
              mdi-close
              </v-icon>
              Cancelar
          </v-btn>
        </v-row>
    </div>
    </v-container>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  name: 'FormCliente',
  computed: {
    ...mapGetters([
      'GET_CLIENTE',
      'GET_HEADERS_CLIENTES'
    ])
  },
  methods: {
    ...mapActions([
      'BD_CLIENTES_ADD'
    ]),
    voltar () {
      this.$router.push('listcliente')
    },
    cadastrar () {
      this.BD_CLIENTES_ADD()
      this.$root.$emit('SNACK_OPEN')
    }
  }
}
</script>
