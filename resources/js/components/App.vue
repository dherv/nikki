<template>
  <v-app class="grey lighten-4">
    <app-nav></app-nav>
    <v-content class="mx-4 mb-4">
      <router-view></router-view>
    </v-content>
  </v-app>
</template>
    
<script>
  // TODO: start ordering components into folders
  import AppNav from "./AppNav";
  export default {
    components: {
      AppNav
    }
  };
</script>