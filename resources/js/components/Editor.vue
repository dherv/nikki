<template>
  <div class="editor">
    <h1 class="subheading grey--text">Editor</h1>
    <v-container fluid grid-list-md>
      <v-layout column>
        <v-textarea
          solo
          name="daily"
          v-model="textarea"
          v-on:select="getSelect"
          v-bind:readonly="readonly"
        />
        <!-- <h1 v-bind:id="id" v-show="readonly">select you words! {{id}}</h1> -->
        <v-layout justify-end>
          <v-btn color="blue-grey" class="white--text">Clear
            <v-icon right>clear_all</v-icon>
          </v-btn>
          <v-btn color="blue-grey" class="white--text" v-on:click.prevent="create">Send
            <v-icon right dark>send</v-icon>
          </v-btn>
        </v-layout>
      </v-layout>
      <v-layout column>
        <v-flex xs12 px-4 v-show="selection">
          <form>
            <v-radio-group row>
              <v-radio
                label="grammar"
                color="orange darken-3"
                value="grammar"
                v-on:change="selectType"
              ></v-radio>
              <v-radio label="word" color="indigo darken-3" value="word" v-on:change="selectType"></v-radio>
            </v-radio-group>
          </form>
          <form v-show="type" v-if="type==='word'">
            <v-text-field
              v-model="translation"
              label="translation"
              color="indigo darken-3"
              required
            ></v-text-field>
            <v-text-field v-model="ruby" label="ruby" color="indigo darken-3" required></v-text-field>
            <v-btn color="indigo darken-3 white--text" v-on:click.prevent="sendWord">add</v-btn>
          </form>
          <form v-show="type" v-else-if="type==='grammar'">
            <v-text-field v-model="example" label="example" color="orange darken-3" required></v-text-field>
            <v-text-field
              v-model="example_translation"
              label="example translation"
              color="orange darken-3"
              required
            ></v-text-field>
            <v-text-field
              v-model="explanation"
              label="explanation"
              color="orange darken-3"
              required
            ></v-text-field>
            <v-btn color="orange darken-3 white--text" v-on:click.prevent="sendWord">add</v-btn>
          </form>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>
<script>
  import { postData } from "../fetch";
  export default {
    data: function() {
      return {
        textarea: null,
        dailys: null,
        readonly: false,
        id: null,
        selection: null,
        translation: null,
        ruby: null,
        type: null
      };
    },
    // TODO: create emit event to update this list when create new text
    // TODO: create error message
    methods: {
      selectType(event) {
        this.type = event;
      },
      getSelect(event) {
        if (this.readonly && this.id) {
          const selection = event.target.value.slice(
            event.target.selectionStart,
            event.target.selectionEnd
          );

          this.selection = selection;
        }
      },
      sendWord(event) {
        // TODO: everytime updqte sidebar with saved infos of current daily
        // TODO: add delete

        if (this.type === "word") {
          postData(`api/word/${this.id}`, {
            word: this.selection,
            translation: this.translation,
            ruby: this.ruby
          }).then(response => {
            if (response.ok) {
              this.selection = null;
              this.translation = null;
              this.ruby = null;
            }
          });
        }
        if (this.type === "grammar") {
          postData(`api/grammar/${this.id}`, {
            grammar: this.selection,
            example: this.example,
            example_translation: this.example_translation,
            explanation: this.explanation
          }).then(response => {
            if (response.ok) {
              (this.selection = null),
                (this.example = null),
                (this.example_translation = null),
                (this.explanation = null);
            }
          });
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

  //   <ul>
  //     <li>Aside Droppable - with tags for grammar points and words</li>
  //     <li>surligneur</li>
  //     <li>
  //       annotations on top of words i dont know - store those words and make a page which a reference to the item
  //       for each word
  //     </li>
  //     <li>calendar with progress</li>
  //     <li>google translate</li>
  //     <li>grammar point surligneur and like words, make a reference</li>
  //     <li>tools for text editor</li>
  //   </ul>
  // </div>
</script>

<style>
</style>

