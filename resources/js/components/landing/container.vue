<template>
<v-app>
    <navbar></navbar>

    <main class="h-100">
        <div class="fluid">
            <section class="top-space bg-section-1">
                <v-container class="py-12">
                    <v-carousel cycle height="500" delimiter-icon="mdi-minus" hide-delimiter-background show-arrows-on-hover class="elevation-24" style="border-radius:4px;">
                        <v-carousel-item v-for="(slide, i) in slides" :key="i" :src="items[i]" gradient="rgba(255,255,255,.8), rgba(255,255,255,0.3)">
                                <v-row class="fill-height" align="center" justify="center">
                                    <v-col>
                                        <v-row justify="center">
                                            <div class="display-3">Salindia {{ slide }}</div>
                                        </v-row>
                                        <v-row justify="center">
                                            <v-btn large class="mt-6">Bantu sekarang</v-btn>
                                        </v-row>
                                    </v-col>
                                </v-row>
                        </v-carousel-item>
                    </v-carousel>
                </v-container>
            </section>

            <section class="bg-section-2" style="border-radius:">
                <v-container class="py-12">
                    <h1 class="display-1 font-weight-bold text-center">Bantu siapa hari ini ?</h1>
                    <v-row>
                        <v-col v-for="(card, index) in cards" v-if="index < 6" :key="card.title" cols="12" sm="6" md="4">
                        <v-hover v-slot:default="{ hover }">
                            <v-card @click="reroutes('/campaign/detail')" :elevation="hover ? 24 : 6" class="my-4 card-transform">
                                <v-img :src="card.src" height="200px"></v-img>

                                <v-card-title v-text="card.title"></v-card-title>

                                <v-card-subtitle v-text="card.author"></v-card-subtitle>

                                <v-card-text>
                                    <v-progress-linear rounded height="8" v-model="card.progress" color="yellow accent-4"></v-progress-linear>
                                </v-card-text>

                                <v-card-text class="d-flex justify-space-between">
                                    <span><strong class="orange--text title">{{card.raised}}</strong> Terkumpul</span>
                                    <span><strong class="orange--text title">{{card.daysleft}}</strong> hari lagi</span>
                                </v-card-text>

                                <v-divider class="my-0 mx-4"></v-divider>

                                <v-card-text>
                                    <v-chip class="mr-2">
                                        <v-icon left>mdi-charity</v-icon>Galang
                                    </v-chip>
                                    <v-chip class="mr-2">
                                        <v-icon left>mdi-cash-usd</v-icon>Dana
                                    </v-chip>
                                </v-card-text>
                            </v-card>
                        </v-hover>
                        </v-col>
                    </v-row>
                    <v-row justify="center">
                        <v-btn @click="reroutes('/campaign')" text large class="font-weight-bold">Lihat semua<v-icon right>mdi-arrow-top-right mdi-rotate-45</v-icon></v-btn>
                    </v-row>
                </v-container>
            </section>

            <section class="yellow lighten-1">
                <v-container class="py-12">
                    <h1 class="display-1 font-weight-bold text-center">Mengapa Kindly ?</h1>
                    <v-row>
                        <v-col>
                            <p class="text-center">Karena bla bla bla</p>
                        </v-col>
                    </v-row>
                </v-container>
            </section>
        </div>
    </main>

    <footbar></footbar>
</v-app>
</template>

<script>
    export default {
        data: () => ({
            items: [
                'https://cdn.vuetifyjs.com/images/cards/sunshine.jpg',
                'https://cdn.vuetifyjs.com/images/cards/house.jpg',
                'https://cdn.vuetifyjs.com/images/cards/docks.jpg',
                'https://cdn.vuetifyjs.com/images/cards/halcyon.png',
                'https://cdn.vuetifyjs.com/images/cards/plane.jpg',
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
                {title:'Supermodel', src:'https://cdn.vuetifyjs.com/images/cards/sunshine.jpg', author:'Louise', progress:50, raised:'Rp 3.003.132', daysleft:'30'},
            ],
        }),
        methods: {
            reroutes: function (url) {
                this.$router.push({ path: url });
            }
        }
    }
</script>

<style>
    .bg-section-1 {
        background: #F2F2F2;
    }

    .bg-section-2 {
        background: white;
    }

    section .v-card {
        transition: 0.2s cubic-bezier(0.4, 0, 0.2, 1) all;
    }

    section .card-transform:hover {
        transform: translatey(-10px);
    }

    .top-space {
        padding-top: 96px!important;
    }

    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, .v-chip:hover {
        text-decoration: none;
    }
    /*@import './assets/styles/yourstyles.css';*/
</style>