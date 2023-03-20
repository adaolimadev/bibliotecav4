<template>
    <div>
        <v-container class="col-md-6 mt-4" id="container-cad">
            <h1>EDITAR LIVRO </h1>
            <div id="app" class="mt-4 ml-12 mr-12">
        <form>
        <v-text-field
            v-model="titulo"
            label="Título"
            required
        ></v-text-field>

        <v-text-field
            v-model="autor"
            label="Autor"
            required
        ></v-text-field>

        <v-text-field
            v-model="editora"
            label="Editora"
            required
        ></v-text-field>

        <v-text-field
            v-model="ano"
            label="Ano"
            required
        ></v-text-field>

        <v-select
            v-model="genero"
            :items="items"
            label="Gênero"
            required
        ></v-select>

        <v-row
            justify="space-around"
            class="mt-4 mb-2"
        >
        <v-btn
            tile
            color="primary"
            @click="atualizarLivro()"
        >
            <v-icon left>
            mdi-pencil
            </v-icon>
            Alterar
        </v-btn>
        <router-link to="/">
          <v-btn
              tile
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
    </div>
</template>
<script>

export default {
  name: 'EditLivro',
  data () {
    return {
      baseUrl: 'http://localhost:8000/public/api/',
      // preencher com as informações do Objeto
      idLivro: '',
      titulo: '',
      autor: '',
      editora: '',
      ano: '',
      genero: '',
      items: ['Ação', 'Aventura', 'Comédia', 'Drama', 'Romance', 'Suspense']
    }
  },
  methods: {

    async carregarLivro (id) {
      this.axios.get(`${this.baseUrl}livros/get/${id}`).then(
        (response) => {
          this.titulo = response.data.titulo
          this.autor = response.data.autor
          this.editora = response.data.editora
          this.ano = response.data.ano
          this.genero = response.data.genero
        }
      )
    },

    async atualizarLivro () {
      const upLivro = {
        titulo: this.titulo,
        autor: this.autor,
        editora: this.editora,
        ano: this.ano,
        genero: this.genero
      }
      this.axios.post(`${this.baseUrl}livros/update/${this.idLivro}`, upLivro)
      this.$router.push({ name: 'listlivro', params: { reload: true } })
    }
  },
  mounted () {
    // Faz a atribuição do ID livro que vem por parametro da rota
    this.idLivro = parseInt(this.$route.params.id)
    console.log(`Chegou o ID: ${this.idLivro}`)

    this.carregarLivro(this.idLivro)
  }
}
</script>

<style scoped>

</style>
