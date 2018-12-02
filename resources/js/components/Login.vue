<template>
  <v-container>
    <h1 class="subheading grey--text">Login</h1>

    <v-card dark flat class="pa-4">
      <v-form ref="form" v-model="valid" lazy-validation>
        <v-text-field
          box
          success
          color="white"
          prepend-icon="email"
          v-model="email"
          :rules="emailRules"
          label="E-mail"
          required
        ></v-text-field>
        <v-text-field
          box
          success
          color="white"
          type="password"
          prepend-icon="lock"
          v-model="password"
          :rules="passwordRules"
          label="Password"
          required
        ></v-text-field>
        <v-layout justify-end class="pt-4">
          <v-btn color="cyan darken-4" depressed :disabled="!valid" @click="submit">submit</v-btn>
          <v-btn color="cyan darken-4" depressed @click="clear">clear</v-btn>
        </v-layout>
      </v-form>
    </v-card>
  </v-container>
</template>
<script>
  import { postData } from "../fetch";
  export default {
    data: () => ({
      valid: false,
      email: "",
      emailRules: [
        v => !!v || "E-mail is required",
        v => /.+@.+/.test(v) || "E-mail must be valid"
      ],
      password: "",
      passwordRules: [v => !!v || "password is required"]
    }),
    methods: {
      submit() {
        if (this.$refs.form.validate()) {
          // Native form submission is not yet supported
          postData('/api/login', {email: this.email, password: this.password}).then(response => response.ok ? this.$router.push('editor')  : null);
        }
      },
      clear() {
        this.$refs.form.reset();
      }
    }
  };
</script>
