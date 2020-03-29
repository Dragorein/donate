<template>
    <v-app>
        <navbar></navbar>
        
        <main class="h-100">
            
            <div >
                <section class="top-space">
                    <v-container style="padding-top: 300px;">
                        <v-card raised>
                            <v-layout row justify-center align-center>
                                <v-row>
                                    <v-col lg="5"></v-col>
                                    <v-col lg="3" align-self="center">
                                        <v-card-title>Transaksi Anda Telah Berhasil</v-card-title>
                                    </v-col>
                                </v-row>
                            </v-layout>
                            <v-layout row justify-center align-center>
                                <v-row>
                                    <v-col sm="6"></v-col>
                                    <v-col sm="1">
                                        <v-icon large color="green darken-2" class="">mdi-checkbox-marked-circle-outline</v-icon>
                                    </v-col>
                                </v-row>
                            </v-layout>
                        </v-card>
                    </v-container>
                </section>
            </div>

        </main>

        <footbar></footbar>
    </v-app>
</template>