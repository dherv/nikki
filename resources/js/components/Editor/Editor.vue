<template>
  <v-container fluid grid-list-md>
    <editor-header/>
    <v-layout align-space-between justify-center row fill-height>
      <v-flex xs-3>
        <translator/>
      </v-flex>
      <v-flex xs6>
        <v-layout column fill-height>
          <v-flex xs12 fill-height align-content-space-between>
            <v-card>
              <v-textarea
                solo
                flat
                no-resize
                clearable
                name="daily"
                v-model="textarea"
                v-on:select="getSelect"
                v-bind:readonly="readonly"
              />
              <v-flex xs12>
                <v-btn color="blue-grey" class="white--text" v-on:click.prevent="create">Send
                  <v-icon right dark>send</v-icon>
                </v-btn>
              </v-flex>
            </v-card>
          </v-flex>
        </v-layout>
      </v-flex>
      <v-flex xs3>
        <memo :selection="selection" :id="id"/>
      </v-flex>
      <!-- <h1 v-bind:id="id" v-show="readonly">select you words! {{id}}</h1> -->
    </v-layout>
  </v-container>
</template>
<script>
import { postData, fetchData } from "../../fetch";

import Translator from "./Translator";
import EditorHeader from "./EditorHeader";
import Memo from "./Memo";
export default {
  components: {
    Translator,
    EditorHeader,
    Memo
  },
  data: function() {
    return {
      textarea: null,
      jisho: null,
      dailys: null,
      readonly: false,
      id: null,
      selection: {
        word: null,
        translation: null,
        ruby: null
      }
    };
  },
  // TODO: create emit event to update this list when create new text
  // TODO: create error message
  methods: {
    getSelect(event) {
      if (this.readonly && this.id) {
        const selection = event.target.value.slice(
          event.target.selectionStart,
          event.target.selectionEnd
        );

        this.selection = {
          word: selection,
          translation: null,
          ruby: null
        };
      }
    },

    create(event) {
      postData("/api/daily/create", { body: this.textarea })
        .then(response => {
          if (response.status === 200) {
            this.readonly = true;
          }
          return response.json();
        })
        .then(response => {
          console.log(response.id);
          this.id = response.id;
        });
    }
  }
};
</script>

<style>
.wrapper {
  background-color: white;
  height: 308px;
}
</style>

