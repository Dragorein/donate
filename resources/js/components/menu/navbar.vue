<template>

    <v-app-bar id="navbar" fixed elevate-on-scroll class="py-4 h-auto">
        <v-row>
            <v-col class="d-flex justify-start align-center" cols="3">
                <v-toolbar-title @click="reroutes('/')" class="headline font-weight-medium" style="cursor: pointer">
                    <v-icon color="black" left>mdi-hand-heart mdi-36px</v-icon>Kindly
                </v-toolbar-title>
            </v-col>
            
            <v-col class="d-flex justify-space-around align-center">
                <v-text-field background-color="transparent" @mousedown="reroutes('search')" solo hide-details dense label="Cari penggalangan dana disini" append-icon="search"></v-text-field>
            </v-col>
            
            <v-col cols="3" class="d-flex justify-end">
                <v-toolbar-items>
                    <v-chip href="profil" class="ma-2" color="blue-grey lighten-5">
                        <v-avatar left>
                            <v-icon>mdi-account-circle</v-icon>
                        </v-avatar>
                        John
                    </v-chip>
                    <v-btn href="keluar" text small>
                        Keluar<v-icon right>mdi-logout-variant</v-icon>
                    </v-btn>
                </v-toolbar-items>
            </v-col>
        </v-row>
    </v-app-bar>

</template>

<script>
    export default {
        data: () => ({
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
            window.addEventListener('scroll', this.handleScroll);
        }
    }
</script>

<style>
    #navbar {
        background: transparent;
    }

    .nav-bg {
        background: linear-gradient(rgba(255,255,255,1), rgba(255,255,255,.7))!important;
    }

    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, .v-chip:hover {
        text-decoration: none;
    }
</style>