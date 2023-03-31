<template>
   <v-container class="col-md-10 mt-4" id="container-cad">
    <div>
        <v-data-table
        :headers="GET_HEADERS_CLIENTES"
        :items="GET_CLIENTES"
        class="elevation-2 mt-4"
      >
      <template v-slot:top>
        <v-toolbar flat >
          <v-toolbar-title>CLIENTES</v-toolbar-title>
        <v-divider class="mx-4" inset vertical ></v-divider>
        <router-link to="/cadcliente">
          <v-btn
              color="primary"
              dark
              class="mt-1"
          >
            <v-icon class="mr-1">mdi-plus</v-icon>
              NOVO CLIENTE
            </v-btn>
        </router-link>
          </v-toolbar>
        </template>
        <template v-slot:[`item.acao`]="{ item }">
            <v-btn small color="blue lighten-1" @click="editar(item)">
              <v-icon size="big" > mdi-pencil-outline</v-icon>
            </v-btn>
          <v-btn small color="red lighten-1" class="ml-2" @click="delete_(item.id)">
            <v-icon size="big"> mdi-delete-outline</v-icon>
          </v-btn>
        </template>
      </v-data-table>
    </div>
  </v-container>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from 'vuex'
export default {
  name: 'TesteClientes',
  computed: {
    ...mapGetters([
      'GET_CLIENTES',
      'GET_HEADERS_CLIENTES'
    ])
  },
  methods: {
    ...mapActions([
      'BD_CLIENTES_ALL',
      'BD_CLIENTES_DEL'
    ]),
    ...mapMutations([
      'SET_CLIENTE'
    ]),
    delete_ (id) {
      this.BD_CLIENTES_DEL(id)
    },
    editar (cliente) {
      this.SET_CLIENTE(cliente)
      this.$router.push('editcliente')
    }
  },
  mounted () {
    this.BD_CLIENTES_ALL()
  }
}
</script>
