<template>
  <v-container class="my-5">
    <v-card>
      <daily v-bind:daily="daily" v-on:editWord="editWord" v-on:editGrammar="editGrammar"/>
    </v-card>
    <v-layout>
      <word method="put" v-if="toggleWord" :selection="word" :url="`api/word/${this.word.id}`" v-on:update="fetchDaily"/>
      <grammar
        method="put"
        v-if="toggleGrammar"
        :selection="grammar"
        :url="`api/grammar/${this.grammar.id}`"
        v-on:update ="fetchDaily"
      />
    </v-layout>
  </v-container>
</template>
<script>
  import Daily from "./daily";
  import Word from "./Word/Word";
  import Grammar from "./Grammar";

  export default {
    components: {
      Daily,
      Word,
      Grammar
    },
    data: function() {
      return {
        daily: {},
        toggleWord: false,
        toggleGrammar: false,
        word: null,
        grammar: null
      };
    },
    methods: {
      editWord(item, event) {
        console.log(item, event);
        this.toggleWord = !this.toggleWord;
        this.word = item;
      },
      editGrammar(item, event) {
        console.log(item, event);
        this.toggleGrammar = !this.toggleGrammar;
        this.grammar = item;
      },
      fetchDaily() {
        return fetch(`/api/daily/${this.$route.params.id}`)
          .then(response => response.json())
          .then(response => {
            this.daily = {
              ...response,
              status: response.words.length > 0 ? "progress" : "complete"
            };
          });
      }
    },
    mounted() {
      return this.fetchDaily()
    }
  };
</script>
