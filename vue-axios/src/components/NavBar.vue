<template>
<v-app-bar
    app
    color="deep-purple"
    dark
>
    <div class="d-flex align-center">
    <v-img
        alt="Vuetify Logo"
        class="shrink mr-2"
        contain
        src="https://cdn.vuetifyjs.com/images/logos/vuetify-logo-dark.png"
        transition="scale-transition"
        width="40"
    />

    <v-img
        alt="Vuetify Name"
        class="shrink mt-1 hidden-sm-and-down"
        contain
        min-width="100"
        src="https://cdn.vuetifyjs.com/images/logos/vuetify-name-dark.png"
        width="100"
    />
    </div>
    <span class="ml-4">BIBLIOTECA v4</span>

    <v-spacer></v-spacer>
    <router-link to="/home">
    <v-btn
    target="_blank"
    text
    class="ml-2"
    >
    <v-icon>mdi-home-circle</v-icon>
    <span class="mr-2">Home</span>
    </v-btn>
    </router-link>

    <router-link to="/listlivro">
    <v-btn
    target="_blank"
    text
    >
    <v-icon>mdi-book-open-variant</v-icon>
    <span class="mr-2">LIVROS</span>
    </v-btn>
    </router-link>

    <router-link to="/listcliente">
    <v-btn
    target="_blank"
    text
    >
    <v-icon>mdi-account-outline</v-icon>
    <span class="mr-2">CLIENTES</span>
    </v-btn>
    </router-link>

    <router-link to="/upload">
    <v-btn
    target="_blank"
    text
    >
    <v-icon>mdi-cloud-upload-outline</v-icon>
    <span class="mr-2">DOCUMENTOS</span>
    </v-btn>
    </router-link>

    <router-link to="/mail">
    <v-btn
    target="_blank"
    text
    >
    <v-icon>mdi-mail</v-icon>
    <span class="mr-2">E-MAIL</span>
    </v-btn>
    </router-link>

    </v-app-bar>
</template>

<script>
export default {
  name: 'NavBar'
}
</script>
