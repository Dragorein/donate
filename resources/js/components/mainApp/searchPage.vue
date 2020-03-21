<template>
<v-app>
    <v-toolbar flat dense>
        <v-row>
            <v-col class="d-flex justify-end align-center" cols="3">
                <v-toolbar-items class="h-100">
                    <v-btn href="keluar" text small>
                        <v-icon left>mdi-chevron-double-left</v-icon>Kembali
                    </v-btn>
                </v-toolbar-items>
            </v-col>
            <v-col class="d-flex justify-space-around align-center">
                <v-text-field solo hide-details dense label="Cari penggalangan dana disini" append-icon="search"></v-text-field>
            </v-col>
            <v-col cols="3" class="d-flex justify-start">
                <v-toolbar-items>
                    <v-chip href="profil" class="ma-2" color="blue-grey lighten-5">
                        <v-avatar left>
                            <v-icon>mdi-account-circle</v-icon>
                        </v-avatar>
                        John
                    </v-chip>
                    <v-btn href="keluar" text small>
                        Keluar<v-icon right>mdi-logout-variant</v-icon>
                    </v-btn>
                </v-toolbar-items>
            </v-col>
        </v-row>  
    </v-toolbar>

    <main class="h-100">
        <v-container class="fluid my-5">
            <v-row justify="center">
                <v-card width="90%" class="mb-3">
                    <v-list two-line>
                        <v-subheader>Results</v-subheader>

                        <template v-for="card in cards">
                            <v-list-item @click="">
                                <v-list-item-avatar tile size="70" width="120">
                                    <v-img :src="card.src"></v-img>
                                </v-list-item-avatar>
                                
                                <v-list-item-content>
                                    <v-list-item-title v-html="card.title"></v-list-item-title>
                                    <v-list-item-subtitle v-html="card.author + ' ' + card.raised"></v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </template>
                    </v-list>
                </v-card>  
            </v-row>
        </v-container>
    </main>
</v-app>
</template>

<script>
    export default {
        data: () => ({
            colors: [
                'orange',
                'indigo',
                'pink darken-2',
                'red lighten-1',
                'deep-purple accent-4',
            ],
            slides: [
                'Pertama',
                'Kedua',
                'Ketiga',
                'Keempat',
                'Kelima',
            ],
            cards: [
                {title:'Supermodel', src:'https://cdn.vuetifyjs.com/images/cards/sunshine.jpg', author:'Louise', progress:50, raised:'Rp 3.003.132', daysleft:'30'},
                {title:'Halcyon Days', src:'https://cdn.vuetifyjs.com/images/cards/house.jpg', author:'Danny', progress:80, raised:'Rp 5.012.500', daysleft:'3'},
                {title:'Top western road trips', src:'https://cdn.vuetifyjs.com/images/cards/docks.jpg', author:'Rachel', progress:5, raised:'Rp 176.320', daysleft:'56'},
                {title:'Unlimited music now', src:'https://cdn.vuetifyjs.com/images/cards/halcyon.png', author:'Ellie', progress:100, raised:'Rp 152.901.000', daysleft:'1'},
                {title:'Best airlines', src:'https://cdn.vuetifyjs.com/images/cards/plane.jpg', author:'Tommy', progress:60, raised:'Rp 16.251.026', daysleft:'23'},
            ],
        }),
    }
</script>

<style>
    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, .v-chip:hover {
        text-decoration: none;
    }
</style>