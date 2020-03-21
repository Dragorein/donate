<template>
<v-app>
    <navbar-search></navbar-search>

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