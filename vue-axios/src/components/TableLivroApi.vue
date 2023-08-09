<template>
    <v-container class="col-md-10 mt-4" id="container-cad">
    <div>
      <v-data-table
        :headers="GET_HEADERS"
        :items="GET_LIVROS"
        class="elevation-2 mt-4"
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
        <v-btn small  class="ml-2" @click="openBarcode(item)">
          <v-icon size="big"> mdi-barcode</v-icon>
        </v-btn>
        <v-btn small color="blue lighten-1 ml-2" @click="editar(item)">
          <v-icon size="big" > mdi-pencil-outline</v-icon>
        </v-btn>
        <v-btn small color="red lighten-1" class="ml-2" @click="deletar(item.id)">
          <v-icon size="big"> mdi-delete-outline</v-icon>
        </v-btn>
      </template>
    </v-data-table>
  </div>
</v-container>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from 'vuex'
export default {
  data () {
    return {
      dialog: false
    }
  },
  name: 'TableLivroApi',
  computed: {
    ...mapGetters(['GET_HEADERS', 'GET_LIVROS', 'GET_LIVRO'])
  },
  methods: {
    ...mapActions([
      'BD_LIVROS_ALL',
      'BD_LIVROS_DEL',
      'BD_LIVROS_PRINT'
    ]),
    ...mapMutations([
      'SET_LIVRO',
      'SET_SNACK'
    ]),
    deletar (id) {
      this.BD_LIVROS_DEL(id)
      setTimeout(() => { this.$root.$emit('SNACK_OPEN') }, 500)
    },
    editar (livro) {
      this.SET_LIVRO(livro)
      this.$router.push('editlivro')
    },
    openBarcode () {
      // this.$router.push('Print')
    }
  },
  mounted () {
    this.BD_LIVROS_ALL()
  }
}
</script>
<style scoped>

</style>
