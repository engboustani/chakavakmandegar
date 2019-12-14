<template>
    <div v-if="isRegistered">
        <div class="alert alert-success" role="alert">
            <p>شما در این ورک‌شاپ ثبت‌نام کرده‌اید.</p>
        </div>
    </div>
    <div v-else-if="registrationLimited">
        <div class="alert alert-success" role="alert">
            <p>ظرفیت این ورکشاپ به اتمام رسیده است.</p>
        </div>
    </div>
    <div class="card" v-else-if="this.$store.getters.isAuthenticated && isStatusOK">
        <div class="card-body">
            <h3 class="card-title"><i class="el-icon-s-order"></i> ثبت‌نام</h3>
            <el-button type="success" v-on:click="signupCourse" :loading="loading">ثبت‌نام</el-button>
        </div>
    </div>
    <div v-else>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">اخطار!</h4>
            <p>برای ثبت‌نام ابتدا باید وارد حساب خود شوید.</p>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            isStatusOK: false,
            isRegistered: false,
            registrationLimited: false,
            loading: false,
        }
    },
    props: {
        course_id: {
            required: true,
            type: Number
        },
        gosign: {
            required: false,
            type: Boolean,
            default: false
        },
        error: {
            required: false,
            type: Boolean,
            default: false
        }
    },
    mounted() {
        axios({url: `/api/course/info/${this.course_id}`, method: 'GET' })
        .then(resp => {
            if(resp.data.status == 1)
            {
                this.isStatusOK = true;
            }
            if(resp.data.status == -1)
            {
                this.isRegistered = true;
            }
            else if(resp.data.status == -2)
            {
                this.registrationLimited = true;
            }
        })
        .catch(err => {
            console.log('Error: can\'t get ticket information!', err)
        })
        if (this.error) {
            this.$message({
                message: 'پرداخت شما با مشکل مواجه شد لطفا دوباره تلاش کنید!',
                type: 'error'
            });
        }
        if (this.gosign) {
            this.signupCourse();
        }
    },
    methods: {
        signupCourse: function() {
            this.loading = true;
            axios({url: `/api/course/signup`, data: {id: this.course_id}, method: 'POST' })
            .then(resp => {
                if (resp.status == 201) {
                    this.$message({
                        message: 'با موفقیت ثبت‌نام نمودید!',
                        type: 'success'
                    });
                    this.isRegistered = true;
                    this.loading = false;
                }
                if (resp.status == 200) {
                    this.$message('درحال انتقال به صفحه پرداخت');
                    window.location.href = resp.data.url;
                    this.loading = false;
                }
            })
            .catch(err => {
                console.log('Error: can\'t get ticket information!', err)
            })

        }
    }
}
</script>

<style>

</style>