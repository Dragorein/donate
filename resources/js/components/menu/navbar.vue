<template>

    <v-app-bar id="navbar" fixed elevate-on-scroll class="py-2 h-auto">
        <v-spacer/>

        <v-toolbar-title @click="reroutes('/')" class="headline font-weight-medium d-flex align-center" style="cursor: pointer">
            <v-img :src="logo" height="36" width="36" class="mr-2" contain/>{{brand}}
        </v-toolbar-title>

        <v-spacer/>

        <v-text-field class="mr-2 search-lg" @mousedown="reroutes('/search')" rounded filled hide-details dense placeholder="Cari galang dana" prepend-inner-icon="search"/> 
        <v-btn class="mr-2 search-md" @mousedown="reroutes('/search')" icon><v-icon>mdi-magnify</v-icon></v-btn>
        <v-btn large text class="mr-3">Donasi</v-btn>

        <template v-if="user.loggedin == false">
            <v-dialog v-model="logindialog" max-width="600px">
                <template v-slot:activator="{ on }">
                    <v-btn href="register" large color="error" class="mr-3">Daftar</v-btn>
                    <v-btn large text color="error" class="mr-3" v-on="on">Masuk</v-btn>
                </template>
                <v-card tile color="#F1F1F1">
                    <v-card-title class="d-flex justify-center pt-6">
                        <div class="headline">Masuk</div>
                    </v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-form @submit.prevent="callLogin" id="form-login">
                                <v-row>
                                    <v-col cols="12" class="py-0">
                                        <v-text-field solo flat label="Email" required v-model="login.email" :rules="emailRules"></v-text-field>
                                    </v-col>
                                    <v-col cols="12" class="py-0">
                                        <v-text-field solo flat label="Password" type="password" required v-model="login.password"></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-btn type="submit" form="form-login" color="red darken-1" dark block large>Masuk Sekarang</v-btn>
                                    </v-col>
                                </v-row>
                            </v-form>
                            <v-row>
                                <v-col cols="12" class="text-center">
                                    <p>Belum punya akun Kindly? <a href="/register">Daftar</a></p>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-dialog>
        </template>
        
        <template v-else>
            <v-menu offset-y open-on-hover transition="slide-y-transition" bottom>
                <template v-slot:activator="{ on }">
                    <v-btn large text v-on="on">
                        <v-icon left>mdi-account-circle mdi-24px</v-icon><template v-if="user.loggedin == true">{{user.name}}</template>
                    </v-btn>
                </template>
                <v-list>
                    <v-list-item @click="reroutes('/profile')">
                        <v-list-item-title>
                            <v-icon left>mdi-account</v-icon>Profil
                        </v-list-item-title>
                    </v-list-item>
                    <v-list-item @click="user.loggedin = false">
                        <v-list-item-title>
                            <v-icon left>mdi-logout-variant</v-icon>Keluar
                        </v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </template>

        <v-spacer/>
    </v-app-bar>

</template>

<script>
    export default {
        data: () => ({
            brand: 'Kindly', 
            logo: '/img/brand.png',
            navbar: '#navbar',
            logindialog: false,

            user: {
                name: '',
                loggedin: false,
            },
            login: {
                email: '',
                password: '',
            },
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
            ],
            errors:[],
        }),
        methods: {
            reroutes(url) {
                this.$router.push({ path: url });
            },
            handleScroll() {
                if(window.scrollY > 0) {
                    navbar.classList.add("nav-bg");
                } else {
                    navbar.classList.remove("nav-bg");
                }
            },
            callLogin() {
                this.$store.dispatch("user/login", this.$data.login);
            }
        },
        mounted(){
            this.handleScroll();
            window.addEventListener('scroll', this.handleScroll);
        }
    }
</script>

<style>
    #navbar {
        background: transparent;
    }

    #navbar .search-lg {
        display: flex;
        align-items: center;
    }

    #navbar .search-md {
        display: none;
    }

    @media only screen and (max-width: 959px) {
        #navbar .search-lg {
            display: none;
        }

        #navbar .search-md {
            display: block;
        }
    }

    .nav-bg {
        background: linear-gradient(to right, #E7E1F7, #FCBFBB)!important;
    }

    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, a.v-list-item, .v-chip:hover {
        text-decoration: none;
    }
</style>