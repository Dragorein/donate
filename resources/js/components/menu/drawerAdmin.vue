<template>

    <v-navigation-drawer permanent expand-on-hover app>
        <v-list>
            <v-list-item link two-line dense class="px-2">
                <v-list-item-avatar>
                    <v-img src="https://randomuser.me/api/portraits/women/85.jpg"></v-img>
                </v-list-item-avatar>
                <v-list-item-content>
                    <v-list-item-title class="title">Sandra Adams</v-list-item-title>
                    <v-list-item-subtitle>Admin<v-icon right>mdi-shield-check mdi-18px</v-icon></v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </v-list>

        <v-divider/>

        <v-list nav dense>
            <v-list-item link>
                <v-list-item-icon><v-icon>mdi-apps</v-icon></v-list-item-icon>
                <v-list-item-title>Feeds</v-list-item-title>
            </v-list-item>

            <v-list-item link>
                <v-list-item-icon><v-icon>mdi-charity</v-icon></v-list-item-icon>
                <v-list-item-title>Daftar Penggalangan</v-list-item-title>
            </v-list-item>

            <v-list-item link>
                <v-list-item-icon><v-icon>mdi-cash-multiple</v-icon></v-list-item-icon>
                <v-list-item-title>Daftar Transfer</v-list-item-title>
            </v-list-item>

            <v-list-item link>
                <v-list-item-icon><v-icon>mdi-account-group</v-icon></v-list-item-icon>
                <v-list-item-title>Daftar Pengguna</v-list-item-title>
            </v-list-item>
        </v-list>
        
        <v-spacer/>

        <v-list nav dense>
            <v-list-item link>
                <v-list-item-icon><v-icon>mdi-account</v-icon></v-list-item-icon>
                <v-list-item-title>Profil</v-list-item-title>
            </v-list-item>

            <v-list-item link>
                <v-list-item-icon><v-icon>mdi-logout-variant</v-icon></v-list-item-icon>
                <v-list-item-title>Keluar</v-list-item-title>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>

</template>

<script>
    export default {
        data: () => ({
            brand: 'Kindly', 
            logo: '/img/brand.png',
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
        background: linear-gradient(to right, #E7E1F7, #FCBFBB)!important;
    }

    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, a.v-list-item, .v-chip:hover {
        text-decoration: none;
    }
</style>