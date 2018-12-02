<template>
  <div>
    <h1 class="subheading grey--text">Grammar</h1>
    <v-container fluid class="my-5">
      <v-card flat class="pa-3" v-for="item in items" v-bind:key="item.grammar">
        <v-layout row wrap >
          <v-flex xs12 sm3>
            <h5 class="caption grey--text">Grammar Point</h5>
            <p >{{item.grammar}}</p>
          </v-flex>
          <v-flex xs12 sm3>
            <h5 class="caption grey--text">Example</h5>
            <p>{{item.example}}</p>
          </v-flex>
          <v-flex xs12 sm3>
            <h5 class="caption grey--text">Example Translation</h5>
            <p>{{item.example_translation}}</p>
          </v-flex>
          <v-flex xs12 sm3>
            <h5 class="caption grey--text">Explanation</h5>
            <p>{{item.explanation}}</p>
          </v-flex>
        </v-layout>
      </v-card>
    </v-container>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        items: null
      };
    },
    mounted() {
      fetch("/api/grammars")
        .then(response => {
          console.log(response);
          return response.json();
        })
        .then(response => (this.items = response));
    }
  };
</script>