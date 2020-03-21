<template>
<v-app>
    <navbar></navbar>

    <main class="h-100">
        <v-container class="fluid my-4">
            <v-carousel cycle height="400" delimiter-icon="mdi-minus" hide-delimiter-background show-arrows-on-hover>
                <v-carousel-item v-for="(slide, i) in slides" :key="i">
                    <v-sheet :color="colors[i]" height="100%">
                        <v-row class="fill-height" align="center" justify="center">
                            <div class="display-3">Salindia {{ slide }}</div>
                        </v-row>
                    </v-sheet>
                </v-carousel-item>
            </v-carousel>

            <v-card class="my-4 p-4">
                <h1 class="headline text-center">Bantu siapa hari ini?</h1>
                <v-row justify="center">
                    <v-col v-for="card in cards" :key="card.title" cols="12" sm="6" md="4">
                        <v-card class="my-4">
                            <v-img :src="card.src" height="200px"></v-img>
                            <v-card-title v-text="card.title"></v-card-title>
                            <v-card-subtitle v-text="card.author"></v-card-subtitle>
                            <v-card-actions>
                                <v-btn text v-text="'Terkumpul ' + card.raised"></v-btn>
                                <v-spacer></v-spacer>
                                <v-btn color="orange" text v-text="card.daysleft + ' hari lagi'"></v-btn>
                            </v-card-actions>
                            <v-progress-linear height="8" v-model="card.progress" color="yellow accent-4"></v-progress-linear>
                        </v-card>
                    </v-col>
                </v-row>
            </v-card>
        </v-container>
    </main>

    <footbar></footbar>
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