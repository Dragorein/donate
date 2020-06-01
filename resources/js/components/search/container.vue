<template>
<v-app>
    <!-- <navbar-search/> -->
    <v-app-bar flat color="white" class="py-2 h-auto">
        <v-spacer/>
            <v-btn class="mr-3" @click="goBack" icon><v-icon>mdi-chevron-double-left</v-icon></v-btn>
            <v-text-field ref="search" rounded filled hide-details dense placeholder="Cari galang dana" prepend-inner-icon="search" v-model="query"/>
        <v-spacer/>
    </v-app-bar>

    <main class="h-100">
        <div class="fluid">
            <section>
                <v-container class="pb-12">
                    <v-row justify="center">
                        <v-card width="95%" class="mb-3 elevation-12">
                            <v-list two-line>
                                <v-subheader>Results</v-subheader>

                                <template v-for="card in cards">
                                    <v-list-item @click="reroutes('/campaign/detail')">
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
            </section>
        </div>
    </main>
</v-app>
</template>

<script>
    export default {
        data: () => ({
            cards: [
            ],
            search: '',
            showsearh: false,

            query: null,
            result: []
        }),
        watch: {
            query(after, before){
                this.searchSubmission();
            }
        },
        methods: {
            reroutes: function (url) {
                this.$router.push({ path: url });
            },
            getDataPage(id) {
            axios.get("http://localhost:8000/api/search?query="+id).then(response => {
                // return console.log(id);
            });
            },
            goBack: function () {
                this.$router.go(-1);
            },
            searchSubmission() {
                axios.get('http://localhost:8000/api/search/'+this.query)
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {});
            }
        }
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