<template>
  <v-card p4>
    <v-tabs centered color="cyan darken-3" dark icons-and-text>
      <v-tabs-slider color="cyran darken-4"></v-tabs-slider>
      <v-tab v-for="item in types" :key="item.name" v-on:click.prevent="selectType(item.name)">
        <v-icon>{{item.icon}}</v-icon>
        {{ item.name }}
      </v-tab>
    </v-tabs>

    <v-tabs-items>
      <v-tab-item v-for="item in types" :value="'tab-' + item.name" :key="item.name">
        <v-card flat>
          <v-card-text>
            <h5 v-show="selection"></h5>
          </v-card-text>
          <word
            v-show="type"
            v-if="type==='word'"
            :selection="selection"
            :id="id"
            :url="`api/word/${this.id}`"
          />
          <grammar
            v-show="type"
            v-else-if="type==='grammar'"
            :selection="selection"
            :id="id"
            :url="`api/grammar/${this.id}`"
          />
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </v-card>
</template>
<script>
import Word from "../Word/Word";
import Grammar from "./Grammar";
export default {
  props: ["selection", "id"],
  components: {
    Word,
    Grammar
  },
  data: () => ({
    types: [
      { icon: "title", name: "word" },
      { icon: "notes", name: "grammar" }
    ],
    type: "word"
  }),
  methods: {
    selectType(type) {
      this.type = type;
    }
  }
};
</script>

