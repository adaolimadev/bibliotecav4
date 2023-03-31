<template>
    <div>
        <FormCliente/>
    </div>
</template>
<script>
import FormCliente from '../components/FormCliente.vue'
import { mapMutations } from 'vuex'
export default {
  name: 'CadCliente',
  components: {
    FormCliente
  },
  methods: {
    ...mapMutations([
      'CLEAR_CLIENTE'
    ])
  },
  created () {
    this.CLEAR_CLIENTE()
  }
}
</script>
