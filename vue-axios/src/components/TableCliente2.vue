<template>
   <v-container class="col-md-10 mt-4" id="container-cad">
    <div class="mt-6">
        <h1>LISTA DE CLIENTES</h1>
        <v-data-table
        :headers="headers"
        :items="clientes"
        :items-per-page="10"
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
          <router-link :to="{ name: 'editcliente', params: {id: item.id} }">
            <v-btn small color="blue lighten-1">
              <v-icon size="big" > mdi-pencil-outline</v-icon>
            </v-btn>
          </router-link>
          <v-btn small color="red lighten-1" class="ml-2" @click="delete_(item.id)">
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
  name: 'TesteClientes',
  data: () => ({
    headers: [
      { text: '#', value: 'id', aling: 'start', sortable: 'false' },
      { text: 'Nome', value: 'nome', align: 'center' },
      { text: 'Email', value: 'email', align: 'center' },
      { text: 'CPF', value: 'cpf', align: 'center' },
      { text: 'Telefone', value: 'telefone', align: 'center' },
      { text: 'Editar / Excluir', value: 'acao', align: 'center' }
    ],
    clientes: []
  }),
  methods: {
    ...mapActions([
      'CLIENTES_ALL',
      'CLIENTES_DELETE'
    ]),
    async delete_ (id) {
      await this.CLIENTES_DELETE(id)
      this.clientes = await this.CLIENTES_ALL()
    }
  },
  async mounted () {
    this.clientes = await this.CLIENTES_ALL()
  }
}
</script>

<style scoped>
#nice{
    text-align: center;
}
</style>
