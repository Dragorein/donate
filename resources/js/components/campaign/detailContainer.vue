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
                                <v-img :src="tes" height="450px"></v-img>
                                <v-card-text>
                                    <h2 style="display-1" v-text="title"></h2>
                                    <span><strong class="deep-orange--text title">{{raised}}</strong>{{' Terkumpul dari ' + total}}</span>
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
                                    <template v-for="(item, index) in items">
                                        <v-subheader class="title" v-if="item.header" :key="item.header" v-text="item.header + ' (' + (items.length - 1) + ')'"></v-subheader>

                                        <v-list-item v-else :key="item.donor" @click="">
                                        <v-list-item-avatar>
                                            <v-img :src="item.avatar"></v-img>
                                        </v-list-item-avatar>

                                        <v-list-item-content>
                                            <v-list-item-title v-html="item.donor"></v-list-item-title>
                                            <v-list-item-subtitle v-html="item.comments"></v-list-item-subtitle>
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
            title:[],
            tes:"",
            author:'Louise',
            target:'Josh',
            progress:50,
            raised:'Rp 3.003.132',
            total:'Rp 10.000.000',
            daysleft:'30',
            tab: null,
            text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            items: [
                { header : 'Donatur'},
                {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
                donor: 'Ali Connors',
                comments: "I'll be in your neighborhood doing errands this weekend. Do you want to hang out?",
                },
                {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
                donor: 'Alex Scott',
                comments: "Wish I could come, but I'm out of town this weekend.",
                },
                {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
                donor: 'Sandra Adams',
                comments: "Do you have Paris recommendations? Have you ever been?",
                },
                {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
                donor: 'Rachel',
                comments: "Have any ideas about what we should get Heidi for her birthday?",
                },
                {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/5.jpg',
                donor: 'Britta Holt',
                comments: "We should eat this: Grate, Squash, Corn, and tomatillo Tacos.",
                },
            ],
        }),
        methods: {
            loadData() {
            // load data berdasarkan id
            axios
                .get("http://localhost:8000/api/DataSubmision/" + this.$route.params.submisi_id)
                .then(response => {
                    // post value yang dari response ke form
                    this.title = response.data;
                    // console.log(response.data.submisi_foto);
                    // this.form.lastName = response.data.last_name;
                 });
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