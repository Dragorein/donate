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
                                            <template>
                                            <div class="text-center">
                                                <v-dialog
                                                v-model="dialog"
                                                width="500"
                                                >
                                                <template v-slot:activator="{ on }">
                                                    <v-btn large color="error" v-on="on" class="mt-6" >Bantu sekarang</v-btn>
                                                </template>
                                                    <v-card max-width="500">
                                                        <v-img
                                                        class="white--text align-end"
                                                        height="200px"
                                                        src="https://www.voyagerit.com/wp-content/uploads/2019/03/GettyImages-968545728.jpg"
                                                        >
                                                        <v-card-title></v-card-title>
                                                        </v-img>

                                                        <v-card-subtitle class="pb-0 mt-2">Kindly tidak memfasilitasi penggalangan dana untuk : </v-card-subtitle>
                                                         <v-chip class="ma-2 ml-6" color="red lighten-3" label="1">
                                                            <v-avatar left>
                                                                <v-icon color="red darken-1">mdi-cancel</v-icon>
                                                            </v-avatar>
                                                            Galang dana untuk diri sendiri
                                                            </v-chip>
                                                            <v-chip class="ma-2 ml-6" color="red lighten-3" label="1">
                                                            <v-avatar left>
                                                                <v-icon color="red darken-1">mdi-cancel</v-icon>
                                                            </v-avatar>
                                                            Penggalangan dana fiktif
                                                            </v-chip>
                                                            <v-chip class="ma-2 ml-6" color="red lighten-3" label="1">
                                                            <v-avatar left>
                                                                <v-icon color="red darken-1">mdi-cancel</v-icon>
                                                            </v-avatar>
                                                            Galang dana untuk kegiatan radikalisme & terorisme
                                                            </v-chip>




                                                        <v-card-actions>
                                                            <v-btn href="/start" block color="success" class="my-3" large dark>
                                                                Ya,saya mengerti
                                                            </v-btn>
                                                        </v-card-actions>
                                                    </v-card>
                                                </v-dialog>
                                            </div>
                                            </template>
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
                        <v-col v-for="submission in submissions.data" v-if="submission.kekurangan_donasi < 2" :key="submission.submission_id" cols="12" sm="6" md="4">
                        <v-hover v-slot:default="{ hover }">
                            <v-card :elevation="hover ? 24 : 6" class="my-4 card-transform">
                                <router-link :to="'/campaign/'+submission.submisi_id"><v-img :src="'/picture/' + submission.submisi_foto" height="200px"></v-img></router-link>

                                <v-card-title v-text="submission.submisi_judul"></v-card-title>

                                <v-card-subtitle v-text="submission.user_name"></v-card-subtitle>

                                <v-card-text>
                                    <v-progress-linear rounded height="8" v-model="submission.kekurangan_donasi" color="deep-orange"></v-progress-linear>
                                </v-card-text>

                                <v-card-text class="d-flex justify-space-between">
                                    <span><strong class="deep-orange--text title">{{submission.total_donasi}}</strong> Terkumpul</span>
                                    <span><strong class="deep-orange--text title">{{submission.day_left}}</strong> hari lagi</span>
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
                        <v-col v-for="submission in submissions.data" v-if="submission.kekurangan_donasi > 2" :key="submission.submission_id" cols="12" sm="6" md="4">
                        <v-hover v-slot:default="{ hover }">
                            <v-card :elevation="hover ? 24 : 6" class="my-4 card-transform">
                                <router-link :to="'/campaign/'+submission.submisi_id"><v-img :src="'/picture/' + submission.submisi_foto" height="200px"></v-img></router-link>

                                <v-card-title v-text="submission.submisi_judul"></v-card-title>

                                <v-card-subtitle v-text="submission.user_name"></v-card-subtitle>

                                <v-card-text>
                                    <v-progress-linear rounded height="8" v-model="submission.kekurangan_donasi" color="deep-orange"></v-progress-linear>
                                </v-card-text>

                                <v-card-text class="d-flex justify-space-between">
                                    <span><strong class="deep-orange--text title">{{submission.total_donasi}}</strong> Terkumpul</span>
                                    <span><strong class="deep-orange--text title">{{submission.day_left}}</strong> hari lagi</span>
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
        data () {
        return {
        dialog: false,
         }
    },
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
            submissions: []
        }),
        created() {
            this.loadData();
        },
        methods: {
            loadData() {
            axios.get("/api/").then(response => {
                this.submissions = response.data;
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
