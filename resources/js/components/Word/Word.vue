<template>
  <form>
    <h2 v-bind="word">{{word}}</h2>
    <v-text-field v-model="translation" label="translation" color="indigo darken-3" required></v-text-field>
    <v-text-field v-model="ruby" label="ruby" color="indigo darken-3" required></v-text-field>
    <v-btn color="indigo darken-3 white--text" v-on:click.prevent="sendWord">add</v-btn>
  </form>
</template>
<script>
  import { postData, putData } from "../../fetch";
  export default {
    props: ["selection", "id", "url", "method"],
    data() {
      return {
        word: this.selection.word,
        translation: this.selection.translation,
        ruby: this.selection.ruby
      };
    },

    methods: {
      sendWord(event) {
        // TODO: everytime updqte sidebar with saved infos of current daily
        // TODO: add delete

        if (this.method === "put") {
          console.log("here", this.url)
          putData(this.url, {
            word: this.word,
            translation: this.translation,
            ruby: this.ruby
          }).then(response => {
            if (response.ok) {
              this.selection = null;
              this.translation = null;
              this.ruby = null;
              this.$emit('update')
            }
          });
        } else {
          postData(this.url, {
            word: this.word,
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
      }

      // }
      // if (this.type === "grammar") {
      //   postData(`api/grammar/${this.id}`, {
      //     grammar: this.selection,
      //     example: this.example,
      //     example_translation: this.example_translation,
      //     explanation: this.explanation
      //   }).then(response => {
      //     if (response.ok) {
      //       (this.selection = null),
      //         (this.example = null),
      //         (this.example_translation = null),
      //         (this.explanation = null);
      //     }
      //   });
      // }
    }
  };
</script>
