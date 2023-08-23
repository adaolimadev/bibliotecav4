<template>
    <v-container class="col-md-10 mt-4" >
    <div class="mt-10">
      <v-data-table
        :headers="headers"
        :items="livros"
        :items-per-page="5"
        class="elevation-2"
      >
      <template v-slot:top>
        <v-toolbar flat >
          <v-toolbar-title>LIVROS</v-toolbar-title>
        <v-divider class="mx-4" inset vertical ></v-divider>
        <router-link to="/cadlivro">
          <v-btn
              color="primary"
              dark
              class="mt-1"
          >
            <v-icon class="mr-1">mdi-plus</v-icon>
              Novo Livro
            </v-btn>
        </router-link>
        </v-toolbar>
      </template>
      <template v-slot:[`item.acao`]="{ item }">
        <router-link :to="{ name: 'editlivro', params: {id: item.id} }">
          <v-btn small color="blue lighten-1">
            <v-icon size="big" > mdi-pencil-outline</v-icon>
          </v-btn>
        </router-link>
        <v-btn small color="red lighten-1" class="ml-2"  @click="deleteLivro(item.id)">
          <v-icon size="big"> mdi-delete-outline</v-icon>
        </v-btn>
      </template>
    </v-data-table>
  </div>
</v-container>
</template>

<script>
export default {
  name: 'TableLivro',
  data () {
    return {
      baseUrl: 'http://localhost:8000/public/api/',
      headers: [
        { text: '#', value: 'id', aling: 'start', sortable: 'false' },
        { text: 'Título', value: 'titulo', align: 'center' },
        { text: 'Autor', value: 'autor', align: 'center' },
        { text: 'Editora', value: 'editora', align: 'center' },
        { text: 'Ano', value: 'ano', align: 'center' },
        { text: 'Gênero', value: 'genero', align: 'center' },
        { text: 'Editar / Excluir', value: 'acao', align: 'center' }
      ],
      livros: []
    }
  },
  methods: {
    getLivros () {
      // Faz a conexão com o json trazendo somente 'data' que são os objetos Livro
      this.axios.get(`${this.baseUrl}livros`).then(
        (response) => {
          this.livros = response.data
        }
      ).catch(
        (error) => {
          console.log(error)
        }
      )
    },
    async deleteLivro (id) {
      await this.axios.delete(
        `${this.baseUrl}livros/${id}`
      )

      this.getLivros()
    }
  },
  async mounted () {
    await this.getLivros()

    this.$props.reload = this.$route.params.reload

    if (this.$props.reload === true) {
      this.$props.reload = false
      await this.getLivros()
    }
  },
  props: [
    'reload'
  ]
}
</script>
