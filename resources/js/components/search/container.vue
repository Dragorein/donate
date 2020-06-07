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

                                <template v-for="submission in submissions">
                                    <v-list-item @click="reroutes('/campaign/'+submission.submisi_id)">
                                        <v-list-item-avatar tile size="70" width="120">
                                            <v-img :src="'/picture/'+submission.src"></v-img>
                                        </v-list-item-avatar>
                                        
                                        <v-list-item-content>
                                            <v-list-item-title v-html="submission.submisi_judul"></v-list-item-title>
                                            <v-list-item-subtitle v-html="submission.author + ' ' + submission.raised"></v-list-item-subtitle>
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
            submissions: [],
            search: '',
            showsearh: false,
            query: null,
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
            goBack: function () {
                this.$router.go(-1);
            },
            searchSubmission() {
                axios.get('http://localhost:8000/api/cari?q='+this.query)
                .then(response => {
                    this.submissions = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
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