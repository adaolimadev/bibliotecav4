<template>
    <div>
            <FormLivro/>
    </div>
</template>
<script>
import FormLivro from '../components/FormLivro.vue'
import { mapMutations } from 'vuex'
export default {
  name: 'CadLivro',
  components: {
    FormLivro
  },
  methods: {
    ...mapMutations([
      'CLEAR_LIVRO'
    ])
  },
  created () {
    this.CLEAR_LIVRO()
  }
}
</script>
