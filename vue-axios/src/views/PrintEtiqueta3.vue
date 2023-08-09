<template>
    <div>
        <div class="etiqueta">
            <table>
                <tr>
                    <td>
                        <img src="@/assets/img/logo_balflex.png" alt="Logo">
                    </td>
                    <td>
                        <b>ID:</b> 1248351
                    </td>
                    <td>
                        <b>DATA:</b> 10/05/2022
                    </td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td>
                        <b>COD ITEM:</b> 12.9040.050
                    </td>
                    <td>
                        <b>QTD:</b> 50,00
                    </td>
                    <td>
                        <b>LOTE:</b> 5223
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><b>DESCRIÇÃO:</b> CAMISA CRAVAR SEM DESC. R1 AT/R2AT/R16</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="barcode">
                            <Barcode
                            :value="'124835111112121212121515141'"
                            :width="1.5"
                            :height="30"
                            :font-size="10"
                            :margin="1"
                            :displayValue="true"
                            />
                        </div>
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

}

img{
    width: 150px;
    height: 45px;

}
h2{
    font-size: 30px !important;
}
.barcode {
    margin-left: 10px;
    text-align: center;
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
