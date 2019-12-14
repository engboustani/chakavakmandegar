<template>
    <div class="modal-dialog" role="document">
        <form v-on:submit.prevent="purchaseButton">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">افزایش اعتبار</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" :class="{ 'form-group--error': $v.amount.$error }">
                    <label for="amount">مبلغ</label>
                    <input type="input" class="form-control" id="amount" v-model.lazy="$v.amount.$model" placeholder="Amount">
                </div>
                <div class="error" v-if="!$v.amount.required">* این فیلد باید پر شود</div>
                <div class="error" v-if="!$v.amount.min">* مبلغ کمتر از 1000 تومان نمی‌تواند باشد.</div>
            </div>
            <div class="modal-footer">
                <el-button type="info" data-dismiss="modal" round>بستن</el-button>
                <el-button type="primary" round native-type="submit" :loading="loading" :disabled="$v.$invalid">پرداخت</el-button>
            </div>
        </div>
        </form>
    </div>
</template>

<script>
import { validationMixin } from 'vuelidate'
import { required, minValue } from 'vuelidate/lib/validators'

export default {
    mixins: [validationMixin],
    data: function() { return {
        loading: false,
        amount: 1000,
    }},
    methods: {
        purchaseButton: function() {
            if (this.$v.$invalid) {
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
    },
    validations: {
        amount: {
            required,
            min: minValue(1000)
        },
    }

}
</script>

<style>

</style>