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
                                <v-img :src="'/picture/'+foto" height="450px"></v-img>
                                <v-card-text>
                                    <h2 style="display-1" >{{ title }}</h2>
                                    <span><strong class="deep-orange--text title">{{ raised }}</strong>{{' Terkumpul dari ' + total}}</span>
                                    <v-progress-linear rounded height="8" v-model="progress" color="deep-orange" class="my-4"></v-progress-linear>
                                    <span><strong class="deep-orange--text title">{{daysleft}}</strong> hari lagi</span>
                                </v-card-text>

                                <v-card-text>
                                    <v-btn @click="reroutes('/payment')" rounded block depressed large color="error">Donasi Sekarang</v-btn>
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
                                            <span class="green--text">{{author}}<v-icon right color="green">mdi-check-circle mdi-18px</v-icon></span>
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
                                            <span>{{target}}</span>
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
                                            <v-card-text>{{ text }}</v-card-text>
                                        </v-card>
                                    </v-tab-item>
                                </v-tabs-items>
                            </v-card>
                        </v-col>

                        <v-col cols="12" md="4">
                            <v-card class="mx-auto">
                                <v-list two-line dense>
                                    <template v-for="item in items">
                                        <v-subheader class="title" v-if="item.header" :key="item.header" v-text="item.header + ' (' + (items.length - 1) + ')'"></v-subheader>

                                        <v-list-item  v-else :key="item.donatur_id" >
                                        <v-list-item-avatar>
                                            <v-img :src="item.avatar"></v-img>
                                        </v-list-item-avatar>

                                        <v-list-item-content>
                                            <v-list-item-title v-html="item.donatur_mail"></v-list-item-title>
                                            <v-list-item-subtitle>Donasi Sebesar Rp. {{item.donatur_nominal}}</v-list-item-subtitle>
                                        </v-list-item-content>
                                        </v-list-item>
                                    </template>
                                </v-list>
                                <v-btn block text large>Lihat lebih<v-icon right>mdi-dots-horizontal</v-icon></v-btn>
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
            title:"",
            foto:"",
            author:'',
            target:"",
            progress:"",
            raised:"",
            total:"",
            daysleft:"",
            tab: null,
            text: "",
            items: [
                { header : 'Donatur'},
            ],
        }),
        created() {
            // load data saat pertama kali halaman dibuka
            this.loadDataSubmisi();
        },
        methods: {
            loadDataSubmisi() {
            axios.all([
                axios.get("http://localhost:8000//api/DataSubmision/"+this.$route.params.id),
                axios.get("http://localhost:8000//api/DataDonatur/"+this.$route.params.id)
            ])
            .then(axios.spread((DataSubmision,DataDonatur)=> {
                    this.title = DataSubmision.data[0].submisi_judul;
                    this.items = DataDonatur.data;
                    this.foto = DataSubmision.data[0].submisi_foto;
                    this.raised = DataSubmision.data[0].jumlah_donatur;
                    this.total = DataSubmision.data[0].total_donasi;
                    this.text = DataSubmision.data[0].submisi_cerita;
                    this.target = DataSubmision.data[0].submisi_penerima;
                    this.author = DataSubmision.data[0].user_name;
                    this.progress = DataSubmision.data[0].kekurangan_donasi;
                    this.daysleft = DataSubmision.data[0].day_left;
                }))
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