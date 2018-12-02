<template>
  <v-container grid-list-xs>
    <v-layout row wrap>
      <v-flex
        dark
        class="white--text font-weight-bold"
        v-for="item in languages"
        :key="item.id"
        @click="switchLanguage(item.id)"
      >{{item.abbreviation}}</v-flex>
    </v-layout>
  </v-container>
</template>
<script>
  export default {
    data() {
      return {
        languages: [],
        current: null,
      };
    },
    mounted() {
      fetch("/api/languages")
        .then(response => (response.ok ? response.json() : null))
        .then(response => (this.languages = response));
    },
    methods: {
      switchLanguage(id) {
        this.current = id;
        fetch(`/api/language/${id}`, {
          method: "put",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document
              .querySelector('meta[name="csrf-token"]')
              .getAttribute("content")
          }
        }).then(response => response.ok ? response.json() : null).then(response => this.$router.go('/'));
      }
    }
  };
</script>
