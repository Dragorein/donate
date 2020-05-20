<template>
  <v-app>
    <navbar />

    <main class="h-100">
      <div class="fluid">
        <section class="top-space bg-section-1">
          <v-container class="pb-12">
            <v-card>
              <v-card-title>Daftar Akun Baru</v-card-title>
              <v-stepper v-model="e1" vertical>
                <v-stepper-step :complete="e1 > 1" step="1" color="error">Data Pribadi</v-stepper-step>

                <v-stepper-content step="1">
                  <v-card-text>
                    <v-form>
                      <v-text-field label="Name Depan" name="firstname" prepend-inner-icon="person" type="text" v-model="firstname" :rules="firstnameRules" required filled clearable />
                      <v-text-field label="Nama Belakang" name="lastname" prepend-inner-icon="person" type="text" v-model="lastname" :rules="lastnameRules" required filled clearable />
                      <v-text-field label="Email" name="email" prepend-inner-icon="mail" type="text" v-model="email" :rules="emailRules" required filled clearable />
                      <v-text-field label="Nomor Handphone" name="noHandphone" prepend-inner-icon="phone" type="text" v-model="noHandphone" :rules="noHandphoneRules" :counter="14" required filled clearable />
                      <v-btn color="error" @click="e1 = 2" class="mr-2">Lanjut</v-btn>
                      <v-btn text class="mr-2" @click="goBack">Batal</v-btn>
                    </v-form>
                  </v-card-text>
                </v-stepper-content>

                <v-stepper-step :complete="e1 > 2" step="2" color="error">Password</v-stepper-step>

                <v-stepper-content step="2">
                  <v-card-text>
                    <v-form>
                      <v-text-field id="password" label="Password" name="password" prepend-inner-icon="mdi-lock-open" v-model="password" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" @click:append="show1 = !show1" :type="show1 ? 'text' : 'password'" :rules="passwordRules" required filled clearable />
                      <v-text-field id="passwordconfirm" label="Ketik Ulang Password" name="passwordconfirm" prepend-inner-icon="lock" v-model="confirmPassword" :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'" @click:append="show2 = !show2" :type="show2 ? 'text' : 'password'" :rules="[comparePasswords]" required filled clearable />
                      <v-btn color="error" @click="submit()" class="mr-2">Daftar</v-btn>
                      <v-btn text @click="e1 = 1" class="mr-2">Kembali</v-btn>
                    </v-form>
                  </v-card-text>
                </v-stepper-content>
              </v-stepper>
            </v-card>
          </v-container>
        </section>
      </div>
    </main>

    <footbar />
  </v-app>
</template>

<script>
export default {
  data: () => ({
    show1: false,
    show2: false,
    e1: 1,
    valid: true,
    firstname: "",
    firstnameRules: [v => !!v || "Nama Depan tidak boleh kosong"],
    lastname: "",
    lastnameRules: [v => !!v || "Nama Belakang tidak boleh kosong"],
    email: "",
    emailRules: [
      v => !!v || "E-mail tidak boleh kosong",
      v => /.+@.+/.test(v) || "E-mail harus valid"
    ],
    noHandphone: "",
    noHandphoneRules: [
      v => !!v || "No.Handphone tidak boleh kosong",
      v => v && v.length <= 14
    ],
    password: "",
    passwordRules: [
      v => !!v || "Password tidak boleh kosong",
      v => /(?=.*[A-Z])/.test(v) || 'Must have one uppercase character',
      v => /(?=.*\d)/.test(v) || 'Must have one number'],
    confirmPassword: ""
  }),
  computed: {
    comparePasswords() {
      return this.password !== this.confirmPassword
        ? "Password tidak sesuai"
        : true ;
    }
  },
  methods: {
    submit() {
      console.log(this.$data);
      axios
        .post("http://127.0.0.1:8000/register", {
          firstname: this.$data.firstname,
          lastname: this.$data.lastname,
          name: this.$data.firstname + " " + this.$data.lastname,
          email: this.$data.email,
          noHandphone: this.$data.noHandphone,
          password: this.$data.password
        })
        .then(data => {
          this.$router.push({ path: `/` });
        })
        .catch(e => {
          console.error(e);
        });
    },
    submitForm(e) {
      e.preventDefault();
    },
    reroutes: function(url) {
      this.$router.push({ path: url });
    },
    goBack: function() {
      this.$router.go(-1);
    }
  }
};
</script>
