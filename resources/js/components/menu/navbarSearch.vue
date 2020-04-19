<template>

    <v-app-bar flat color="white" class="py-2 h-auto">
        <v-row>
            <v-col class="d-flex align-center" cols="2" md="3">
                <v-btn @click="goBack" small fab>
                    <v-icon>mdi-chevron-double-left</v-icon>
                </v-btn>
            </v-col>

            <v-col class="d-flex align-center" cols="10" md="6">
                <v-text-field ref="search" solo hide-details dense label="Cari penggalangan dana disini" append-icon="search"></v-text-field>
            </v-col>
            
            <v-col cols="3" class="d-flex justify-end">
            </v-col>
        </v-row>  
    </v-app-bar>

</template>

<script>
    export default {
        data: () => ({
            
        }),
        methods: {
            goBack: function () {
                this.$router.go(-1);
            }
        },
        mounted(){
            this.$refs.search.focus();
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