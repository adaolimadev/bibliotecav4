<template>
    <div class="text-center ma-2">
      <v-snackbar
        top
        v-model="GET_SNACK.ativar"
        timeout="3000"
        :color=GET_SNACK.cor
      >
      <v-icon class="mr-1">mdi-check-circle</v-icon>
        <span>{{ GET_SNACK.texto }}</span>
        <template v-slot:action="{ attrs }">
          <v-btn
            color="white"
            text
            v-bind="attrs"
            @click="fechar()"
          >
          fechar
          </v-btn>
        </template>
      </v-snackbar>
    </div>
  </template>
<script>
import { mapMutations, mapGetters } from 'vuex'
export default {
  name: 'SnackComponent',
  data: () => ({}),
  computed: {
    ...mapGetters([
      'GET_SNACK'
    ])
  },
  watch: {

  },
  actions: {
    ...mapMutations([
      'SET_SNACK',
      'SET_OPEN'
    ])
  },
  methods: {
    fechar () {
      // this.SET_OPEN(false)
      this.$store.commit('SET_OPEN', false)
    }
  }
}
</script>
