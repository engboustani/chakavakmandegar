<template>
    <div class="row align-items-center" v-if="!authenticated">
      <div class="col-sm-12 text-center zoomheader align-items-center signuphome zoom-in">
        <div class="row my-5" style="display: block;">
          <h3 class="font-weight-light white home-title font-weight-bold"><span class="p-2"><span class="black-background">ثبت نام کنید</span></span></h3>
          <p class="lead white home-title font-weight-bold"><span class="p-2"><span class="black-background">با ثبت‌نام در سایت چکاوک ماندگار از اخرین اخبار آگاه شوید و تخفیف بگیرید</span></span></p>
          <p><a class="btn btn-light mr-3" href="/signup" role="button">ثبت نام</a><a class="btn btn-light" href="/userlogin" role="button">ورود</a></p>    
        </div>
      </div>
    </div>
</template>

<script>
export default {
    computed: {
        authenticated: {
            get: function() {
                return this.$store.getters.isAuthenticated;
            }
        }
    }
}
</script>

<style>

</style>