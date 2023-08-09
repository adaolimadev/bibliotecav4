<template>
    <div>
        <div class="etiqueta">
            <table>
                <tr>
                    <td>
                        <h2>BALFLEX</h2>
                    </td>
                    <td>
                        ID: 1248351
                    </td>
                    <td>
                        DATA: 10/05/2022
                    </td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td>
                        COD ITEM: 12.9040.050
                    </td>
                    <td>
                        QTD: 50,00
                    </td>
                    <td>
                        LOTE: 5223
                    </td>
                </tr>
                <tr>
                    <td colspan="1">DESCRICAO: CAMISA CRAVAR SEM DESC. R1 AT/R2AT/R16</td>
                    <td colspan="2">
                        <div class="barcode">
                            <Barcode
                            :value="'1248351'"
                            :width="1"
                            :height="30"
                            :font-size="10"
                            :margin="1"
                            :displayValue="true"
                            />
                        </div>
                    </td>
                </tr>
                <tr>
                </tr>
            </table>
        </div>
            <v-btn
            id="btnPrint"
            class="hidden-print"
            color="primary"
            @click="imprimir"
            >
            <v-icon> mdi-printer-outline</v-icon>
            Imprimir
            </v-btn>
    </div>
</template>

<script>
import Barcode from 'vue-barcode'
import { mapGetters } from 'vuex'
export default {
  data () {
    return {
      dialog: false
    }
  },
  components: {
    Barcode
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

<style scoped>
.etiqueta {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    width: 388px;
    height: 189px;
    margin: auto;
    margin-top: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid black;
}

h2{
    font-size: 30px !important;
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
