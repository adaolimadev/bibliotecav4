<template>
    <v-container class="col-md-10 mt-4" id="container-cad">
    <div class="mt-10">
      <v-data-table
        :headers="headers"
        :items="clientes"
        :items-per-page="10"
        class="elevation-2"
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
        <v-btn
              color="primary"
              dark
              class="mt-1 ml-2"
              @click="CLIENTES_GET_ALL"
          >
            <v-icon class="mr-1">mdi-plus</v-icon>
              teste
            </v-btn>
        </v-toolbar>
      </template>
      <template v-slot:[`item.acao`]="{ item }">
        <router-link :to="{ name: 'editcliente', params: {id: item.id} }">
          <v-btn small color="blue lighten-1">
            <v-icon size="big" > mdi-pencil-outline</v-icon>
          </v-btn>
        </router-link>
        <v-btn small color="red lighten-1" class="ml-2"  @click="deleteCliente(item.id)">
          <v-icon size="big"> mdi-delete-outline</v-icon>
        </v-btn>
      </template>
    </v-data-table>
  </div>
</v-container>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  name: 'TableLivro',
  data () {
    return {
      baseUrl: 'http://localhost:8000/public/api/',
      headers: [
        { text: '#', value: 'id', aling: 'start', sortable: 'false' },
        { text: 'Nome', value: 'nome', align: 'center' },
        { text: 'Email', value: 'email', align: 'center' },
        { text: 'CPF', value: 'cpf', align: 'center' },
        { text: 'Telefone', value: 'telefone', align: 'center' },
        { text: 'Editar / Excluir', value: 'acao', align: 'center' }
      ],
      clientes: []
    }
  },
  methods: {
    ...mapActions([
      'CLIENTES_GET_ALL'
    ]),
    async getClientes () {
      await this.axios.get(`${this.baseUrl}clientes`).then(
        (response) => {
          this.clientes = response.data
        }
      ).catch(
        (error) => {
          console.log(error)
        }
      )
    },
    async deleteCliente (id) {
      await this.axios.delete(`${this.baseUrl}clientes/${id}`)
      this.getClientes()
    }
  },
  async mounted () {
    await this.getClientes()

    this.$props.reload = this.$route.params.reload

    if (this.$props.reload === true) {
      this.$props.reload = false
      await this.getClientes()
    }
  },
  props: [
    'reload'
  ]
}
</script>
