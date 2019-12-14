<template>
    <div>
        <button class="el-button el-button--primary is-round my-2 my-sm-0 nav-login" type="button" data-toggle="modal" data-target="#loginModal" v-if="!isAuthenticated">ورود</button><a class="el-button el-button--success is-round my-2 my-sm-0 nav-signup" href="/signup" v-if="!isAuthenticated">ثبت‌نام</a>
        <el-button type="primary" v-if="isAuthenticated" data-toggle="modal" data-target="#creditModal" round>اعتبار: {{ constructor(credit) }} تومان</el-button>
        <el-button type="info" v-on:click="logoutButton()" v-if="isAuthenticated" round>خروج</el-button>
    </div>
</template>

<script>
import shared from '../shared';


export default {
    computed: {
        isAuthenticated : function(){ return this.$store.getters.isAuthenticated },
        fullname : function(){ return this.$store.state.fullname },
        credit : function(){ return this.$store.state.credit }
    },
    methods: {
        logoutButton: function() {
            this.$store.dispatch('logout')
            .then(() => {
                
            })
        },
        constructor: shared.constructor,        
    },
    mounted: function() {
        this.$store.dispatch('getInfo');
    }
}
</script>

<style>

</style>