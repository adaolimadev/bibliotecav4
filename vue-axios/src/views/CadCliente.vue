<template>
    <div>
        <v-container class="col-md-6 mt-4" id="container-cad">
            <h1>CADASTRAR CLIENTE</h1>
            <FormCliente/>
        </v-container>
    </div>
</template>
<script>
import FormCliente from '../components/FormCliente.vue'
export default {
  name: 'CadCliente',
  components: {
    FormCliente
  }
}
</script>
