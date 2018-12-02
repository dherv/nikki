
<template>
  <div class="dailys">
    <h1 class="subheading grey--text">Dailys</h1>

    <v-container class="my-5">
      <v-card flat v-for="daily in dailies" v-bind:key="daily.grammar">
        <v-layout row wrap v-bind:class=" `pa-3 daily ${daily.status}`">
          <v-flex xs12 sm4>
            <h5 class="caption grey--text">Date</h5>
            <p>{{daily.created_at}}</p>
          </v-flex>

          <v-flex xs12 sm4>
            <ul v-if="daily.grammars">
              <li v-for="item in daily.grammars" v-bind:key="item.id">
                <div class="right">
                  <v-chip :class="`orange white--text caption`">{{item.grammar}}</v-chip>
                </div>
              </li>
            </ul>
          </v-flex>
          <v-flex xs12 sm4>
            <ul v-if="daily.words">
              <li v-for="item in daily.words" v-bind:key="item.id">
                <div class="right">
                  <v-tooltip top>
                     <v-chip  slot="activator" :class="`${daily.status} white--text caption`">{{item.word}}</v-chip>
                    <span>{{item.translation}}, {{item.ruby}}</span>
                  </v-tooltip>
                </div>
              </li>
            </ul>
          </v-flex>
          <v-flex xs12>
            <p>{{daily.body}}</p>
          </v-flex>
        </v-layout>

        <v-divider></v-divider>
      </v-card>
    </v-container>
  </div>
</template>
<script>
  // TODO: build one page for viewing with tags words, definitions, title and accordion
  export default {
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
    }
  };
</script>

<style scoped>
  .daily.progress {
    border-left: 4px solid #673ab7;
  }
  .daily.complete {
    border-left: 4px solid #00bcd4;
  }
  .v-chip.progress {
    background-color: #673ab7;
  }
  .v-chip.complete {
    background-color: #00bcd4;
  }
  .v-chip:hover {
  }
</style>

