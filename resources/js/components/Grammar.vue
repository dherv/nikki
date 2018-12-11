<template>
  <form>
    <v-text-field v-model="example" label="example" color="orange darken-3" required></v-text-field>
    <v-text-field
      v-model="example_translation"
      label="example translation"
      color="orange darken-3"
      required
    ></v-text-field>
    <v-text-field v-model="explanation" label="explanation" color="orange darken-3" required></v-text-field>
    <v-btn color="orange darken-3 white--text" v-on:click.prevent="sendWord">add</v-btn>
  </form>
</template>
<script>
  import { postData, putData } from "../fetch";
  export default {
    props: ["selection", "id", "url", "method"],
    data() {
      return {
        grammar: this.selection.grammar,
        example: this.selection.example,
        example_translation: this.selection.example_translation,
        explanation: this.selection.explanation
      };
    },
    methods: {
      sendWord(event) {
        // TODO: everytime updqte sidebar with saved infos of current daily
        // TODO: add delete

        // if (this.type === "word") {
        //   postData(`api/word/${this.id}`, {
        //     word: this.selection,
        //     translation: this.translation,
        //     ruby: this.ruby
        //   }).then(response => {
        //     if (response.ok) {
        //       this.selection = null;
        //       this.translation = null;
        //       this.ruby = null;
        //     }
        //   });
        // }
        // if (this.type === "grammar") {
        if (this.method === "put") {
          console.log("here", this.url);
          putData(this.url, {
            grammar: this.grammar,
            example: this.example,
            example_translation: this.example_translation,
            explanation: this.explanation
          }).then(response => {
            if (response.ok) {
              (this.grammar = null),
                (this.example = null),
                (this.example_translation = null),
                (this.explanation = null);
                this.$emit('update')
            }
          });
        } else {
          postData(this.url, {
            grammar: this.grammar,
            example: this.example,
            example_translation: this.example_translation,
            explanation: this.explanation
          }).then(response => {
            if (response.ok) {
             return response.json()
            }
          }).then(response => {
             (this.grammar = null),
                (this.example = null),
                (this.example_translation = null),
                (this.explanation = null);
          });
        }
      }
    }
    // },
  };
</script>
