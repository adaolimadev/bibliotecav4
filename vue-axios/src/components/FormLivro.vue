<template>
    <div id="app" class="mt-4 ml-12 mr-12">
        <v-text-field
            v-model="LIVROS_GET_LIVRO.titulo"
            label="Título"
            required
        ></v-text-field>

        <v-text-field
            v-model="LIVROS_GET_LIVRO.autor"
            label="Autor"
            required
        ></v-text-field>

        <v-text-field
            v-model="LIVROS_GET_LIVRO.editora"
            label="Editora"
            required
        ></v-text-field>

        <v-text-field
            v-model="LIVROS_GET_LIVRO.ano"
            label="Ano"
            required
        ></v-text-field>

        <v-select
            v-model="LIVROS_GET_LIVRO.genero"
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
            @click="LIVROS_ADD"
        >
            <v-icon left>mdi-check</v-icon>
            Cadastrar
        </v-btn>
        <router-link to="/listlivro">
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
  name: 'FormLivro',
  data () {
    return {
      items: ['Ação', 'Aventura', 'Comédia', 'Drama', 'Romance', 'Suspense']
    }
  },
  computed: {
    ...mapGetters([
      'LIVROS_GET_LIVRO'
    ])
  },
  methods: {
    ...mapActions([
      'LIVROS_ADD'
    ])
  }
}
</script>
