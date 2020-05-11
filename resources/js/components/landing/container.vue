<template>
<v-app>
    <navbar/>

    <main class="h-100">
        <div class="fluid">
            <section class="bg-section-1">
                <div>
                    <v-carousel height="600" cycle delimiter-icon="mdi-minus" hide-delimiter-background show-arrows-on-hover>
                        <v-carousel-item v-for="(slide, i) in slides" :key="i" :src="items[i]" gradient="rgba(255,255,255,.8), rgba(255,255,255,0.3)">
                                <v-row class="fill-height" align="center" justify="center">
                                    <v-col>
                                        <v-row justify="center">
                                            <div class="display-3">Salindia {{ slide }}</div>
                                        </v-row>
                                        <v-row justify="center">
                                            <v-btn large color="error" class="mt-6">Bantu sekarang</v-btn>
                                        </v-row>
                                    </v-col>
                                </v-row>
                        </v-carousel-item>
                    </v-carousel>
                </div>
            </section>

            <section class="bg-section-2">
                <v-container class="py-12 px-lg-12">
                    <h1 class="display-1 font-weight-bold text-center">Bantu siapa hari ini ?</h1>
                    <v-row>
                        <v-col v-for="submisi in submisis" :key="submisi.submisi_id" cols="12" sm="6" md="4">
                        <v-hover v-slot:default="{ hover }">
                             <v-card @click="reroutes('/campaign/detail')" :elevation="hover ? 24 : 6" class="my-4 card-transform">
                                <v-img :src="'/picture/' + submisi.submisi_foto" height="200px"></v-img>

                                <v-card-title v-text="submisi.submisi_judul"></v-card-title>

                                <v-card-subtitle v-text="submisi.user_name"></v-card-subtitle>

                                <v-card-text>
                                    <v-progress-linear rounded height="8" v-model="submisi.kekurangan_donasi" color="deep-orange"></v-progress-linear>
                                </v-card-text>

                                <v-card-text class="d-flex justify-space-between">
                                    <span><strong class="deep-orange--text title">{{submisi.total_donasi}}</strong> Terkumpul</span>
                                    <span><strong class="deep-orange--text title">{{submisi.day_left}}</strong> hari lagi</span>
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

            <section class="bg-section-1">
                <v-container class="py-12 px-lg-12">
                    <h1 class="display-1 font-weight-bold text-center">Pilihan kami</h1>
                    <v-row>
                        <v-col v-for="submisi in submisis" :key="submisi.submisi_id" cols="12" sm="6" md="4">
                        <v-hover v-slot:default="{ hover }">
                            <v-card @click="reroutes('/campaign/detail')" :elevation="hover ? 24 : 6" class="my-4 card-transform">
                                <v-img :src="card.src" height="200px"></v-img>

                                <v-card-title v-text="card.title"></v-card-title>

                                <v-card-subtitle v-text="card.author"></v-card-subtitle>

                                <v-card-text>
                                    <v-progress-linear rounded height="8" v-model="card.progress" color="deep-orange"></v-progress-linear>
                                </v-card-text>

                                <v-card-text class="d-flex justify-space-between">
                                    <span><strong class="deep-orange--text title">{{card.raised}}</strong> Terkumpul</span>
                                    <span><strong class="deep-orange--text title">{{card.daysleft}}</strong> hari lagi</span>
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
            items: [
                'https://cdn.vuetifyjs.com/images/cards/sunshine.jpg',
                'https://cdn.vuetifyjs.com/images/cards/house.jpg',
                'https://cdn.vuetifyjs.com/images/cards/docks.jpg',
                'https://cdn.vuetifyjs.com/images/cards/halcyon.png',
                'https://cdn.vuetifyjs.com/images/cards/plane.jpg',
            ],
            submisis: [],
            slides: [
                'Pertama',
                'Kedua',
                'Ketiga',
                'Keempat',
                'Kelima',
            ],
        }),
        created() {
            this.loadData();
        },
        methods: {
            loadData() {
                axios.get("http://localhost:8000/api/").then(response => {
                    this.submisis = response.data;
                });
            },
            reroutes: function (url) {
                this.$router.push({ path: url });
            }
        }
    }
</script>

<style>
    .bg-section-1 {
        background: #FAFAFA;
    }

    .bg-section-2 {
        background: #FFEBEE;
    }

    .bg-section-3 {
        background: #5E0606;
    }

    section .v-card {
        transition: 0.2s cubic-bezier(0.4, 0, 0.2, 1) all;
    }

    section .card-transform:hover {
        transform: translatey(-10px);
    }

    .top-space {
        padding-top: 80px!important;
    }

    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, .v-chip:hover {
        text-decoration: none;
    }
    /*@import './assets/styles/yourstyles.css';*/
</style>