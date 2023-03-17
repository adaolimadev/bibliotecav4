<template>
  <v-app dark>
    <NavBar />
    <v-main id="main">
      <router-view/>
    </v-main>
    <FooTer />
  </v-app>
</template>

<script>
import NavBar from './components/NavBar.vue'
import FooTer from './components/FooTer.vue'
export default {
  name: 'App',
  components: {
    NavBar,
    FooTer
  }
}
</script>

<style>
h1{
  text-align: center;
}
#container-cad{
    background-color: whitesmoke;
    border-radius: 10px;
}
</style>
