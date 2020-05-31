<template>
<v-app>
    <router-view></router-view>
</v-app>
</template>

<script>
    export default {
        data() {
            return {
                user: null,
                // initiated: false,
            }
        },
        // created() {
        //     this.awal();
            
        // },
        methods:{
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