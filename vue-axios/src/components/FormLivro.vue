<template>
    <div>
        <Alert objeto="Livro" acao="cadastrado" tipo="success"/>
        <v-container class="col-md-6" id="container-cad">
            <div id="app" class="mt-4 mr-8 ml-8">
                <v-text-field
                v-model="GET_LIVRO.titulo"
                label="Título"
                required
                ></v-text-field>

                <v-text-field
                    v-model="GET_LIVRO.autor"
                    label="Autor"
                    required
                ></v-text-field>

                <v-text-field
                    v-model="GET_LIVRO.editora"
                    label="Editora"
                    required
                ></v-text-field>

                <v-text-field
                    v-model="GET_LIVRO.ano"
                    label="Ano"
                    required
                ></v-text-field>

                <v-select
                    v-model="GET_LIVRO.genero"
                    :items="GET_GENEROS"
                    label="Gênero"
                    required
                ></v-select>

                <v-row
                    justify="space-around"
                    class="mt-4 mb-2"
                >
                <template v-if="GET_LIVRO.id">
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
                @click="voltar()"
                    color="error"
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
import Alert from '../components/AlertComponent.vue'

export default {
  name: 'FormLivro',
  components: {
    Alert
  },
  computed: {
    ...mapGetters([
      'GET_LIVRO',
      'GET_GENEROS'
    ])
  },
  methods: {
    ...mapActions([
      'BD_LIVROS_ADD',
      'BD_LIVROS_SAVE'
    ]),
    cadastrar () {
      this.BD_LIVROS_ADD()
      this.$root.$emit('ALERT_OPEN')
    },
    editar () {
      console.log(this.GET_LIVRO)
      this.BD_LIVROS_SAVE()
      // this.$root.$emit('ALERT_OPEN')
      this.$router.push('listlivro')
    },
    voltar () {
      this.$router.push('listlivro')
    }
  }
}
</script>
