<template>
    <div class="card bg-light">
        <div class="card-body" v-if="mode == 0">
            <h4><i class="el-icon-loading top-icon"></i> در حال پردازش!</h4>
        </div>
        <div class="card-body" v-if="mode == 1">
            <h4 class="succ"><i class="el-icon-success top-icon"></i>  پرداخت با موفقیت انجام شد!</h4>
            <p>برای چاپ بلیت ها میتوانید از اینجا اقدام کنید</p>
        </div>
        <div class="card-body" v-if="mode == 2">
            <h4 class="error"><i class="el-icon-error top-icon"></i>  پرداخت با خطا مواجه شد!</h4>
            <p>در صورت کم شدن مبلغ از حساب بانکی و افزوده نشدن به شارژ شما با ما در تماس باشید</p>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            mode: 0,
        }
    },
    props: {
        factor_id: Number
    },
    mounted: function() {
        if (this.authenticated) {
            axios({url: '/api/shop/pay', data: {factor_id: this.factor_id}, method: 'POST' })
                .then(resp => {
                    if(resp.data.status == 1)
                    {
                        this.mode = 1;
                    }
                    if(resp.data.status == 2)
                    {
                        window.location.href = resp.data.payment_url;
                    }
                    if(resp.data.status == 3)
                    {
                        this.mode = 2;
                    }

                })
                .catch(err => {
                    console.log('Error: can\'t send factor to pay!', err)
                })
        }
        else
        {
            axios({url: '/api/shop/pay-not-user', data: {factor_id: this.factor_id}, method: 'POST' })
                .then(resp => {
                    if(resp.data.status == 1)
                    {
                        this.mode = 1;
                    }
                    if(resp.data.status == 2)
                    {
                        window.location.href = resp.data.payment_url;
                    }
                    if(resp.data.status == 3)
                    {
                        this.mode = 2;
                    }

                })
                .catch(err => {
                    console.log('Error: can\'t send factor to pay!', err)
                })
        }
    },
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
.top-icon {
    font-size: 2rem;
}

.error {
    color: #7f0000;
}

.succ {
    color: #1B5E20;
}
</style>