<template>
    <v-app>
        <navbar></navbar>
        
        <main class="h-100">
            
            <div >
                <section class="top-space">
                    <v-container style="padding-top: 60px;">
                        <v-row>
                            <v-col md="4"></v-col>
                            <v-col>
                                <v-card raised max-width="600px">
                                    <v-layout row justify-center align-center>
                                        <v-row>
                                            <v-col lg="3"></v-col>
                                            <v-col align-self="center">
                                                <v-card-title>Transaksi Anda Telah Berhasil</v-card-title>
                                            </v-col>
                                        </v-row>
                                    </v-layout>
                                    <v-layout row justify-center align-center>
                                        <v-row>
                                            <v-col md="5"></v-col>
                                            <v-col md="1">
                                                <v-icon large color="green" style="padding-left: 25px">mdi-checkbox-marked-circle-outline</v-icon>
                                            </v-col>
                                        </v-row>
                                    </v-layout>
                                    <v-layout row justify-center align-center>
                                        <v-col md="1"></v-col>
                                        <v-row>
                                            <v-col>
                                                <v-list max-width="550px" class="ml-5">
                                                    <v-list-item>
                                                        <v-list-item-content>
                                                            <v-list-item-title>Anda mendonasikan </v-list-item-title>
                                                            <v-list-item-subtitle>Rp {{donasi}}</v-list-item-subtitle>
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                    <v-list-item>
                                                        <v-list-item-content>
                                                            <v-list-item-title>Melalui</v-list-item-title>
                                                            <v-row>
                                                                <v-col md="9">
                                                                    <v-list-item-subtitle v-text="bank" style="font-size: 24pt"></v-list-item-subtitle>
                                                                </v-col>
                                                                <v-col>
                                                                    <v-avatar right>
                                                                        <img :src="icon">
                                                                    </v-avatar>
                                                                </v-col>
                                                            </v-row>
                                                            
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                    <v-divider></v-divider>
                                                    <v-list-item>
                                                        <v-col md="5">
                                                            <v-list-item-title>Penggalang</v-list-item-title>
                                                        </v-col>
                                                        <v-col md="7">
                                                            <div class="d-flex align-center pt-2">
                                                                <v-avatar left>
                                                                    <img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John">
                                                                </v-avatar>
                                                                <div class="mx-3">
                                                                    <span class="green--text">{{author}}<v-icon right color="green">mdi-check-circle mdi-18px</v-icon></span>
                                                                    <div class="caption">Identitas terverifikasi</div>
                                                                </div>
                                                            </div>
                                                        </v-col>
                                                    </v-list-item>
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
                                                </v-list>
                                            </v-col>
                                        </v-row>
                                        <v-col md="1"></v-col>
                                    </v-layout>
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
        author: 'Louise',
        target:'Josh',
        title: 'Supermodel',
        donasi: '10.000',
        bank: 'BCA',
        icon: '/icon/BCA.png',
    })
}
</script>