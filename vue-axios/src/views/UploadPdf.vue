<template>
  <v-container>
            <v-file-input
                dense
                accept="application/pdf"
                label="Selecionar anexo(s)"
                placeholder=""
                multiple
                prepend-icon="mdi-file-upload"
                outlined
                @change="addFile"
                :clearable="false"
                v-model="fileTemp"
                background-color="grey lighten-4"
            ></v-file-input>
        <v-col class="ml-4">
                    <v-card elevation="2" color="grey lighten-4">
                    <v-virtual-scroll
                    :items="files"
                    height="125"
                    item-height="35"
                    >
                        <template v-slot:default="{ item, index }">
                            <v-list-item :key="item.name">
                                <v-list-item-icon>
                                    <v-icon color="primary">mdi-file</v-icon>
                                  </v-list-item-icon>
                                <v-list-item-content>
                                    {{  item.name}}
                                </v-list-item-content>
                                <v-list-item-action>
                                    <v-btn small text color="error" @click="removeFile(index)">
                                        <v-icon> mdi-close </v-icon>
                                    </v-btn>
                                </v-list-item-action>
                            </v-list-item>
                        </template>
                    </v-virtual-scroll>
                </v-card>
                <v-row>
                    <p class="text-subtitle-2 ml-5 mt-5">Arquivos adicionados: {{ files.length }}</p>
                    <v-spacer></v-spacer>
                    <v-btn small text class="text-caption mr-2 mt-4" color="error" @click="files=[]">Remover todos <v-icon>mdi-delete</v-icon> </v-btn>
                </v-row>
                <v-btn class="mt-5" color="primary" @click="sendFiles">Enviar</v-btn>
        </v-col>
  </v-container>
</template>
<script>
import { mapMutations } from 'vuex'
import documentService from '@/service/documents'
export default {
  name: 'UploadFile',
  data () {
    return {
      files: [],
      fileTemp: []
    }
  },
  methods: {
    ...mapMutations([
      'DOCUMENT_SET_LIST'
    ]),
    newFile (event) {
      this.file = event
      console.log(this.file)
    },
    removeFile (index) {
      this.files.splice(index, 1)
    },
    addFile (items) {
      for (const newItem of items) {
        const fileExists = this.files.some(file => file.name === newItem.name)
        if (!fileExists) {
          this.files.push(newItem)
        }
      }
      this.fileTemp = []
    },
    async sendFiles () {
      // eslint-disable-next-line prefer-const
      let formData = new FormData()
      this.files.forEach((element) => {
        formData.append('files[]', element)
      })
      const response = await documentService.store(formData)
      console.log(response)
    }
  },
  mounted () {
    // this.list()
  }
}
</script>
