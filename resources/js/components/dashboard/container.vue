<template>
<v-app>
    <navbar></navbar>

    <main class="h-100">
        <div class="fluid">
            <section class="top-space bg-section-1">
                <v-container class="py-12">
                    <v-card>
                        <v-card-title> 
                            Daftar Penggalangan
                            <v-spacer></v-spacer>
                            <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>
                        </v-card-title>
                        <v-data-table :headers="headers" :items="campaigns" :search="search"></v-data-table>
                    </v-card>
                </v-container>
            </section>

            <section class="bg-section-2">
                <v-container class="py-12">
                    <v-card>
                        <v-card-title> 
                            Daftar Transfer
                            <v-spacer></v-spacer>
                            <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>
                        </v-card-title>
                        <v-data-table :headers="headers" :items="campaigns" :search="search"></v-data-table>
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
            search: '',
            headers: [
            { text: 'Id', align: 'start', sortable: false, value: 'id' },
            { text: 'Judul', value: 'title' },
            { text: 'Penggalang', value: 'author' },
            { text: 'Terkumpul', value: 'raised' },
            { text: 'Sisa Hari', value: 'daysleft' },
            { text: 'Status', value: 'status' },
            ],
            campaigns: [
            { id: '001', title: 'Top western road trips', author: 'Rachel', raised: 'Rp 176.320', daysleft: '56', status: 'open' },
            
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