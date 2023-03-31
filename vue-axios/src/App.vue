<template>
  <v-app dark>
    <NavBar />
    <v-main id="main">
      <router-view/>
    </v-main>
    <FooTer/>
    <Snack/>
  </v-app>
</template>

<script>
import NavBar from './components/NavBar.vue'
import FooTer from './components/FooTer.vue'
import Snack from '@/components/SnackComponent'

export default {
  name: 'App',
  components: {
    NavBar,
    FooTer,
    Snack
  }
}
</script>

<style>
h1, p{
  text-align: center;
}
#container-cad{
    background-color: whitesmoke;
    border-radius: 10px;
}
</style>
