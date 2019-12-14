<template>
    <div>
        <h5 class="mb-3">شماره صندلی {{ seat.number }}</h5>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">قیمت</span>
            </div>
            <input type="number" class="form-control" v-model.number="seat.price" placeholder="قیمت">
        </div>
        <el-checkbox v-model="seat.capacity_fullness">تکمیل ظرفیت</el-checkbox>
        <el-checkbox v-model="seat.reserved">رزرو</el-checkbox>
        <button class="btn btn-primary" type="submit">اعمال صندلی</button>
    </div>
</template>

<script>
export default {
    props: {
        eventtime_id: {
            required: true,
            type: Number
        },
        number: {
            required: true,
            type: Number
        },
        seat: {
            required: true,
            type: Object
        }
    },
    data: function() {
        return {
            seat_number: 0,
            price: 0,
            reserved: false
        }
    },
    mounted: function() {
        if (this.eventtime_id != null) {
            this.getSeat();            
        }
    },
    methods: {
        getSeat: function() {
            axios({url: `/api/seat/${this.eventtime_id}/${this.number}`, method: 'GET' })
            .then(resp => {
                this.price = resp.data.price;
                this.reserved = resp.data.reserved;
            })
            .catch(err => {
                console.log('Error: can\'t get seat!', err)
            })
        }
    },
    watch: {
        number: function(newVal, oldVal) {
            if (this.eventtime_id != null) {
                this.getSeat();            
            }
        }
    }
}
</script>

<style>

</style>