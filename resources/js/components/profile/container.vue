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
                        <v-tabs show-arrows vertical hide-slider background-color="orange" dark>
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
                                <v-icon left>mdi-account-edit</v-icon>Ubah Profil
                            </v-tab>
                            <v-tab>
                                <v-icon left>mdi-textbox-password</v-icon>Ganti Password
                            </v-tab>

                            <v-tab-item>
                                <v-card-title>Penggalangan Aktif</v-card-title>
                                <v-card-subtitle>Menampilkan semua penggalangan dana-mu yang sedang aktif.</v-card-subtitle>
                                <v-list two-line>
                                    <template v-for="active in actives">
                                        <v-list-item @click="reroutes('/campaign/detail')">
                                            <v-list-item-avatar tile size="70" width="120">
                                                <v-img :src="active.src"></v-img>
                                            </v-list-item-avatar>
                                            
                                            <v-list-item-content>
                                                <v-list-item-title v-html="active.title"></v-list-item-title>
                                                <v-list-item-subtitle>Aktif</v-list-item-subtitle>
                                                <v-list-item-subtitle v-html="active.daysleft + ' hari lagi'"></v-list-item-subtitle>
                                            </v-list-item-content>

                                            <v-list-item-content>
                                                <v-btn color="error">Tutup</v-btn>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </template>
                                </v-list>
                            </v-tab-item>
                            <v-tab-item>
                                <v-card-title>Riwayat Penggalangan</v-card-title>
                                <v-card-subtitle>Menampilkan semua riwayat penggalangan dana yang sudah kamu buka, mulai dari yang aktif sampai yang sudah tutup.</v-card-subtitle>
                                <v-list two-line>
                                    <template v-for="card in cards">
                                        <v-list-item @click="reroutes('/campaign/detail')">
                                            <v-list-item-avatar tile size="70" width="120">
                                                <v-img :src="card.src"></v-img>
                                            </v-list-item-avatar>
                                            
                                            <v-list-item-content>
                                                <v-list-item-title v-html="card.title"></v-list-item-title>
                                                <v-list-item-subtitle>Ditutup</v-list-item-subtitle>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </template>
                                    <v-pagination color="orange" v-model="page" :length="length" :page="page" :total-visible="totalVisible"></v-pagination>
                                </v-list>
                            </v-tab-item>
                            <v-tab-item>
                                <v-card-title>Riwayat Donasi</v-card-title>
                                <v-card-subtitle>Menampilkan semua riwayat donasi yang telah kamu salurkan.</v-card-subtitle>
                                <v-list two-line>
                                    <template v-for="card in cards">
                                        <v-list-item @click="reroutes('/campaign/detail')">
                                            <v-list-item-avatar tile size="70" width="120">
                                                <v-img :src="card.src"></v-img>
                                            </v-list-item-avatar>
                                            
                                            <v-list-item-content>
                                                <v-list-item-title v-html="card.title"></v-list-item-title>
                                                <v-list-item-subtitle v-html="'Dibuka oleh ' + card.author + ' - ' + card.raised"></v-list-item-subtitle>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </template>
                                    <v-pagination color="orange" v-model="page" :length="length" :page="page" :total-visible="totalVisible"></v-pagination>
                                </v-list>
                            </v-tab-item>
                            <v-tab-item>
                                <v-card-title>Ubah Profil</v-card-title>
                                <v-card-subtitle></v-card-subtitle>
                                <v-form>
                                    <v-container class="px-12 pb-12">
                                    
                                        <div class="d-flex align-center mb-4">
                                            <v-avatar size="96" left>
                                                <img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John">
                                            </v-avatar>
                                            <v-card-subtitle>Maksimal ukuran foto 1MB. Disarankan beresolusi 180px x 180px.</v-card-subtitle>
                                        </div>
                                        <v-file-input label="Foto Profil" prepend-icon="" prepend-inner-icon="mdi-paperclip" outlined clearable/>
                                        <v-divider/>
                                        <v-text-field label="Nama Depan" name="firstname" prepend-inner-icon="person" type="text" value="John" :rules="firstnameRules" required outlined clearable/>
                                        <v-text-field label="Nama Belakang" name="lastname" prepend-inner-icon="person" type="text" value="Tanaka" :rules="lastnameRules" required outlined clearable/>
                                        <v-text-field label="Email" name="email" prepend-inner-icon="mail" type="text" value="John@gmail.com" :rules="emailRules" required outlined clearable/>
                                        <v-text-field label="Nomor Handphone" name="noHandphone" prepend-inner-icon="phone" value="08955128756" type="text" :rules="noHandphoneRules" :counter="14" required outlined clearable/>
                                        <v-divider/>
                                        <v-btn color="success" class="mr-2">Ganti</v-btn>
                                        <v-btn text class="mr-2">Batal</v-btn>
                                    </v-container>
                                </v-form>
                            </v-tab-item>
                            <v-tab-item>
                                <v-card-title>Ganti Password</v-card-title>
                                <v-card-subtitle></v-card-subtitle>
                                <v-form>
                                    <v-container class="px-12 pb-12">
                                            <v-text-field id="password" label="Password Saat Ini" name="password" prepend-inner-icon="mdi-lock-question" type="password" :rules="passwordRules" required outlined clearable/>
                                            <v-text-field id="password" label="Password Baru" name="password" prepend-inner-icon="mdi-lock-open" type="password" :rules="passwordRules" required outlined clearable/>
                                            <v-text-field id="passwordconfirm" label="Ketik Ulang Password Baru" name="passwordconfirm" prepend-inner-icon="lock" type="password" :rules="passwordRules" required outlined clearable/>
                                        <v-divider/>
                                        <v-btn color="success" class="mr-2">Ganti</v-btn>
                                        <v-btn text class="mr-2">Batal</v-btn>
                                    </v-container>
                                </v-form>
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

            length: 2,
            nextIcon: 'navigate_next',
            prevIcon: 'navigate_before',
            page: 1,
            totalVisible: 10,

            valid: true,
            firstnameRules: [v => !!v || "First Name is required"],
            lastnameRules: [v => !!v || "Last Name is required"],
            emailRules: [v => !!v || "E-mail is required"],
            noHandphoneRules: [
                v => !!v || "No.Handphone is required",
                v => v && v.length <= 14
            ],
            passwordRules: [v => !!v || "Password is required"],
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

    .v-tabs--vertical .v-tab {
        justify-content: start;
    }

    @media only screen and (max-width: 600px) {
        .v-tabs--vertical {
            flex-direction: column;
        }
    }
    /*@import './assets/styles/yourstyles.css';*/
</style>