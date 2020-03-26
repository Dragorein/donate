<template>
<v-app>
    
    <navbar></navbar>

    <main class="h-100">
        <div class="fluid">
            <section class="top-space bg-section">
                <v-container class="py-6" rows="3">
                    <v-row>
                        <v-col lg="2"></v-col>

                        <v-col lg="8">
                            <v-card class="mx-5 my-3">
                                <v-row>
                                <v-col lg="6">
                                    <!-- field nama -->
                                    <v-row align="center" class="px-5 pt-5">
                                        <v-col>
                                            <v-text-field label="Nama Donatur" clearable :rules="ruleNama" counter maxlength="30" outlined></v-text-field>
                                        </v-col>
                                    </v-row>

                                    <!-- field Email -->
                                    <v-row align="center" class="px-5">
                                        <v-col>
                                            <v-text-field label="Email Donatur" clearable :rules="rulesEmail" outlined></v-text-field>
                                        </v-col>
                                    </v-row>

                                    <!-- field Bank -->
                                    <v-row align="center" class="px-5">
                                        <v-col>
                                            <v-select :items="items" label="Pembayaran dengan" outlined></v-select>
                                        </v-col>
                                    </v-row>

                                    <!-- field Donasi -->
                                    <v-row align="center" class="px-5">
                                        <v-col>
                                            <v-text-field label="Jumlah Donasi" prefix="Rp " clearable :rules="rulesDonasi" outlined></v-text-field>
                                        </v-col>
                                    </v-row>

                                    <v-row align="center" class="px-5 pb-5">
                                        <v-col cols="2"></v-col>
                                        <v-col cols="3"><v-btn block color="danger">Cancel</v-btn></v-col>
                                        <v-col cols="2"></v-col>
                                        <v-col cols="3"><v-btn block color="success">Donasi</v-btn></v-col>
                                        <v-col cols="2"></v-col>
                                    </v-row>
                                </v-col>

                                <!-- gambar donasi -->
                                <v-col lg="6">
                                    <v-card class="mx-5 my-3">
                                        <v-img :src="src" height="300px" ></v-img>
                                        <v-card-title v-text="title"></v-card-title>
                                        <v-progress-linear height="10" v-model="progress" color="yellow accent-4"></v-progress-linear>
                                        <v-row>
                                            <v-col lg="9">
                                                <v-card-text v-text="'Dana terkumpul '+ donasi"></v-card-text>
                                            </v-col>
                                            <v-col lg="3">
                                                <v-card-text v-text="durasi + ' Hari lagi'"></v-card-text>
                                            </v-col>
                                        </v-row>
                                    </v-card>
                                    
                                </v-col>
                                
                                </v-row>
                            </v-card>
                        </v-col>

                        <v-col lg="2"></v-col>
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
            value => (value || '').length >= 5 || 'Minimal Donasi Rp 10.000',
        ],
        items: [
            'BCA',
            'BNI',
            'Niaga',
            'Permata',
        ],
        src:'https://cdn.vuetifyjs.com/images/cards/sunshine.jpg',
        title: 'Supermodel',
        progress:50,
        donasi: 'Rp 3.003.132',
        durasi: '30',
        }),
    }
</script>
