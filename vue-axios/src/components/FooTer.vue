<template>
    <v-footer
    app
    color="deep-purple"
    dark
>
      <v-row justify="center" no-gutters>
        <v-col class="text-center mt-4" cols="12">
          {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
        </v-col>
      </v-row>
    </v-footer>
</template>

<script>
export default {
  name: 'FooTer'
}
</script>
