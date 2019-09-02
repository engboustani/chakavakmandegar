<template>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">افزایش اعتبار</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="amount">مبلغ</label>
                    <input type="input" class="form-control" id="amount" v-model="amount" placeholder="Amount">
                    <small id="emailHelp" class="form-text text-muted">* مبلغ کمتر از 1000 تومان نمی‌تواند باشد</small>
                </div>
            </div>
            <div class="modal-footer">
                <el-button type="info" round>بستن</el-button>
                <el-button type="primary" round v-on:click="purchaseButton()" :loading="loading">پرداخت</el-button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() { return {
        loading: false,
        amount: 1000,
    }},
    methods: {
        purchaseButton: function() {
            if (this.amount >= 1000) {
                this.loading = true;
                axios({url: '/api/payment/payir', data: {amount: this.amount}, method: 'POST' })
                .then(resp => {
                    this.loading = false;
                    window.location.href = resp.data.payir_url;
                })
                .catch(err => {
                    console.log('Error: send to purcheas failed!', err)
                    this.loading = false;
                })
            }
        }
    }
}
</script>

<style>

</style>