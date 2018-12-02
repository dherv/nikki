
<template>
  <nav>
    <v-toolbar app flat class="py-4">
      <v-toolbar-title class="grey--text font-weight-light">
        <v-toolbar-side-icon v-show="route !== 'login'" class="grey--text" v-on:click="drawer = !drawer"></v-toolbar-side-icon>
        <span class="font-weight-bold text-uppercase grey-text">Nikki</span>
        <span>
          <ruby>日
            <rt>にっ</rt>
          </ruby>
          <ruby>記
            <rt>き</rt>
          </ruby>
        </span>
      </v-toolbar-title>

      <!-- <v-spacer></v-spacer>
      <v-btn flat to="/dailys" exact>
        <span>Dailys</span>
        <v-icon right>calendar_today</v-icon>
      </v-btn>
      <v-btn flat to="/editor" exact>
        <span>Editor</span>
        <v-icon right>notes</v-icon>
      </v-btn>
      <v-btn flat to="/words" exact>
        <span>Words</span>
        <v-icon right>title</v-icon>
      </v-btn>

      <v-btn flat to="/grammars" exact>
        <span>Grammar</span>
        <v-icon right>subtitles</v-icon>
      </v-btn>
      <ul class="nav-list">
        <v-btn fab flat>
          <v-icon right>language</v-icon>
        </v-btn>
        <v-btn small outline dark flat class="font-weight-bold uppercase">
          <span>JP</span>
        </v-btn>
        <v-btn small outline dark flat class="font-weight-bold uppercase">IS</v-btn>
      </ul>-->
    </v-toolbar>

    <v-navigation-drawer  v-model="drawer" app class="cyan darken-3">
      <v-list>
        <v-list-tile v-for="link in links" v-bind:key="link.text" router :to="link.route">
          <v-list-tile-action>
            <v-icon class="white--text">{{link.icon}}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title class="white--text">{{link.text}}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <v-list>
        <v-list-tile>
          <v-list-tile-action>
            <v-icon class="white--text">languages</v-icon>
          </v-list-tile-action>
          <nav-language v-if="route !== 'login'"></nav-language>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
  </nav>
</template>

<script>
  import NavLanguage from "./NavLanguage";
  export default {
    components: {
      NavLanguage
    },
    data() {
      return {
        drawer: false,
        route: this.$route.name,

        links: [
          { icon: "dashboard", text: "Editor", route: "/editor" },
          { icon: "calendar_today", text: "Dailys", route: "/dailys" },
          { icon: "title", text: "Words", route: "/words" },
          { icon: "notes", text: "Grammar", route: "/grammars" }
          //  { icon: "languages", text: 'Languages'}
        ]
      };
    },
    mounted() {
      this.route = this.$route.name;
      console.log(this.route);
    }
  };
</script>



