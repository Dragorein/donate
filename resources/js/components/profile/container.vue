<template>
<v-app>
    <navbar></navbar>

    <main class="h-100">
        <div class="fluid">
            <section class="top-space bg-section-1">
                <v-container class="py-12">
                    <v-card>
                        <v-row>
                            <v-col cols="12" md="6">
                                <v-card-text>
                                    <div class="d-flex align-center mx-4 mr-md-0">
                                        <v-avatar size="96" left>
                                            <img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John">
                                        </v-avatar>
                                        <div class="mx-3">
                                            <v-card-title class="headline font-weight-bold pb-6">John<v-icon right color="green">mdi-check-circle mdi-18px</v-icon></v-card-title>
                                            <v-card-subtitle>Identitas terverifikasi</v-card-subtitle>
                                        </div>
                                    </div>
                                </v-card-text>
                            </v-col>
                            <v-col cols="12" md="6">
                                <v-card flat color="orange lighten-4" class="mx-4 ml-md-0">
                                    <v-card-text>
                                        <v-row>
                                            <v-col cols="12" md="auto">
                                                <v-card-subtitle class="py-1">Pasien terdonasikan</v-card-subtitle>
                                                <v-card-title class="headline font-weight-bold py-1">Rp 1.521.420</v-card-title>
                                            </v-col>
                                            <v-col cols="12" md="auto">
                                                <v-card-subtitle class="py-1">Pasien terdonasikan</v-card-subtitle>
                                                <v-card-title class="headline font-weight-bold py-1">10</v-card-title>
                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                </v-card>
                            </v-col>
                        </v-row>
                    </v-card>
                </v-container>
            </section>

            <section class="bg-section-2">
                <v-container class="py-12">
                    <v-card>
                        <v-tabs vertical hide-slider background-color="orange" dark>
                            <v-tab>
                                <v-icon left>mdi-account</v-icon>Penggalangan Aktif
                            </v-tab>
                            <v-tab>
                                <v-icon left>mdi-charity</v-icon>Riwayat Penggalangan
                            </v-tab>
                            <v-tab>
                                <v-icon left>mdi-history</v-icon>Riwayat Donasi
                            </v-tab>
                            <v-tab>
                                <v-icon left>mdi-account-edit</v-icon>Edit Profil
                            </v-tab>

                            <v-tab-item class="w-auto">
                                <v-card>
                                    <div class="d-flex">
                                    
                                    </div>
                                </v-card>
                            </v-tab-item>
                            <v-tab-item>
                                
                            </v-tab-item>
                            <v-tab-item>
                                
                            </v-tab-item>
                            <v-tab-item>
                                
                            </v-tab-item>
                        </v-tabs>
                    </v-card>
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
            actives: [
                {title:'Best airlines', src:'https://cdn.vuetifyjs.com/images/cards/plane.jpg', author:'Tommy', progress:60, raised:'Rp 16.251.026', daysleft:'23'},
                {title:'Supermodel', src:'https://cdn.vuetifyjs.com/images/cards/sunshine.jpg', author:'Louise', progress:50, raised:'Rp 3.003.132', daysleft:'30'},
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

    .v-tab {
        justify-content: start;
    }

    @media only screen and (max-width: 600px) {
        .v-tabs--vertical {
            flex-direction: column;
        }
    }
    /*@import './assets/styles/yourstyles.css';*/
</style>