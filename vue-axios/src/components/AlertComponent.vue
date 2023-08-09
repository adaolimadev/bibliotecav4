<template>
    <v-container class="col-md-6 mt-2 text-center">
            <v-alert
                v-show="alerta"
                dense
                dismissible
                elevation="2"
                :type="tipo"
                transition="scale-transition"
                >{{objeto}} {{acao}} com sucesso!</v-alert>
        </v-container>
</template>
<script>
export default {
  data () {
    return {
      alerta: false
    }
  },
  props: {
    objeto: String,
    acao: String,
    tipo: String
  },
  created () {
    this.$root.$on('ALERT_OPEN', () => {
      this.alerta = true
      setTimeout(() => { this.alerta = false }, 4000)
    })
  },
  beforeCreated () {
    this.$root.$off('ALERT_OPEN')
  }
}
</script>
