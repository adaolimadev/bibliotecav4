<template>
    <div>
        <div class="etiqueta">
            <table>
                <tr>
                    <td>
                        <h1>FRÁGIL</h1>
                    </td>
                </tr>
            </table>
        </div>
            <button
            id="btnPrint"
            class="hidden-print"
            color="primary"
            @click="imprimir"
            >
            <v-icon> mdi-printer-outline</v-icon>
            Imprimir
            </button>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  data () {
    return {
      dialog: false
    }
  },
  components: {
  },
  computed: {
    ...mapGetters(['GET_LIVRO'])
  },
  beforeCreate () {
    this.$root.$off('BARCODE_OPEN')
  },
  created () {
    this.$root.$on('BARCODE_OPEN', () => {
      this.dialog = !this.dialog
    })
  },
  methods: {
    imprimir () {
      window.print()
    }
  }
}
</script>

<style>
*{
    margin: 0px;
    padding: 0px;
}
body{
    width: 388px;
    height: 189px;
}
.etiqueta {
    padding-left: 5px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    width: 388px;
    height: 189px;
    margin: auto;
    border-radius: 5px;
    border: 1px solid black;
}

h1{
    font-size: 90px !important;
}
.barcode {
    margin-left: 10px;
}
table{
    width: 100%;
    height: 100%;
}
td{
    padding: 5px;

}
@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
</style>
