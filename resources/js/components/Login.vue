<template>
        <form  v-on:submit.prevent="loginButton">
            <div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ورود</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group" :class="{ 'form-group--error': $v.login.$error }">
                        <label for="login">کدملی یا شماره‌همراه</label>
                        <input type="input" class="form-control" id="login" aria-describedby="emailHelp" v-model.lazy="$v.login.$model" placeholder="Username or Phonenumber">
                    </div>
                    <div class="error" v-if="!$v.login.required">* این فیلد باید پر شود</div>
                    <div class="error" v-if="!$v.login.login">* کدملی یا شماره‌همراه خود را وارد کنید.</div>
                    <div class="form-group" :class="{ 'form-group--error': $v.password.$error }">
                        <label for="password">رمز عبور</label>
                        <input type="password" class="form-control" id="password" v-model.lazy="$v.password.$model" placeholder="Password">
                    </div>
                    <div class="error" v-if="!$v.password.required">* این فیلد باید پر شود</div>
                    <div class="form-group form-check">
                        <el-checkbox label="مرا به خاطر بسپار" name="type" v-model="remember_me" id="remember_me"></el-checkbox>
                    </div>
                </div>
                <div class="modal-footer">
                    <el-button type="info" data-dismiss="modal" round>بستن</el-button>
                    <el-button type="primary" round native-type="submit" :loading="loading" :disabled="$v.$invalid">ورود</el-button>
                </div>
            </div>
        </form>

</template>

<script>
import { validationMixin } from 'vuelidate'
import { required, email, helpers, or } from 'vuelidate/lib/validators'
const phone = helpers.regex('phone', /^(?:(\u0660\u0669[\u0660-\u0669][\u0660-\u0669]{8})|(\u06F0\u06F9[\u06F0-\u06F9][\u06F0-\u06F9]{8})|(09[0-9][0-9]{8}))$/g);
const iranID = (value) => {
    if (!/^\d{10}$/.test(value)
|| value=='0000000000'
|| value=='1111111111'
|| value=='2222222222'
|| value=='3333333333'
|| value=='4444444444'
|| value=='5555555555'
|| value=='6666666666'
|| value=='7777777777'
|| value=='8888888888'
|| value=='9999999999')
        return false;
    var check = parseInt(value[9]);
    var sum = 0;
    var i;
    for (i = 0; i < 9; ++i) {
        sum += parseInt(value[i]) * (10 - i);
    }
    sum %= 11;
    return (sum < 2 && check == sum) || (sum >= 2 && check + sum == 11);
}

export default {
    mixins: [validationMixin],
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
            this.$v.$touch()
            if (this.$v.$invalid) {
                this.$notify.error({
                    title: 'خطا',
                    message: 'فیلدها مشکل دارد',
                    type: 'error'
                });
                this.loading = false;
            } else {
                this.$store.dispatch('login', { login, password, remember_me }).then(() => {
                    this.loading = false;
                    window.location.href = `/`
                })
            }
        }
    },
    validations: {
        password: {
            required,
        },
        login: {
            required,
            login: or(iranID, phone)
        },
    }

}

</script>

<style>

</style>