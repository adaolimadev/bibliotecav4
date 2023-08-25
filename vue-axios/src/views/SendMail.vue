<template>
  <v-container>
    <h2 class="text-center">Enviar Email</h2>
     <v-col>
      <v-text-field
        name="name"
        label="Assunto"
        id="id"
        outlined
        dense
        v-model="subject"
        clearable
      ></v-text-field>
        <v-textarea
              solo
              name="input-7-4"
              label="Descrição"
              v-model="msg"
            ></v-textarea>
     </v-col>
        <v-col class="">
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
                <v-btn class="mt-5" color="primary" @click="sendMail">Enviar</v-btn>
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
      fileTemp: [],
      subject: '',
      msg: ''
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
    async sendMail () {
      // eslint-disable-next-line prefer-const
      let formData = new FormData()
      formData.append('reply', 'adaognr.lima@gmail.com')
      formData.append('to', 'informatica02@balflex.com.br')
      formData.append('subject', this.subject)
      formData.append('message', this.msg)

      this.files.forEach((element) => {
        formData.append('files[]', element)
      })

      const response = await documentService.mail(formData)

      console.log(response)
    }
  },
  mounted () {
    // this.list()
  }
}
</script>
