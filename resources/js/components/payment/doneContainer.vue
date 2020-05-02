<template>
<v-app>
    <navbar/>
    
    <main class="h-100">
        <div class="fluid">
            <section class="top-space">
                <v-container class="py-12">
                    <v-row>
                        <v-col>
                            <v-card raised max-width="600px" class="mx-auto p-md-4">
                                <v-card-title><v-icon large color="green" left>mdi-checkbox-marked-circle-outline</v-icon>Donasi anda berhasil</v-card-title>
                                <v-list max-width="550px" class="ml-5">
                                    <v-list-item>
                                        <v-list-item-content>
                                            <v-list-item-title>Anda mendonasikan</v-list-item-title>
                                            <v-list-item-subtitle>Rp {{donasi}}</v-list-item-subtitle>
                                        </v-list-item-content>
                                    </v-list-item>
                                    
                                    <v-divider class="my-1"></v-divider>

                                    <v-list-item>
                                        <v-list-item-content>
                                            <v-list-item-title>Metode donasi</v-list-item-title>
                                            <v-list-item-subtitle>{{bank}}</v-list-item-subtitle>
                                        </v-list-item-content>
                                    </v-list-item>
                                    
                                    <v-divider class="my-1"></v-divider>

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
                                </v-list>

                                <v-card-actions>
                                    <v-btn large color="error" block @click="reroutes('/')">Kembali</v-btn>
                                </v-card-actions>
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
        author: 'Louise',
        target:'Josh',
        title: 'Supermodel',
        donasi: '10.000',
        bank: 'BCA',
        icon: '/icon/BCA.png',
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