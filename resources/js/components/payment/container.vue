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
                            <v-card class="mx-5 my-3" min-width="650" max-width="1100">
                                <v-row>
                                    <v-col lg="6" class="">
                                        <form>
                                            <!-- field nama -->
                                            <v-row align="center" class="px-8 pt-5">
                                                <v-col>
                                                    <v-text-field label="Nama Donatur" clearable :rules="rulesNama" counter maxlength="30" flat></v-text-field>
                                                </v-col>
                                            </v-row>

                                            <!-- field Email -->
                                            <v-row align="center" class="px-8">
                                                <v-col class="pb-0">
                                                    <v-text-field label="Email Donatur" clearable :rules="rulesEmail" flat></v-text-field>
                                                </v-col>
                                            </v-row>

                                            <!-- field Bank -->
                                            <v-row align="center" class="px-5">
                                                <v-col class="pt-0">
                                                    <v-list rounded>
                                                        <v-subheader>Pembayaran dengan</v-subheader>
                                                        <v-list-item-group v-model="item" color="success">
                                                            <v-list-item
                                                                v-for="item in items"
                                                                :key="item.title"
                                                            >

                                                                <v-list-item-content>
                                                                    <v-list-item-title v-text="item.title"></v-list-item-title>
                                                                </v-list-item-content>

                                                                <v-list-item-avatar>
                                                                    <v-img :src="item.avatar"></v-img>
                                                                </v-list-item-avatar>
                                                            </v-list-item>
                                                        </v-list-item-group>
                                                    </v-list>
                                                </v-col>
                                            </v-row>

                                            <!-- field Donasi -->
                                            <v-row align="center" class="px-8">
                                                <v-col>
                                                    <v-text-field label="Jumlah Donasi" prefix="Rp " clearable :rules="rulesDonasi" flat></v-text-field>
                                                </v-col>
                                            </v-row>

                                            <!-- button -->
                                            <v-row align="center" class="px-5 pb-5">
                                                <v-col cols="2"></v-col>
                                                <v-col cols="3"><v-btn block color="danger" @click="reroutes('/campaign')">Cancel</v-btn></v-col>
                                                <v-col cols="2"></v-col>
                                                <v-col cols="3"><v-btn block color="success">Donasi</v-btn></v-col>
                                                <v-col cols="2"></v-col>
                                            </v-row>
                                        </form>
                                    </v-col>
                                    
                                    <!-- kanan form donasi -->
                                    <v-col lg="6">
                                        <v-card class="mx-5 my-3">
                                            
                                            <!-- judul donasi -->
                                            <v-card-title v-text="title"></v-card-title>
                                            
                                            <!-- progress bar -->
                                            <v-progress-linear height="10" v-model="progress" color="yellow accent-4"></v-progress-linear>
                                            
                                            <!-- bawah progress bar -->
                                            <v-row>
                                                <v-col lg="9">
                                                    <v-card-text v-text="'Dana terkumpul '+ donasi"></v-card-text>
                                                </v-col>
                                                <v-col lg="3">
                                                    <v-card-text v-text="durasi + ' Hari lagi'"></v-card-text>
                                                </v-col>
                                            </v-row>
                                            
                                            <!-- keterangan donasi -->
                                            <v-list rounded three-line>

                                                <!-- Penggalang -->
                                                <v-list-item>
                                                    <v-list-item-content class="d-flex">
                                                        <v-col lg="8">
                                                            <v-list-item-title>Penggalang</v-list-item-title>
                                                            <v-list-item-subtitle class="text--primary pt-3" v-text="person" ></v-list-item-subtitle>
                                                        </v-col>
                                                        <v-col lg="4">
                                                            <v-avatar><img :src="personAvatar"></v-avatar>
                                                        </v-col>

                                                    </v-list-item-content>
                                                </v-list-item>

                                                    <v-divider></v-divider>

                                                <!-- cerita donasi -->
                                                    <v-list-item>
                                                    <v-list-item-content class="d-flex px-2">
                                                        <v-list-item-title>Cerita</v-list-item-title>
                                                        <v-list-item-subtitle v-text="text"></v-list-item-subtitle>
                                                    </v-list-item-content>
                                                </v-list-item>

                                                <v-divider></v-divider>
                                                
                                                <!-- perkembagan donasi -->
                                                <v-list-item>
                                                    <v-list-item-content class="d-flex px-2">
                                                        <v-list-item-title>Perkembangan</v-list-item-title>
                                                        <v-list-item-subtitle  v-text="text"></v-list-item-subtitle>
                                                    </v-list-item-content>                                                    
                                                </v-list-item>

                                            </v-list>

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
            value => (value || '').length >= 6 || 'Minimal Donasi Rp 10.000',
        ],

        items: [
            { title: 'BCA Virtual Account', avatar: '/icon/BCA.png' },
            { title: 'BNI', avatar: '/icon/BNI.png' },
            { title: 'Permata', avatar: '/icon/Permata.png' },
        ],

        person: 'Louise',
        personAvatar : 'https://cdn.vuetifyjs.com/images/john.jpg',
        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        title: 'Supermodel',
        progress:50,
        donasi: 'Rp 3.003.132',
        durasi: '30',
        }),
        methods: {
            reroutes: function (url) {
                this.$router.push({ path: url });
            }
        }
    }
</script>
