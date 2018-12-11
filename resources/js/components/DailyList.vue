
<template>
  <div class="dailys">
    <h1 class="subheading grey--text">Dailys</h1>

    <v-container class="my-5">
      <v-card flat v-for="daily in dailies" v-bind:key="daily.id">
        <daily v-on:edit="edit" v-bind:daily="daily"/>

        <v-divider></v-divider>
      </v-card>
    </v-container>
  </div>
</template>
<script>
  // TODO: build one page for viewing with tags words, definitions, title and accordion
  import Daily from "./daily";
  export default {
    components: {
      Daily
    },
    data: function() {
      return {
        dailies: null
      };
    },
    mounted() {
      return fetch("/api/dailies")
        .then(response => response.json())
        .then(response => {
          this.dailies = response.map(item => ({
            ...item,
            status: item.words.length > 0 ? "progress" : "complete"
          }));
        });
    },
    methods: {
      edit(id) {
        console.log(id);
        this.$router.push({ path: `/daily/${id}` });
      }
    }
  };
</script>



