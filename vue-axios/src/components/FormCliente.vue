<template>
    <div id="app" class="mt-4 ml-12 mr-12">
        <v-text-field
            v-model="CLIENTES_GET_CLIENTE.nome"
            label="Nome"
            required
        ></v-text-field>

        <v-text-field
            v-model="CLIENTES_GET_CLIENTE.email"
            label="Email"
            required
        ></v-text-field>

        <v-text-field
            v-model="CLIENTES_GET_CLIENTE.cpf"
            label="CPF"
            required
        ></v-text-field>

        <v-text-field
            v-model="CLIENTES_GET_CLIENTE.telefone"
            label="Telefone"
            required
        ></v-text-field>
        <v-row
            justify="space-around"
            class="mt-4 mb-2"
        >
        <v-btn
            color="primary"
            @click="CLIENTES_ADD"
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
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  name: 'FormCliente',
  computed: {
    ...mapGetters([
      'CLIENTES_GET_CLIENTE'
    ])
  },
  methods: {
    ...mapActions([
      'CLIENTES_ADD'
    ])
  }
}
</script>
