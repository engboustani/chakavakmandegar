<template>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ورود</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="login">نام‌کاربری یا شماره‌همراه</label>
                    <input type="input" class="form-control" id="login" aria-describedby="emailHelp" v-model="login" placeholder="Username or Phonenumber">
                </div>
                <div class="form-group">
                    <label for="password">رمز عبور</label>
                    <input type="password" class="form-control" id="password" v-model="password" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <el-checkbox label="مرا به خاطر بسپار" name="type" v-model="remember_me" id="remember_me"></el-checkbox>
                </div>
            </div>
            <div class="modal-footer">
                <el-button type="info" round>بستن</el-button>
                <el-button type="primary" round v-on:click="loginButton()" :loading="loading">ورود</el-button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            login: '',
            password: '',
            remember_me: false,
            loading: false
        }
    },
    methods: {
        loginButton: function() {
            this.loading = true;
            const { login, password, remember_me} = this;
            this.$store.dispatch('login', { login, password, remember_me }).then(() => {
                this.loading = false;
                window.location.reload();
            })
        }
    }
}
</script>

<style>

</style>