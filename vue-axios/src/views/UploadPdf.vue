<template>
  <v-container>
    <div>
      <h3>Upload</h3>
      <v-file-input
        class="mt-5"
        label="File input"
        outlined
        dense
        accept=".pdf"
        @change="newFile"
      ></v-file-input>
      <v-btn color="primary" @click="upload">Upload</v-btn>
    </div>
    <v-divider class="mt-10"></v-divider>
    <div class="mt-10">
      <template>
        <h3>List</h3>
        <v-data-table
          :headers="headers"
          :items="items"
          :items-per-page="5"
          class="elevation-1 mt-5"
        ></v-data-table>
      </template>
    </div>
    <v-divider class="mt-10"></v-divider>
    <div class="mt-10">
      <h3>Download</h3>
      <v-row class="mt-5">
        <v-col cols="6" >
          <v-text-field
            dense
            cols="2"
            outlined
            label="ID Documento"
            single-line
            v-model="id_doc"
          ></v-text-field>
        </v-col>
        <v-col cols="6" >
          <v-btn  @click="download" color="secondary">Download</v-btn>
        </v-col>
      </v-row>
    </div>
  </v-container>
</template>
<script>
import file from '@/service/file'
// import api from '@/service/api'
export default {
  name: 'ListLivro',
  data () {
    return {
      file: '',
      name: '',
      headers: [{ text: 'id', value: 'id' }, { text: 'name', value: 'name' }, { text: 'download', value: 'download' }],
      items: [],
      id_doc: '',
      blobUrl: ''
    }
  },
  methods: {
    newFile (event) {
      this.file = event
      console.log(this.file)
    },

    async upload () {
      try {
        var form = ''
        form = new FormData()
        form.append('file', this.file)
        form.append('name', this.file.name)

        const response = await file.post('documents/upload', form)
        console.log(response)
        this.file = ''
      } catch (error) {
        console.log(error)
      }
    },

    async list () {
      try {
        const response = await file.get('documents')
        console.log(response)
      } catch (error) {
        console.log(error)
      }
    },

    async download () {
      try {
        const response = await file.get(`documents/download/${this.id_doc}`)
        console.log(response)
        // this.base64ToBlob(response)
        this.prepareDownload(response)
        this.id_doc = ''
      } catch (error) {
        console.log(error)
      }
    },

    base64ToBlob (base64) {
      const binaryString = atob(base64)
      const len = binaryString.length
      const bytes = new Uint8Array(len)
      for (let i = 0; i < len; ++i) {
        bytes[i] = binaryString.charCodeAt(i)
      }

      return new Blob([bytes], { type: 'application/pdf' })
    },

    b64toBlob (b64Data, contentType = 'application/pdf', sliceSize = 512) {
      const byteCharacters = atob(b64Data)
      const byteArrays = []

      for (let offset = 0; offset < byteCharacters.length; offset += sliceSize) {
        const slice = byteCharacters.slice(offset, offset + sliceSize)

        const byteNumbers = new Array(slice.length)
        for (let i = 0; i < slice.length; i++) {
          byteNumbers[i] = slice.charCodeAt(i)
        }

        const byteArray = new Uint8Array(byteNumbers)
        byteArrays.push(byteArray)
      }

      const blob = new Blob(byteArrays, { type: contentType })
      return blob
    },

    prepareDownload (base64) {
      const contentType = 'application/pdf'
      const blob = this.b64toBlob(base64, contentType)
      this.blobUrl = URL.createObjectURL(blob)
      console.log(this.blobUrl)
    }

  },
  mounted () {
    // this.list()
  }
}
</script>
