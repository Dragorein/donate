<template>
  <v-app>
    <main class="h-100">
      <div class="fluid">
        <section>
          <v-btn rounded @click="reroutes('/campaign')">Back</v-btn>
          <v-container class="py-8">
            <v-toolbar color="#FFA726" flat>
              <v-toolbar-title>Registration Form</v-toolbar-title>
              <v-spacer />
            </v-toolbar>

            <v-stepper v-model="e1">
              <v-stepper-header>
                <v-stepper-step :complete="e1 > 1" step="1">Personal Data</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step :complete="e1 > 2" step="2">Password</v-stepper-step>
              </v-stepper-header>

              <v-stepper-items>
                <v-stepper-content step="1">
                  <v-card-text>
                    <v-form>
                      <v-row align="center" class="px-5">
                        <v-text-field
                          label="First Name"
                          name="firstname"
                          prepend-icon="person"
                          type="text"
                          :rules="firstnameRules"
                          required
                          outlined
                          clearable
                        />
                      </v-row>
                      <v-row align="center" class="px-5 pt-5">
                        <v-text-field
                          label="Last Name"
                          name="lastname"
                          prepend-icon="person"
                          type="text"
                          :rules="lastnameRules"
                          required
                          outlined
                          clearable
                        />
                      </v-row>
                      <v-row align="center" class="px-5 pt-5">
                        <v-text-field
                          label="E-Mail"
                          name="email"
                          prepend-icon="mail"
                          type="text"
                          :rules="emailRules"
                          required
                          outlined
                          clearable
                        />
                      </v-row>
                      <v-row align="center" class="px-5 pt-5">
                        <v-text-field
                          label="No.Handphone"
                          name="noHandphone"
                          prepend-icon="phone"
                          type="text"
                          :rules="noHandphoneRules"
                          :counter="14"
                          required
                          outlined
                          clearable
                        />
                      </v-row>
                    </v-form>
                  </v-card-text>

                  <v-btn color="primary" @click="e1 = 2">Continue</v-btn>

                  <v-btn text>Cancel</v-btn>
                </v-stepper-content>

                <v-stepper-content step="2">
                  <v-card-text>
                    <v-form>
                      <v-row align="center" class="px-5 pt-5">
                        <v-text-field
                          id="password"
                          label="Password"
                          name="password"
                          prepend-icon="lock"
                          type="password"
                          :rules="passwordRules"
                          required
                          outlined
                          clearable
                        />
                      </v-row>
                      <v-row align="center" class="px-5 pt-5">
                        <v-text-field
                          id="passwordconfirm"
                          label="Confirm Password"
                          name="passwordconfirm"
                          prepend-icon="lock"
                          type="password"
                          :rules="passwordRules"
                          required
                          outlined
                          clearable
                        />
                      </v-row>
                    </v-form>
                  </v-card-text>
                  <v-btn color="primary">Continue</v-btn>

                  <v-btn text @click="e1 = 1">Cancel</v-btn>
                </v-stepper-content>
              </v-stepper-items>
            </v-stepper>
          </v-container>
        </section>
      </div>
    </main>
  </v-app>
</template>

<script>
export default {
  data: () => ({
    e1: 1,
    valid: true,
    firstname: "",
    firstnameRules: [v => !!v || "First Name is required"],
    lastname: "",
    lastnameRules: [v => !!v || "Last Name is required"],
    email: "",
    emailRules: [v => !!v || "E-mail is required"],
    noHandphone: "",
    noHandphoneRules: [
      v => !!v || "No.Handphone is required",
      v => v && v.length <= 14
    ],
    password: "",
    passwordRules: [v => !!v || "Password is required"]
  }),
  methods: {
    submit() {
      this.$v.$touch();
    },
    reroutes: function(url) {
      this.$router.push({ path: url });
    }
  }
};
</script>