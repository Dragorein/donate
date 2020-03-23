<template>

    <v-toolbar flat dense extended>
        <v-row>
            <v-col class="d-flex justify-start align-center" cols="3">
                <v-toolbar-title @click="reroutes('/')" class="headline font-weight-medium" style="cursor: pointer">
                    <v-icon color="black" left>mdi-hand-heart mdi-36px</v-icon>Kindly
                </v-toolbar-title>
            </v-col>
            
            <v-col class="d-flex justify-space-around align-center">
                <v-text-field @mousedown="reroutes('search')" solo hide-details dense label="Cari penggalangan dana disini" append-icon="search"></v-text-field>
            </v-col>
            
            <v-col cols="3" class="d-flex justify-end">
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

        <v-row slot="extension">
            <v-col class="d-flex justify-center align-center">
                <v-btn href="donasi" text>Donasi</v-btn>
                <v-btn href="galang" text>Galang Dana</v-btn>
                <v-btn href="bantuan" text>Bantuan</v-btn>
            </v-col>   
        </v-row>
    </v-toolbar>

</template>

<script>
    export default {
        data: () => ({
            
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
    
    a.v-btn:hover, .v-chip:hover {
        text-decoration: none;
    }
</style>