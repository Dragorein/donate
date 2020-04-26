<template>

    <v-app-bar flat color="white" class="py-2 h-auto">
        <v-row>
            <v-col class="back-lg" cols="2" md="3">
                <v-btn text @click="goBack">
                    <v-icon left>mdi-chevron-double-left</v-icon>Kembali
                </v-btn>
            </v-col>

            <v-col class="d-flex align-start" cols="12" md="6">
                <v-btn class="back-md mr-3" @click="goBack" small fab>
                    <v-icon>mdi-chevron-double-left</v-icon>
                </v-btn>
                <v-text-field ref="search" solo hide-details dense label="Cari penggalangan dana disini" append-icon="search"></v-text-field>
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
    .back-lg {
        display: block;
    }

    .back-md {
        display: none;
    }

    @media only screen and (max-width: 959px) {
        .back-lg {
            display: none;
        }

        .back-md {
            display: block;
        }
    }

    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, .v-chip:hover {
        text-decoration: none;
    }
</style>