<template>
<v-app>
    <drawer-admin :start="page" @pageChanged="page = $event"/>
    
    <v-content class="bg-section-1">
        <div class="fluid">
            <section>
                <v-container>
                    <v-card-title class="display-2">Dashboard</v-card-title>
                </v-container>
            </section>

            <section>
                <v-container class="pb-12">
                    <template v-if="page == 'feeds'">
                        <v-row>
                            <v-col cols="12" md="6" lg="3">
                                <v-card color="blue lighten-1" class="pl-2">
                                    <v-card flat>
                                        <v-card-title class="title">Total Galang Dana<v-icon right>mdi-charity</v-icon></v-card-title>
                                        <v-card-subtitle class="headline font-weight-bold">30</v-card-subtitle>
                                    </v-card>
                                </v-card>
                            </v-col>

                            <v-col cols="12" md="6" lg="3">
                                <v-card color="green lighten-1" class="pl-2">
                                    <v-card flat>
                                        <v-card-title class="title">Total Pengguna<v-icon right>mdi-account-group</v-icon></v-card-title>
                                        <v-card-subtitle class="headline font-weight-bold">120</v-card-subtitle>
                                    </v-card>
                                </v-card>
                            </v-col>

                            <v-col cols="12" md="6" lg="3">
                                <v-card color="cyan lighten-1" class="pl-2">
                                    <v-card flat>
                                        <v-card-title class="title">Bantuan Per Bulan<v-icon right>mdi-cash-multiple</v-icon></v-card-title>
                                        <v-card-subtitle class="headline font-weight-bold">Rp 12,031,649,998</v-card-subtitle>
                                    </v-card>
                                </v-card>
                            </v-col>

                            <v-col cols="12" md="6" lg="3">
                                <v-card color="yellow lighten-1" class="pl-2">
                                    <v-card flat>
                                        <v-card-title class="title">Notifikasi<v-icon right>mdi-chat-alert</v-icon></v-card-title>
                                        <v-card-subtitle class="headline font-weight-bold">12</v-card-subtitle>
                                    </v-card>
                                </v-card>
                            </v-col>
                        </v-row>

                        <v-card class="mx-auto px-6 py-12 mt-6">
                            <v-card-text>
                                <p class="display-1 font-weight-light text--primary">Hai, Sandra!</p>
                                <v-divider/>
                                <div class="subtitle-1 text--primary">Tidak ada aktivitas baru hari ini.</br>Teruskan kerja bagusmu!</div>
                            </v-card-text>
                            <v-card-actions>
                            <v-btn class="primary">ke halaman utama!</v-btn>
                            </v-card-actions>
                        </v-card>
                    </template>

                    <template v-if="page == 'campaigns'">
                        <v-card>
                            <v-card-title> 
                                Daftar Penggalangan
                                <v-spacer></v-spacer>
                                <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>
                            </v-card-title>
                            <v-data-table :headers="headers" :items="campaigns" :search="search"></v-data-table>
                        </v-card>
                    </template>

                    <template v-if="page == 'transactions'">
                        <v-card>
                            <v-card-title> 
                                Daftar Transfer
                                <v-spacer></v-spacer>
                                <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>
                            </v-card-title>
                            <v-data-table :headers="headers" :items="campaigns" :search="search"></v-data-table>
                        </v-card>
                    </template>

                    <template v-if="page == 'users'">
                        <v-card>
                            <v-card-title> 
                                Daftar Pengguna
                                <v-spacer></v-spacer>
                                <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>
                            </v-card-title>
                            <v-data-table :headers="usersHeaders" :items="users" :search="search"></v-data-table>
                        </v-card>
                    </template>
                </v-container>
            </section>
        </div>
    </v-content>
</v-app>
</template>

<script>
    export default {
        data: () => ({
            page: 'feeds',
            search: '',
            headers: [
            { text: 'Id', align: 'start', sortable: false, value: 'id' },
            { text: 'Judul', value: 'title' },
            { text: 'Penggalang', value: 'author' },
            { text: 'Terkumpul', value: 'raised' },
            { text: 'Sisa Hari', value: 'daysleft' },
            { text: 'Status', value: 'status' },
            ],

            usersHeaders: [
                { text: 'Id', align: 'start', sortable: false, value: 'user_id' },
                { text: 'Nama', value: 'user_name' },
                { text: 'Email', value: 'user_mail' },
                { text: 'No. Telepon', value: 'user_phone' },
                { text: 'Akses', value: 'user_is_admin' },
                { text: 'Status', value: 'user_is_active' },
                { text: 'Terdaftar', value: 'user_created_at' },
                { text: 'Terbarui', value: 'user_updated_at' },
            ],

            users: [],

            campaigns: [
            { id: '001', title: 'Top western road trips', author: 'Rachel', raised: 'Rp 176.320', daysleft: '56', status: 'open' },
            
            ],
        }),
        created() {
            axios
            .get("/dashboard/all")
            .then(response => {
                console.log(response.data);
                if(response.data != null) {
                    this.$data.users = response.data.users;
                }
            });
        },
        methods: {
            reroutes: function (url) {
                this.$router.push({ path: url });
            }
        }
    }
</script>

<style>
    section .v-card {
        transition: 0.2s cubic-bezier(0.4, 0, 0.2, 1) all;
    }

    section .card-transform:hover {
        transform: translatey(-10px);
    }

    .top-space {
        padding-top: 80px!important;
    }

    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, .v-chip:hover {
        text-decoration: none;
    }
    /*@import './assets/styles/yourstyles.css';*/
</style>