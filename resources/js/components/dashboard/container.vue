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
                                        <v-card-subtitle class="headline font-weight-bold">{{campaigns.length}}</v-card-subtitle>
                                    </v-card>
                                </v-card>
                            </v-col>

                            <v-col cols="12" md="6" lg="3">
                                <v-card color="green lighten-1" class="pl-2">
                                    <v-card flat>
                                        <v-card-title class="title">Total Pengguna<v-icon right>mdi-account-group</v-icon></v-card-title>
                                        <v-card-subtitle class="headline font-weight-bold">{{users.length}}</v-card-subtitle>
                                    </v-card>
                                </v-card>
                            </v-col>

                            <v-col cols="12" md="6" lg="3">
                                <v-card color="cyan lighten-1" class="pl-2">
                                    <v-card flat>
                                        <v-card-title class="title">Total Bantuan<v-icon right>mdi-cash-multiple</v-icon></v-card-title>
                                        <v-card-subtitle class="headline font-weight-bold">{{totalCampaigns}}</v-card-subtitle>
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
                                <p class="display-1 font-weight-light text--primary">Hai, {{currentUser.user_name}}!</p>
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
                            <v-data-table :headers="campaignHeaders" :items="campaigns" :search="search">
                                <template v-slot:item.actions="{ item }">
                                    <v-icon small color="blue mr-2" @click="editItem(item)">mdi-information</v-icon>
                                    <v-icon small color="red mr-2" @click="deleteItem(item)">mdi-delete</v-icon>
                                </template>
                            </v-data-table>
                        </v-card>
                    </template>

                    <template v-if="page == 'donations'">
                        <v-card>
                            <v-card-title> 
                                Daftar Transfer
                                <v-spacer></v-spacer>
                                <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>
                            </v-card-title>
                            <v-data-table :headers="donationsHeaders" :items="donations" :search="search">
                                <template v-slot:item.actions="{ item }">
                                    <v-icon small color="blue mr-2" @click="editItem(item)">mdi-information</v-icon>
                                    <v-icon small color="red mr-2" @click="deleteItem(item)">mdi-delete</v-icon>
                                </template>
                            </v-data-table>
                        </v-card>
                    </template>

                    <template v-if="page == 'users'">
                        <v-card>
                            <v-card-title> 
                                Daftar Pengguna
                                <v-spacer></v-spacer>
                                <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>
                            </v-card-title>
                            <v-data-table :headers="usersHeaders" :items="users" :search="search">
                                <template v-slot:item.actions="{ item }">
                                    <v-icon small color="blue mr-2" @click="editItem(item)">mdi-information</v-icon>
                                    <v-icon small color="red mr-2" @click="deleteItem(item)">mdi-delete</v-icon>
                                </template>
                            </v-data-table>
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
            totalCampaigns: 'Rp 0',

            campaigns: [],
            campaignHeaders: [
                { text: 'Id', align: 'start', sortable: false, value: 'submisi_id' },
                { text: 'Judul', value: 'submisi_judul' },
                { text: 'Penggalang', value: 'user.user_name' },
                { text: 'Terkumpul', value: 'submisi_terkumpul' },
                { text: 'Target', value: 'submisi_target' },
                { text: 'Sisa Hari', value: 'sisa_hari' },
                { text: 'Status', value: 'submisi_is_active' },
                { text: 'Dibuat', value: 'submisi_created_at' },
                { text: 'Diperbarui', value: 'submisi_updated_at' },
                { text: 'Aksi', value: 'actions', sortable: false },
            ],

            donations: [],
            donationsHeaders: [
                { text: 'Id', align: 'start', sortable: false, value: 'donation_id' },
                { text: 'Submisi', value: 'submission.submisi_judul' },
                { text: 'Nominal', value: 'donation_nominal' },
                { text: 'Nama', value: 'donation_name' },
                { text: 'Email', value: 'donation_mail' },
                { text: 'No. Telepon', value: 'donation_phone' },
                { text: 'Akun', value: 'user_id' },
                { text: 'Anonim', value: 'donation_is_anonymous' },  
                { text: 'Dibuat', value: 'donation_created_at' },  
                { text: 'Diperbarui', value: 'donation_updated_at' },
                { text: 'Aksi', value: 'actions', sortable: false },
            ],

            users: [],
            usersHeaders: [
                { text: 'Id', align: 'start', sortable: false, value: 'user_id' },
                { text: 'Nama', value: 'user_name' },
                { text: 'Email', value: 'user_mail' },
                { text: 'No. Telepon', value: 'user_phone' },
                { text: 'Akses', value: 'user_is_admin' },
                { text: 'Status', value: 'user_is_active' },
                { text: 'Dibuat', value: 'user_created_at' },
                { text: 'Diperbarui', value: 'user_updated_at' },  
                { text: 'Aksi', value: 'actions', sortable: false },
            ],
        }),
        computed: {
            loggedin: {
                get() {
                    return this.$store.state.user.loggedin;
                }
            },
            currentUser: {
                get() {
                    return this.$store.state.user.user;
                }
            },
        },
        created() {
            axios
            .get("/dashboard/all")
            .then(response => {
            console.log(response.data);
                if(response.data != null) {
                    this.$data.campaigns = response.data.campaigns;
                    this.$data.totalCampaigns = response.data.totalCampaigns;
                    this.$data.donations = response.data.donations;
                    this.$data.users = response.data.users;
                }
            });

            this.$store.dispatch('user/getUser');

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