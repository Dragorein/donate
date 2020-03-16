<template>
    <v-app>
        <main>

            <v-toolbar flat dense extended>
                <v-row>
                    <v-col class="d-flex justify-space-around align-center" cols="3">
                        <v-toolbar-title>KitaBantu</v-toolbar-title>
                    </v-col>
                    <v-col class="d-flex justify-space-around align-center">
                        <v-text-field solo hide-details dense label="Cari penggalangan dana disini" append-icon="search"></v-text-field>
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
                <v-row slot="extension">
                    <v-col class="d-flex justify-center align-center">
                        <v-btn href="donasi" text>Donasi</v-btn>
                        <v-btn href="galang" text>Galang Dana</v-btn>
                        <v-btn href="bantuan" text>Bantuan</v-btn>
                    </v-col>   
                </v-row>
            </v-toolbar>

            <v-container class="fluid my-5">

                <v-carousel cycle height="400" delimiter-icon="mdi-minus" hide-delimiter-background show-arrows-on-hover>
                    <v-carousel-item v-for="(slide, i) in slides" :key="i">
                        <v-sheet :color="colors[i]" height="100%">
                            <v-row class="fill-height" align="center" justify="center">
                                <div class="display-3">Salindia {{ slide }}</div>
                            </v-row>
                        </v-sheet>
                    </v-carousel-item>
                </v-carousel>

                <v-row justify="center">
                    <v-col v-for="card in cards" :key="card.title" cols="12" md="4">
                        <v-card class="my-4">
                            <v-img :src="card.src" height="200px"></v-img>
                            <v-card-title v-text="card.title"></v-card-title>
                            <v-card-subtitle v-text="card.author"></v-card-subtitle>
                            <v-card-actions>
                                <v-btn text v-text="'Terkumpul ' + card.raised"></v-btn>
                                <v-spacer></v-spacer>
                                <v-btn color="orange" text v-text="card.daysleft + ' hari lagi'"></v-btn>
                            </v-card-actions>
                            <v-progress-linear height="8" v-model="card.progress" color="yellow accent-4"></v-progress-linear>
                        </v-card>
                    </v-col>
                </v-row>

            </v-container>
            
            <v-footer dark padless>
                <v-card flat tile class="orange lighten-1 white--text text-center w-100">
                    <v-card-text>
                        <v-btn v-for="icon in icons" :key="icon" class="mx-4 white--text" icon>
                        <v-icon size="24px">{{ icon }}</v-icon>
                        </v-btn>
                    </v-card-text>

                    <v-card-text class="white--text pt-0">
                        Perjalanan hidup ini indah ketika kita mampu berbagi, bukan menikmatinya sendiri.
                    </v-card-text>

                    <v-divider></v-divider>

                    <v-card-text class="white--text">
                        {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
                    </v-card-text>
                </v-card>
            </v-footer>

        </main>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            colors: [
                'orange',
                'indigo',
                'pink darken-2',
                'red lighten-1',
                'deep-purple accent-4',
            ],
            slides: [
                'Pertama',
                'Kedua',
                'Ketiga',
                'Keempat',
                'Kelima',
            ],
            cards: [
                {title:'Supermodel', src:'https://cdn.vuetifyjs.com/images/cards/sunshine.jpg', author:'Louise', progress:50, raised:'Rp 3.003.132', daysleft:'30'},
                {title:'Halcyon Days', src:'https://cdn.vuetifyjs.com/images/cards/house.jpg', author:'Danny', progress:80, raised:'Rp 5.012.500', daysleft:'3'},
                {title:'Top western road trips', src:'https://cdn.vuetifyjs.com/images/cards/docks.jpg', author:'Rachel', progress:5, raised:'Rp 176.320', daysleft:'56'},
                {title:'Unlimited music now', src:'https://cdn.vuetifyjs.com/images/cards/halcyon.png', author:'Ellie', progress:100, raised:'Rp 152.901.000', daysleft:'1'},
                {title:'Best airlines', src:'https://cdn.vuetifyjs.com/images/cards/plane.jpg', author:'Tommy', progress:60, raised:'Rp 16.251.026', daysleft:'23'},
            ],
            icons: [
                'mdi-facebook-box',
                'mdi-twitter',
                'mdi-google-plus',
                'mdi-linkedin',
                'mdi-instagram',
            ],
        }),
    }
</script>

<style>
    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, .v-chip:hover {
        text-decoration: none;
    }
</style>