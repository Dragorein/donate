<template>
<v-app>
    <navbar></navbar>

    <main class="h-100">
        <div class="fluid">
            <section class="top-space bg-section-1">
                <v-container class="py-12">
                    <v-row justify="start">
                        <v-col cols="1">
                            <v-avatar size="150">
                                <img
                                    src="https://cdn.vuetifyjs.com/images/john.jpg"
                                    alt="John"
                                >
                            </v-avatar>
                         </v-col>

                         <v-col cols="11" class>
                             <v-card
                                class="mx-auto"
                                max-width="800"
                                outlined
                            >
                                <v-list-item>
                                <v-list-item-content>
                                    <v-row>
                                        <v-col>
                                            <v-list-item-title class="headline mb-1">Rp100000</v-list-item-title>
                                        </v-col>
                                        <v-col>
                                            <v-list-item-title class="headline mb-1">Bantu Ginjal Aku</v-list-item-title>
                                        </v-col>
                                    </v-row>

                                    <v-list-item-subtitle class="mb-2">RAISED</v-list-item-subtitle>



                                </v-list-item-content>

                                <v-list-item-avatar
                                    tile
                                    size="80"
                                    color="grey"
                                >
                                    <img
                                    src="https://lh3.googleusercontent.com/proxy/qMRw-tdpKL3zO6nJstbVl_HzZIj0LHvLWTAnk0Q9WeG1osJfKK-g9uFuPCHIsepporukBeYL2Y-wT35xIzLMRn5pyaRERwz_-PlEz-CWV0hNffeQ-2FRbvAWcSg-5XsH_DMAqggsa7pofPIUahMGCNpH6zZTwHFDWrTVTA"
                                    alt="Galangdana"
                                     >
                                </v-list-item-avatar>
                                </v-list-item>

                            </v-card>

                         </v-col>

                        <v-col cols="2">
                            <p class="headline text-uppercase">Theodurus</p>
                            <p class="headline text-uppercase">Dewa</p>
                            <p class="headline text-uppercase">Sukietra</p>
                        </v-col>

                        <v-col cols="12" sm="6 " md="auto">
                             <v-card
                                class="mx-auto"
                                max-width="250"
                            >
                                <v-img
                                class="white--text align-end"
                                height="200px"
                                src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                                >
                                <v-card-title></v-card-title>
                                </v-img>

                                <v-card-subtitle class="pb-0">Hati Bocor</v-card-subtitle>

                                <v-card-text class="text--primary">
                                <div>Theodurs Dewa Sukietra</div>

                                <div class="mt-2">
                                    <v-progress-linear
                                    v-model="valueDeterminate"
                                    color="amber" height="16" rounded=""
                                    ></v-progress-linear>
                                </div>

                                <div class="mt-1 title">Rp100000 Terkumpul</div>
                                <div><v-icon>mdi-alarm</v-icon>30 Hari Lagi</div>
                                </v-card-text>

                                <v-card-actions>
                                 <v-dialog v-model="tutup" persistent max-width="290">
                                    <template v-slot:activator="{ on }">
                                        <v-btn color="orange" text dark v-on="on">Tutup</v-btn>
                                    </template>
                                    <v-card>
                                        <v-card-title class="headline">Anda yakin ingin menutup penggalangan dana ini ?</v-card-title>
                                        <v-card-text>Mohon di ingat aksi yang di lakukan tidak bisa di ulangi kembali.</v-card-text>
                                        <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn color="red" text @click="tutup = false">Kembali</v-btn>
                                        <v-btn color="green" text @click="tutup = false">Baik Saya Mengerti</v-btn>
                                        </v-card-actions>
                                    </v-card>
                                    </v-dialog>
                                </v-btn>

                                <v-dialog v-model="dialog" persistent max-width="600px">
                                <template v-slot:activator="{ on }">
                                    <v-btn color="orange" text dark v-on="on">Edit</v-btn>
                                </template>
                                <v-card>
                                    <v-card-title>
                                    <span class="headline">Ubah Data</span>
                                    </v-card-title>
                                    <v-card-text>
                                    <v-container>
                                        <v-row>
                                        <v-col cols="12">
                                            <v-text-field label="Nama Penggalangan*" required counter="30"></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Nominal*" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6">

                                                <v-text-field
                                                    v-model="date"
                                                    label="Tenggat Waktu"
                                                    prepend-icon="event"
                                                    readonly
                                                    v-on="on"
                                                ></v-text-field>

                                        </v-col>
                                        <v-col cols="12" sm="6">
                                            <v-autocomplete
                                            :items="['Pendidikan', 'Kesehatan', 'Pendidikan', 'Other']"
                                            label="Kategori"
                                            multiple
                                            ></v-autocomplete>
                                        </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*wajib untuk di isi</small>
                                    </v-card-text>
                                    <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialog = false">Save</v-btn>
                                    </v-card-actions>
                                </v-card>
                                </v-dialog>
                                </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-col>

                         <v-col cols="12" sm="6 " md="auto">
                             <v-card
                                class="mx-auto"
                                max-width="250"
                            >
                                <v-img
                                class="white--text align-end"
                                height="200px"
                                src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                                >
                                <v-card-title></v-card-title>
                                </v-img>

                                <v-card-subtitle class="pb-0">Hati Bocor</v-card-subtitle>

                                <v-card-text class="text--primary">
                                <div>Theodurs Dewa Sukietra</div>

                                <div class="mt-2">
                                    <v-progress-linear
                                    v-model="valueDeterminate"
                                    color="amber" height="16" rounded=""
                                    ></v-progress-linear>
                                </div>

                                <div class="mt-1 title">Rp100000 Terkumpul</div>
                                <div><v-icon>mdi-alarm</v-icon>30 Hari Lagi</div>
                                </v-card-text>

                                <v-card-actions>
                                 <v-dialog v-model="tutup" persistent max-width="290">
                                    <template v-slot:activator="{ on }">
                                        <v-btn color="orange" text dark v-on="on">Tutup</v-btn>
                                    </template>
                                    <v-card>
                                        <v-card-title class="headline">Anda yakin ingin menutup penggalangan dana ini ?</v-card-title>
                                        <v-card-text>Mohon di ingat aksi yang di lakukan tidak bisa di ulangi kembali.</v-card-text>
                                        <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn color="red" text @click="tutup = false">Kembali</v-btn>
                                        <v-btn color="green" text @click="tutup = false">Baik Saya Mengerti</v-btn>
                                        </v-card-actions>
                                    </v-card>
                                    </v-dialog>
                                </v-btn>

                                <v-dialog v-model="dialog" persistent max-width="600px">
                                <template v-slot:activator="{ on }">
                                    <v-btn color="orange" text dark v-on="on">Edit</v-btn>
                                </template>
                                <v-card>
                                    <v-card-title>
                                    <span class="headline">Ubah Data</span>
                                    </v-card-title>
                                    <v-card-text>
                                    <v-container>
                                        <v-row>
                                        <v-col cols="12">
                                            <v-text-field label="Nama Penggalangan*" required counter="30"></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Nominal*" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6">

                                                <v-text-field
                                                    v-model="date"
                                                    label="Tenggat Waktu"
                                                    prepend-icon="event"
                                                    readonly
                                                    v-on="on"
                                                ></v-text-field>

                                        </v-col>
                                        <v-col cols="12" sm="6">
                                            <v-autocomplete
                                            :items="['Pendidikan', 'Kesehatan', 'Pendidikan', 'Other']"
                                            label="Kategori"
                                            multiple
                                            ></v-autocomplete>
                                        </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*wajib untuk di isi</small>
                                    </v-card-text>
                                    <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialog = false">Save</v-btn>
                                    </v-card-actions>
                                </v-card>
                                </v-dialog>
                                </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-col>

                        <v-col cols="12" sm="6 " md="auto">
                             <v-card
                                class="mx-auto"
                                max-width="250"
                            >
                                <v-img
                                class="white--text align-end"
                                height="200px"
                                src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                                >
                                <v-card-title></v-card-title>
                                </v-img>

                                <v-card-subtitle class="pb-0">Hati Bocor</v-card-subtitle>

                                <v-card-text class="text--primary">
                                <div>Theodurs Dewa Sukietra</div>

                                <div class="mt-2">
                                    <v-progress-linear
                                    v-model="valueDeterminate"
                                    color="amber" height="16" rounded=""
                                    ></v-progress-linear>
                                </div>

                                <div class="mt-1 title">Rp100000 Terkumpul</div>
                                <div><v-icon>mdi-alarm</v-icon>30 Hari Lagi</div>
                                </v-card-text>

                                <v-card-actions>
                                 <v-dialog v-model="tutup" persistent max-width="290">
                                    <template v-slot:activator="{ on }">
                                        <v-btn color="orange" text dark v-on="on">Tutup</v-btn>
                                    </template>
                                    <v-card>
                                        <v-card-title class="headline">Anda yakin ingin menutup penggalangan dana ini ?</v-card-title>
                                        <v-card-text>Mohon di ingat aksi yang di lakukan tidak bisa di ulangi kembali.</v-card-text>
                                        <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn color="red" text @click="tutup = false">Kembali</v-btn>
                                        <v-btn color="green" text @click="tutup = false">Baik Saya Mengerti</v-btn>
                                        </v-card-actions>
                                    </v-card>
                                    </v-dialog>
                                </v-btn>

                                <v-dialog v-model="dialog" persistent max-width="600px">
                                <template v-slot:activator="{ on }">
                                    <v-btn color="orange" text dark v-on="on">Edit</v-btn>
                                </template>
                                <v-card>
                                    <v-card-title>
                                    <span class="headline">Ubah Data</span>
                                    </v-card-title>
                                    <v-card-text>
                                    <v-container>
                                        <v-row>
                                        <v-col cols="12">
                                            <v-text-field label="Nama Penggalangan*" required counter="30"></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field label="Nominal*" required></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6">

                                                <v-text-field
                                                    v-model="date"
                                                    label="Tenggat Waktu"
                                                    prepend-icon="event"
                                                    readonly
                                                    v-on="on"
                                                ></v-text-field>

                                        </v-col>
                                        <v-col cols="12" sm="6">
                                            <v-autocomplete
                                            :items="['Pendidikan', 'Kesehatan', 'Pendidikan', 'Other']"
                                            label="Kategori"
                                            multiple
                                            ></v-autocomplete>
                                        </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*wajib untuk di isi</small>
                                    </v-card-text>
                                    <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="dialog = false">Save</v-btn>
                                    </v-card-actions>
                                </v-card>
                                </v-dialog>
                                </v-btn>
                                </v-card-actions>
                            </v-card>
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
            tutup: false,
            dialog: false,

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

    /*@import './assets/styles/yourstyles.css';*/
</style>
