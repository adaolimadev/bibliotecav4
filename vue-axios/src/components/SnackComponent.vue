<template>
    <div class="text-center ma-2">
      <v-snackbar
        top
        v-model="snackbar"
        timeout="3000"
        :color="GET_SNACK.color"
      >
      <v-icon color="success" class="mr-1">mdi-check-circle</v-icon>
        <span>{{ GET_SNACK.texto }}</span>
        <template v-slot:action="{ attrs }">
          <v-btn
            color="dark"
            text
            v-bind="attrs"
            @click="snackbar = false"
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
  data: () => ({
    snackbar: false
  }),
  computed: {
    ...mapGetters([
      'GET_SNACK'
    ])
  },
  actions: {
    ...mapMutations([
      'SET_SNACK'
    ])
  },
  created () {
    this.$root.$on('SNACK_OPEN', () => {
      this.snackbar = !this.snackbar
    })
  },
  beforeCreated () {
    this.$root.$off('SNACK_OPEN')
  }
}
</script>
