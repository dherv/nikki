<template>
  <v-layout
    v-on:click="$emit('edit', daily.id)"
    row
    wrap
    v-bind:class=" `pa-3 daily ${daily.status}`"
  >
    <v-flex xs12 sm4>
      <h5 class="caption grey--text">Date</h5>
      <p>{{daily.created_at}}</p>
    </v-flex>

    <v-flex xs12 sm4>
      <ul v-if="daily.grammars">
        <li v-for="item in daily.grammars" v-bind:key="item.id">
          <div class="right">
            <v-chip :class="`orange white--text caption`" v-on:click="$emit('editGrammar', item)">{{item.grammar}}</v-chip>
          </div>
        </li>
      </ul>
    </v-flex>
    <v-flex xs12 sm4>
      <ul v-if="daily.words">
        <li v-for="item in daily.words" v-bind:key="item.id">
          <div class="right">
            <v-tooltip top>
              <v-chip
                v-on:click="$emit('editWord', item)"
                slot="activator"
                :class="`${daily.status} white--text caption`"
              >{{item.word}}</v-chip>
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
</template>
<script>
  export default {
    props: ["daily"],
    data() {
      return {};
    },
    mounted() {
      console.log("daily", this.daily);
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