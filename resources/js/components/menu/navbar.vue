<template>

    <v-toolbar flat dense extended>
        <v-row>
            <v-col class="d-flex justify-end align-center" cols="3">
                <v-toolbar-title>KitaBantu</v-toolbar-title>
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