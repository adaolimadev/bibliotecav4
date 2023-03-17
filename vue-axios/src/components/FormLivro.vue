<template>
    <div id="app" class="mt-4 ml-12 mr-12">
        <form @submit.prevent="createLivro()">
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
            color="primary"
            type="submit"
        >
            <v-icon left>
            mdi-check
            </v-icon>
            Cadastrar
        </v-btn>
        <router-link to="/">
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
      items: ['Ação', 'Aventura', 'Comédia', 'Drama', 'Romance', 'Suspense'],
      titulo: '',
      autor: '',
      editora: '',
      genero: '',
      ano: ''
    }
  },
  methods: {
    createLivro () {
      // Monsta um objeto livro com os dados do form
      const newLivro = {
        titulo: this.titulo,
        autor: this.autor,
        editora: this.editora,
        ano: this.ano,
        genero: this.genero
      }

      this.axios.post(`${this.baseUrl}livros/store`, newLivro)
      this.limparCampos()
    },
    limparCampos () {
      this.titulo = ''
      this.autor = ''
      this.editora = ''
      this.ano = ''
      this.genero = []
    }
  }
}
</script>

<style scoped>
</style>
