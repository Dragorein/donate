<template>
<v-app>
    <router-view></router-view>
</v-app>
</template>

<script>
    export default {
        name: "app",
        data() {
            return {
                user: null,
                // initiated: false,
            }
        },
        created() {
            this.awal();
            
        },
        methods:{
            awal(){
                console.log('halo');
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