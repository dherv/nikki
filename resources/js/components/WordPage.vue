<template>
  <div class="words">
    <h1 class="subheading grey--text">Words</h1>
    <v-container>
      <v-layout row wrap>
        <v-flex>
          <ul v-if="items">
            <li
              v-for="item in items"
              v-bind:key="item.id"
            >{{item.word}}: {{item.translation}} / {{item.ruby}}</li>
          </ul>
        </v-flex>
      </v-layout>
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
      fetch("/api/words")
        .then(response => {
          console.log(response);
          return response.json();
        })
        .then(response => (this.items = response));
    }
  };
</script>