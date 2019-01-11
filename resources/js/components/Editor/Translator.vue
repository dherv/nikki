<template>
  <v-layout column>
    <v-flex xs12>
      <v-card class="wrapper">
        <v-textarea
          solo
          flat　
          clearable
          no-resize
          name="jisho"
          v-model="jisho"
          v-on:change="getTranslation"
        />
      </v-card>
    </v-flex>
    <v-flex xs12>
      <v-card class="wrapper">
        <h2>
          {{ translation }}
          <span style="color : grey">{{ ruby }}</span>
          <h5>{{ english }}</h5>
        </h2>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
import { postData } from "../../fetch";
export default {
  data: function() {
    return {
      jisho: null,
      translation: null,
      response: null,
      english: null,
      ruby: null
    };
  },
  methods: {
    getTranslation(event) {
      postData(`/api/translate`, { translate: this.jisho })
        .then(response => response.json())
        .then(response => {
          console.log(response);
          this.translation = response.data[0].japanese[0].word;
          this.ruby = response.data[0].japanese[0].reading;
          this.english = response.data[0].senses[0].english_definitions[0];
        });
    }
  }
};
</script>
<style scoped>
.wrapper {
  background-color: white;
  height: 150px;
}
</style>

        
     