<template>
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="mb-3"><i class="el-icon-s-ticket mr-2"></i>تیکت صندلی شماره {{ticket.seat}}</h5>
            </div>
            <div class="card-footer text-muted">
                {{constructor(ticket.price)}} تومان
            </div>
        </div>
    </div>  
</template>

<script>
import shared from '../shared';

export default {
    data: function() {
        return {
            id: 0,
            price: 0,
            firstname: '',
            lastname: '',
            phone: ''
        }
    },
    props: {
        ticket: Object,
        eventtime_id: Number
    },
    methods: {
        constructor: shared.constructor
    },
    mounted: function() {
        // axios({url: `/api/seat/info/${this.eventtime_id}/${this.seatId}`, method: 'GET' })
        // .then(resp => {
        //     this.ticket.id = resp.data.id;
        //     this.ticket.price = resp.data.price;
        //     this.ticketfirstname = resp.data.firstname;
        //     this.lastname = resp.data.lastname;
        //     this.phone = resp.data.phone;
        // })
        // .catch(err => {
        //     console.log('Error: can\'t get ticket information!', err)
        // })
    },
    computed: {
        seatId: {
            get: function() {
                return parseInt(this.ticket.id);
            }
        },
    }
}
</script>

<style>

</style>