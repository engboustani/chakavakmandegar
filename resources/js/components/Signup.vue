<template>
    <form @submit="register">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <div class="form-group" :class="{ 'form-group--error': $v.firstname.$error }">
                    <label for="firstname">نام</label>
                    <input type="text" class="form-control" id="firstname" v-model.lazy="$v.firstname.$model" placeholder="First name" required>                    
                </div>
                <div class="error" v-if="!$v.firstname.required">* این فیلد باید پر شود</div>
                <div class="error" v-if="!$v.firstname.minLength">* نام باید حداقل {{$v.firstname.$params.minLength.min}} حرف باشد.</div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group" :class="{ 'form-group--error': $v.lastname.$error }">
                    <label for="lastname">نام خانوادگی</label>
                    <input type="text" class="form-control" id="lastname" v-model.lazy="$v.lastname.$model" placeholder="Last name" required>
                </div>
                <div class="error" v-if="!$v.lastname.required">* این فیلد باید پر شود</div>
                <div class="error" v-if="!$v.lastname.minLength">* نام خانوادگی باید حداقل {{$v.lastname.$params.minLength.min}} حرف باشد.</div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group" :class="{ 'form-group--error': $v.iranid.$error }">
                    <label for="iranid">کد ملی</label>
                    <input type="text" class="form-control" id="iranid" v-model.lazy="$v.iranid.$model" placeholder="Identification" required>
                </div>
                <div class="error" v-if="!$v.iranid.required">* این فیلد باید پر شود</div>
                <div class="error" v-if="!$v.iranid.iranID">* کد ملی درست نمی‌باشد</div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <div class="form-group" :class="{ 'form-group--error': $v.phone.$error }">
                    <label for="phone">شماره همراه</label>
                    <input type="text" class="form-control" id="phone"  v-model.lazy="$v.phone.$model" placeholder="09xxxxxxxxx" required>
                </div>
                <div class="error" v-if="!$v.phone.required">* این فیلد باید پر شود</div>
                <div class="error" v-if="!$v.phone.phone">* شماره همراه درست نمی‌باشد</div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group" :class="{ 'form-group--error': $v.password.$error }">
                    <label for="password">رمز عبور</label>
                    <input type="password" class="form-control" id="password" v-model.lazy="$v.password.$model" placeholder="Password" required>
                </div>
                <div class="error" v-if="!$v.password.required">* این فیلد باید پر شود</div>
                <div class="error" v-if="!$v.password.minLength">* نام خانوادگی باید حداقل {{$v.password.$params.minLength.min}} حرف باشد.</div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group" :class="{ 'form-group--error': $v.password_confirmation.$error }">
                    <label for="password_confirmation">تکرار رمزعبور</label>
                    <input type="password" class="form-control" id="password_confirmation" v-model.lazy="$v.password_confirmation.$model" placeholder="Confirm Password" required>
                </div>
                <div class="error" v-if="!$v.password_confirmation.sameAsPassword">* باید یا فیلد رمز‌عبور یکی باشد</div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="form-group" :class="{ 'form-group--error': $v.captcha.$error }">
                            <label for="captcha">کد امنیتی</label>
                            <input type="text" class="form-control" id="captcha" v-model.lazy="$v.captcha.$model" required>                
                        </div>
                        <div class="error" v-if="!$v.captcha.required">* این فیلد باید پر شود</div>
                    </div>
                    <div class="col-6 align-items-center">
                        <div class="captcha">
                            <button class="btn-img" type="button" v-on:click="newCatcha()">
                                <div class="img-wrap">
                                    <img :src="captcha_src" alt="" width="160" height="46" />
                                </div>
                            </button>
                        </div>
                    </div>                
                </div>
            </div>
        </div>            
        <div class="form-group">
            <div class="form-check">
                <el-checkbox label="من قوانین را خوانده‌ام و با آن موافقت میکنم" v-model.lazy="$v.roles_confirmation.$model" name="type"></el-checkbox>
                <a href="/rules">قوانین</a>
            </div>
            <div class="error" v-if="!$v.roles_confirmation.sameAs">* قوانین را باید بپذیرید</div>
        </div>
        <el-button type="primary" round v-on:click="register()" :loading="loading">ثبت فرم</el-button>
    </form>
</template>

<script>
import { validationMixin } from 'vuelidate'
import { required, minLength, helpers, sameAs } from 'vuelidate/lib/validators'
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
const phone = helpers.regex('phone', RegExp("09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}"));

export default {
    mixins: [validationMixin],
    props: {
        csrftoken: String
    },
    data: function() {return {
        firstname: '',
        lastname: '',
        iranid: '',
        phone: '',
        password: '',
        password_confirmation: '',
        captcha: '',
        roles_confirmation: false,
        captcha_src: '',
        captcha_key: '',
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
                this.captcha_src = resp.data.data.img;
                this.captcha_key = resp.data.data.key;
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
            const { firstname, lastname, iranid, phone, password, password_confirmation, captcha, captcha_key} = this;
            const _token = this.csrftoken;
            this.$v.$touch()
            if (this.$v.$invalid) {
                this.$notify.error({
                    title: 'خطا',
                    message: 'فیلدها مشکل دارد',
                    type: 'error'
                });
                this.loading = false;
            } else {
                this.$store.dispatch('register', { _token, firstname, lastname, iranid, phone, password, password_confirmation, captcha, ckey: captcha_key})
                .then(() => {
                    this.loading = false;
                    this.$notify.error({
                        title: 'ثبت شد',
                        message: 'شما با موفقیت ثبت نام کردید',
                        type: 'success'
                    });
                    window.location.href = '/';
                })
                .catch((err) => {
                    console.log(err);
                    this.$notify.error({
                        title: 'خطا',
                        message: 'فیلدها مشکل دارد',
                        type: 'error'
                    });
                    this.loading = false;
                    this.newCatcha();
                    this.captcha = '';
                });
            }
        }
    },
    validations: {
        firstname: {
            required,
            minLength: minLength(3)
        },
        lastname: {
            required,
            minLength: minLength(3)
        },
        iranid: {
            required,
            iranID
        },
        phone: {
            required,
            phone
        },
        password: {
            required,
            minLength: minLength(6)
        },
        password_confirmation: {
            sameAsPassword: sameAs('password')
        },
        captcha: {
            required
        },
        roles_confirmation: {
            sameAs: sameAs( () => true )
        }
    }
}
</script>

<style>
div.error {
    font-size: small;
    color: #c83333;
}

.btn-img {
    display: block;
    margin: 0;
    padding: 0;
    border: 0;
    cursor: pointer;
    background-color: white;
}
.btn-img .img-wrap {
    margin: 0;
}

.btn-img img {
    display: block;
}

.btn-img:hover .img-wrap {
    background-color: black;
}

.btn-img:hover img {
    opacity: 0.8;
}
</style>