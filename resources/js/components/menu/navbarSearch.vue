<template>

    <v-toolbar flat dense>
        <v-row>
            <v-col class="d-flex justify-start align-center" cols="3">
                <v-toolbar-items class="h-100">
                    <v-btn @click="goBack" text small>
                        <v-icon left>mdi-chevron-double-left</v-icon>Kembali
                    </v-btn>
                </v-toolbar-items>
            </v-col>
            <v-col class="d-flex justify-space-around align-center">
                <v-text-field ref="search" solo hide-details dense label="Cari penggalangan dana disini" append-icon="search"></v-text-field>
            </v-col>
            <v-col cols="3" class="d-flex justify-end">
            </v-col>
        </v-row>  
    </v-toolbar>

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