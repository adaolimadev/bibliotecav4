<template>
    <v-app>
      <NavBar />
      <v-main app id="main">
            <router-view />
      </v-main>
      <FooTer />
      <Snack />
    </v-app>
  </template>
<script>
import NavBar from '@/components/NavBar.vue'
import FooTer from '@/components/FooTer.vue'
import Snack from '@/components/SnackComponent'

export default {
  name: 'MainApp',
  components: {
    NavBar,
    FooTer,
    Snack
  }
}
</script>
