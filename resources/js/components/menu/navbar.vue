<template>

    <v-app-bar id="navbar" fixed elevate-on-scroll class="py-2 h-auto">
        <v-row>
            <v-col class="d-flex align-center">
                <v-toolbar-title @click="reroutes('/')" class="headline font-weight-medium d-flex align-center" style="cursor: pointer">
                    <v-icon color="red lighten-1" left>mdi-alpha-k-circle mdi-36px</v-icon>Kindly
                </v-toolbar-title>
            </v-col>
            
            <v-col class="search-lg" cols="6">
                <v-text-field background-color="transparent" @mousedown="reroutes('/search')" solo hide-details dense label="Cari penggalangan dana disini" append-icon="search"></v-text-field>
            </v-col>
            
            <v-col class="d-flex justify-end align-center">
                <v-btn class="search-md mr-2" @mousedown="reroutes('/search')" icon><v-icon>mdi-magnify</v-icon></v-btn>
                    <template v-if="loggedin == false">
                        <v-dialog v-model="logindialog" max-width="600px">
                            <template v-slot:activator="{ on }">
                                <v-btn large color="red" dark v-on="on">
                                    Masuk<v-icon right>mdi-login-variant</v-icon>
                                </v-btn>
                            </template>

                            <v-card tile color="#F1F1F1">
                                <v-card-title class="d-flex justify-center pt-6">
                                    <div class="headline">Masuk</div>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" class="py-0">
                                                <v-text-field solo flat label="Email" required></v-text-field>
                                            </v-col>
                                            <v-col cols="12" class="py-0">
                                                <v-text-field solo flat label="Password" type="password" required></v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-btn color="success darken-1" block large @click="logindialog = false, loggedin = true">Masuk Sekarang</v-btn>
                                            </v-col>
                                            <v-col cols="12" class="text-center">
                                                <p>Belum punya akun Kindly? <a href="register">Daftar</a></p>
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
                                    <v-icon left>mdi-account-circle mdi-24px</v-icon>John
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-item @click="reroutes('/profile')">
                                    <v-list-item-title>
                                        <v-icon left>mdi-account-search</v-icon>Profil
                                    </v-list-item-title>
                                </v-list-item>
                                <v-list-item @click="loggedin = false">
                                    <v-list-item-title>
                                        <v-icon left>mdi-logout-variant</v-icon>Keluar
                                    </v-list-item-title>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </template>
            </v-col>
        </v-row>
    </v-app-bar>

</template>

<script>
    export default {
        data: () => ({
            loggedin: false,
            logindialog: false,
            navbar: '#navbar',
        }),
        methods: {
            reroutes: function (url) {
                this.$router.push({ path: url });
            },
            handleScroll: function() {
                if(window.scrollY > 0) {
                    navbar.classList.add("nav-bg");
                } else {
                    navbar.classList.remove("nav-bg");
                }
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
        background: linear-gradient(rgba(255,255,255,1), rgba(255,255,255,.8))!important;
    }

    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, a.v-list-item, .v-chip:hover {
        text-decoration: none;
    }
</style>