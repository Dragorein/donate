<template>
<v-app>
    <navbar/>

    <main class="h-100">
        <div class="fluid">
            <section class="top-space bg-section-1">
                <v-container class="pb-6">
                    <v-row>
                        <v-col cols="12">
                            <v-card>
                                <v-img :src="'/storage/submission/'+submission.submisi_foto" height="450px"></v-img>
                                <v-card-text>
                                    <h2 style="display-1" >{{submission.submisi_judul}}</h2>
                                    <span><strong class="deep-orange--text title">{{submission.submisi_terkumpul}}</strong>{{' Terkumpul dari ' + submission.submisi_target}}</span>
                                    <v-progress-linear rounded height="8" v-model="submission.kekurangan_donasi" color="deep-orange" class="my-4"></v-progress-linear>
                                    <span v-if="submission.submisi_is_active"><strong class="deep-orange--text title" >{{submission.sisa_hari}}</strong> hari lagi</span>
                                </v-card-text>

                                <v-card-text>
                                    <v-btn @click="reroutes('/payment/'+$route.params.id)" rounded block depressed large color="error" v-if="submission.submisi_is_active">Donasi Sekarang</v-btn>
                                    <v-btn rounded block depressed large disabled v-else>Donasi Telah Berakhir</v-btn>
                                </v-card-text>
                            </v-card>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col cols="12" md="6">
                            <v-card>
                                <v-card-title class="title">Penggalang</v-card-title>
                                <v-card-text>
                                    <div class="d-flex align-center pl-4">
                                        <v-avatar left>
                                            <img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John">
                                        </v-avatar>
                                        <div class="mx-3">
                                            <span class="green--text">{{submission.user_name}}<v-icon right color="green">mdi-check-circle mdi-18px</v-icon></span>
                                            <div class="caption">Identitas terverifikasi</div>
                                        </div>
                                    </div>
                                </v-card-text>
                            </v-card>
                        </v-col>

                        <v-col cols="12" md="6">
                            <v-card>
                                <v-card-title class="title">Penerima Manfaat</v-card-title>
                                <v-card-text>
                                    <div class="d-flex align-center pl-4">
                                        <v-avatar left>
                                            <v-icon>mdi-account-circle mdi-48px</v-icon>
                                        </v-avatar>
                                        <div class="mx-3">
                                            <span>{{submission.submisi_penerima}}</span>
                                            <div class="caption">Sesuai dokumen medis<v-icon color="green">mdi-check-circle-outline mdi-18px</v-icon></div>
                                        </div>
                                    </div>
                                </v-card-text>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-container>
            </section>

            <section class=" bg-section-2">
                <v-container class="py-6">
                    <v-row>
                        <v-col cols="12" md="8">
                            <v-card height="100%">
                                <v-tabs v-model="tab" background-color="error" centered dark icons-and-text>
                                    <v-tabs-slider></v-tabs-slider>

                                    <v-tab href="#tab-1">
                                        Cerita <v-icon>mdi-account-search</v-icon>
                                    </v-tab>

                                    <v-tab href="#tab-2">
                                        Perkembangan <v-icon>mdi-account-heart mdi-flip-h</v-icon>
                                    </v-tab>

                                    <v-tab href="#tab-3">
                                        Rincian Dana <v-icon>mdi-cash-usd</v-icon>
                                    </v-tab>
                                </v-tabs>

                                <v-tabs-items v-model="tab">
                                    <v-tab-item v-for="i in 3" :key="i" :value="'tab-' + i">
                                        <v-card flat>
                                            <v-card-text>{{ submission.submisi_cerita }}</v-card-text>
                                        </v-card>
                                    </v-tab-item>
                                </v-tabs-items>
                            </v-card>
                        </v-col>

                        <v-col cols="12" md="4">
                            <v-card class="mx-auto">
                                <v-list two-line dense>
                                    <v-subheader class="title" v-text="donations.length >= 1 ? 'Donatur (' + donations.length + ')' : 'Donatur (0)'"></v-subheader>
                                    <template v-for="(donation, index) in donations" v-if="index < 5">
                                        <v-list-item :key="donation.donation_id" >
                                        <v-list-item-avatar>
                                            <v-icon>mdi-account-circle</v-icon>
                                        </v-list-item-avatar>

                                        <v-list-item-content>
                                            <v-list-item-title>{{donation.donation_name}}</v-list-item-title>
                                            <v-list-item-subtitle>{{'Donasi ' +donation.donation_nominal}}</v-list-item-subtitle>
                                        </v-list-item-content>
                                        </v-list-item>
                                    </template>
                                </v-list>
                                <template v-if="donations.length > 5">
                                    <v-btn block text large>Lihat lebih<v-icon right>mdi-dots-horizontal</v-icon></v-btn>
                                </template>
                            </v-card>
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
            tab: null,
            submission: [],
            donations: [],
        }),
        created() {
            this.loadDataSubmisi();
        },
        methods: {
            loadDataSubmisi() {
                axios
                .get("/api/campaign/"+this.$route.params.id)
                .then(response=> {
                    this.$data.submission = response.data.submission;
                    this.$data.donations = response.data.donations;
                })
            },
            reroutes: function (url) {
                this.$router.push({ path: url });
            }
        }
    }
</script>

<style>
    .top-space {
        padding-top: 96px!important;
    }

    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, .v-chip:hover, .v-tab:hover {
        text-decoration: none;
    }
</style>