<template>
<v-app>
    <navbar></navbar>

    <main class="h-100">
        <div class="fluid">
            <section class="top-space bg-section-1">
                <v-container class="py-6">
                    <v-card>
                        <v-row>
                            <v-col md="6">
                                <v-card class="ma-6 mr-md-0">
                                    <v-card-title>Donasi Untuk: {{title}}</v-card-title>
                                    
                                    <v-list rounded dense three-line>
                                        <v-list-item>
                                            <v-list-item-content>
                                                <v-list-item-title>Penggalang</v-list-item-title>
                                                <div class="d-flex align-center pt-2">
                                                    <v-avatar left>
                                                        <img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John">
                                                    </v-avatar>
                                                    <div class="mx-3">
                                                        <span class="green--text">{{author}}<v-icon right color="green">mdi-check-circle mdi-18px</v-icon></span>
                                                        <div class="caption">Identitas terverifikasi</div>
                                                    </div>
                                                </div>
                                            </v-list-item-content>
                                        </v-list-item>
                                        
                                        <v-divider class="my-1"></v-divider>

                                        <v-list-item>
                                            <v-list-item-content>
                                                <v-list-item-title>Penerima Manfaat</v-list-item-title>
                                                    <div class="d-flex align-center pt-2">
                                                        <v-avatar left>
                                                            <v-icon>mdi-account-circle mdi-48px</v-icon>
                                                        </v-avatar>
                                                        <div class="mx-3">
                                                            <span>{{target}}</span>
                                                            <div class="caption">Sesuai dokumen medis<v-icon color="green">mdi-check-circle-outline mdi-18px</v-icon></div>
                                                        </div>
                                                    </div>
                                            </v-list-item-content>
                                        </v-list-item>
                                        
                                        <v-divider class="my-1"></v-divider>

                                        <v-list-item>
                                            <v-list-item-content class="d-flex px-2">
                                                <v-list-item-title>Cerita</v-list-item-title>
                                                <v-list-item-subtitle v-text="text"></v-list-item-subtitle>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </v-list>
                                </v-card>
                            </v-col>
                            <v-col md="6">
                                <form class="ma-6 ml-md-0">
                                    <v-text-field label="Nama donatur" outlined clearable :rules="rulesNama" counter maxlength="30"></v-text-field>
                                    <v-text-field label="Email donatur" outlined clearable :rules="rulesEmail"></v-text-field>

                                    <v-list>
                                        <v-subheader>Pembayaran dengan</v-subheader>
                                        <v-list-item-group v-model="item" color="success">
                                            <v-list-item v-for="item in items" :key="item.title">
                                                <v-list-item-avatar tile>
                                                    <v-img :src="item.avatar"></v-img>
                                                </v-list-item-avatar>
                                                <v-list-item-content>
                                                    <v-list-item-title v-text="item.title"></v-list-item-title>
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list-item-group>
                                    </v-list>

                                    <v-text-field label="Nominal donasi" prefix="Rp " outlined clearable :rules="rulesDonasi"></v-text-field>

                                    <div class="d-flex justify-center pt-2">
                                        <v-btn color="danger" class="mr-2 w-50" @click="goBack">Batal</v-btn>
                                        <v-btn color="success" class="mr-2 w-50" @click="reroutes('/payment/done')">Lanjut</v-btn>
                                    </div>
                                </form>
                            </v-col>
                        </v-row>
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
        rulesNama: [
            value => !!value || 'Required.',
            value => (value || '').length <= 30 || 'Maksimal 30 characters',
        ],
        rulesEmail: [
            value => !!value || 'Required.',
            value => (value || '').length <= 255 || 'Max 20 characters',
            value => {
            const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            return pattern.test(value) || 'Invalid e-mail.'
            },
        ],
        rulesDonasi: [
            value => !!value || 'Required.',
            value => (value || '').length >= 6 || 'Minimal Donasi Rp 10.000',
        ],

        items: [
            { title: 'BCA Virtual Account', avatar: '/icon/BCA.png' },
            { title: 'BNI', avatar: '/icon/BNI.png' },
            { title: 'Permata', avatar: '/icon/Permata.png' },
        ],

        author: 'Louise',
        target:'Josh',
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        title: 'Supermodel',
        progress:50,
        donasi: 'Rp 3.003.132',
        durasi: '30',
        }),
        methods: {
            reroutes: function (url) {
                this.$router.push({ path: url });
            },
            goBack: function () {
                this.$router.go(-1);
            }
        }
    }
</script>
