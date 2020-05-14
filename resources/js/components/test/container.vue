<template>
<v-app>
    <navbar/>
    
    <main class="h-100">
        <div class="fluid">
            <section class="top-space">
                <v-container class="py-12">
                    <v-row>
                        <v-col>
                            <v-card raised max-width="600px" class="mx-auto p-md-4">
                                <v-card-title><v-icon large color="green" left></v-icon>TEST PAGE</v-card-title>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-container>
            </section>
        </div>
    </main>
    
    <footbar/>
</v-app>
</template>

<script>
export default {
    data: () => ({
        author: 'Louise',
        target:'Josh',
        title: 'Supermodel',
        donasi: '10.000',
        bank: 'BCA',
        icon: '/icon/BCA.png',
    }),
    methods: {
        reroutes: function (url) {
            this.$router.push({ path: url });
        },
        goBack: function () {
            this.$router.go(-1);
        }
    }
}
</script>