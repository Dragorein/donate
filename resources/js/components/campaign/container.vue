<template>
<v-app>
    <navbar></navbar>

    <main class="h-100">
        <v-container class="fluid">
            <v-row>
                <v-col v-for="card in cards" :key="card.title" cols="12">
                    <v-card>
                        <v-img :src="card.src" height="450px"></v-img>
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

            <v-row>
                <v-col cols="12" md="8">
                    <v-card height="100%">
                        <v-tabs v-model="tab" background-color="orange" centered dark icons-and-text>
                            <v-tabs-slider></v-tabs-slider>

                            <v-tab href="#tab-1">
                                Cerita <v-icon>mdi-account-search</v-icon>
                            </v-tab>

                            <v-tab href="#tab-2">
                                Perkembangan <v-icon>mdi-account-heart mdi-flip-h</v-icon>
                            </v-tab>

                            <v-tab href="#tab-3">
                                Rincian Dana <v-icon>mdi-cash-usd</v-icon>
                            </v-tab>
                        </v-tabs>

                        <v-tabs-items v-model="tab">
                            <v-tab-item v-for="i in 3" :key="i" :value="'tab-' + i">
                                <v-card flat>
                                    <v-card-text>{{ text }}</v-card-text>
                                </v-card>
                            </v-tab-item>
                        </v-tabs-items>
                    </v-card>
                </v-col>

                <v-col cols="12" md="4">
                    <v-card class="mx-auto">
                        <v-list two-line dense>
                            <template v-for="(item, index) in items">
                                <v-subheader class="title" v-if="item.header" :key="item.header" v-text="item.header + ' (' + (items.length - 1) + ')'"></v-subheader>

                                <v-list-item v-else :key="item.donor" @click="">
                                <v-list-item-avatar>
                                    <v-img :src="item.avatar"></v-img>
                                </v-list-item-avatar>

                                <v-list-item-content>
                                    <v-list-item-title v-html="item.donor"></v-list-item-title>
                                    <v-list-item-subtitle v-html="item.comments"></v-list-item-subtitle>
                                </v-list-item-content>
                                </v-list-item>
                            </template>
                        </v-list>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </main>

    <footbar></footbar>
</v-app>
</template>

<script>
    export default {
        data: () => ({
            cards: [
                {title:'Supermodel', src:'https://cdn.vuetifyjs.com/images/cards/sunshine.jpg', author:'Louise', progress:50, raised:'Rp 3.003.132', daysleft:'30'},
            ],
            tab: null,
            text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            items: [
                { header : 'Donatur'},
                {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
                donor: 'Ali Connors',
                comments: "I'll be in your neighborhood doing errands this weekend. Do you want to hang out?",
                },
                {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
                donor: 'Alex Scott',
                comments: "Wish I could come, but I'm out of town this weekend.",
                },
                {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
                donor: 'Sandra Adams',
                comments: "Do you have Paris recommendations? Have you ever been?",
                },
                {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
                donor: 'Rachel',
                comments: "Have any ideas about what we should get Heidi for her birthday?",
                },
                {
                avatar: 'https://cdn.vuetifyjs.com/images/lists/5.jpg',
                donor: 'Britta Holt',
                comments: "We should eat this: Grate, Squash, Corn, and tomatillo Tacos.",
                },
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
    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, .v-chip:hover, .v-tab:hover {
        text-decoration: none;
    }
</style>