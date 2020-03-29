<template>
<v-app>
    <navbar/>

    <main class="h-100">
        <div class="fluid">
            <section class="top-space bg-section-1">
                <v-container class="py-12">
                    <v-card>
                        <v-card-title>Daftar Akun Baru</v-card-title>
                        <v-stepper v-model="e1" vertical>
                                <v-stepper-step :complete="e1 > 1" step="1">Data Pribadi</v-stepper-step>
                                
                                <v-stepper-content step="1">
                                    <v-card-text>
                                        <v-form>
                                            <v-text-field label="Name Depan" name="firstname" prepend-inner-icon="person" type="text" :rules="firstnameRules" required outlined clearable/>
                                            <v-text-field label="Nama Belakang" name="lastname" prepend-inner-icon="person" type="text" :rules="lastnameRules" required outlined clearable/>
                                            <v-text-field label="Email" name="email" prepend-inner-icon="mail" type="text" :rules="emailRules" required outlined clearable/>
                                            <v-text-field label="Nomor Handphone" name="noHandphone" prepend-inner-icon="phone" type="text" :rules="noHandphoneRules" :counter="14" required outlined clearable/>
                                            <v-btn color="primary" @click="e1 = 2" class="mr-2">Lanjut</v-btn>
                                            <v-btn text class="mr-2" @click="goBack">Batal</v-btn>
                                        </v-form>
                                    </v-card-text>
                                </v-stepper-content>

                                <v-stepper-step :complete="e1 > 2" step="2">Password</v-stepper-step>

                                <v-stepper-content step="2">
                                    <v-card-text>
                                        <v-form>
                                            <v-text-field id="password" label="Password" name="password" prepend-inner-icon="mdi-lock-open" type="password" :rules="passwordRules" required outlined clearable/>
                                            <v-text-field id="passwordconfirm" label="Ketik Ulang Password" name="passwordconfirm" prepend-inner-icon="lock" type="password" :rules="passwordRules" required outlined clearable/>
                                            <v-btn color="primary" @click="reroutes('/')" class="mr-2">Daftar</v-btn>
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

    <footbar/>
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
        },
        goBack: function () {
            this.$router.go(-1);
        }
    }
};
</script>
