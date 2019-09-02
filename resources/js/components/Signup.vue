<template>
    <form>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="firstname">نام</label>
                <input type="text" class="form-control" id="firstname" v-model="firstname" placeholder="First name" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="lastname">نام خانوادگی</label>
                <input type="text" class="form-control" id="lastname" v-model="lastname" placeholder="Last name" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="email">ایمیل</label>
                <input type="text" class="form-control" id="email" v-model="email" placeholder="eMail" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="phone">شماره همراه</label>
                <input type="text" class="form-control" id="phone" v-model="phone" placeholder="09xxxxxxxxx" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="password">رمز عبور</label>
                <input type="password" class="form-control" id="password" v-model="password" placeholder="Password" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="password_confirmation">تکرار رمزعبور</label>
                <input type="password" class="form-control" id="password_confirmation" v-model="password_confirmation" placeholder="Confirm Password" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <div class="row">
                    <div class="col-12">
                        <label for="captcha">کد امنیتی</label>
                        <input type="text" class="form-control" id="captcha" v-model="captcha" required>                
                    </div>
                    <div class="col-12">
                        <div class="captcha">
                            <span><img :src="captcha_src" alt=""></span>
                            <el-button type="info" :icon="captcha_btn" v-on:click="newCatcha()" circle></el-button>
                        </div>
                    </div>                
                </div>
            </div>
        </div>            
        <div class="form-group">
            <div class="form-check">
                <el-checkbox label="من قوانین را خوانده‌ام و با آن موافقت میکنم" v-model="roles_confirmation" name="type"></el-checkbox>
            </div>
        </div>
        <el-button type="primary" round v-on:click="register()" :loading="loading">ثبت فرم</el-button>
    </form>
</template>

<script>
export default {
    data: function() {return {
        firstname: '',
        lastname: '',
        email: '',
        phone: '',
        password: '',
        password_confirmation: '',
        captcha: '',
        roles_confirmation: false,
        captcha_src: '',
        captcha_btn: 'el-icon-loading',
        loading: false,
    }},
    mounted: function() {
        this.newCatcha();
    },
    methods: {
        newCatcha: function() {
            this.captcha_btn = "el-icon-loading";
            axios({url: '/api/auth/signup/recaptcha', method: 'GET' })
            .then(resp => {
                this.captcha_src = resp.data;
                this.captcha_btn = "el-icon-refresh";
            })
            .catch(err => {
                console.log('Failed to get a new captcha');
                this.$notify.error({
                    title: 'Error',
                    message: 'Failed to get a new captcha'
                });
                this.captcha_btn = "el-icon-refresh";
            });
        },
        register: function() {
            this.loading = true;
            const { firstname, lastname, email, phone, password, password_confirmation, captcha} = this;
            const _token = this.$cookies.get('csrftoken');
            this.$store.dispatch('register', { _token, firstname, lastname, email, phone, password, password_confirmation, captcha})
            .then(() => {
                this.loading = false;
                this.$notify.error({
                    title: 'ثبت شد',
                    message: 'شما با موفقیت ثبت نام کردید',
                    type: 'success'
                });
            })
            .catch(err => console.log(err))
        }
    }
}
</script>

<style>

</style>