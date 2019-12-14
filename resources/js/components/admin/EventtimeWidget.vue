<template>
    <div class="card card-widget card-item mb-2" v-on:click="goEventtime(eventtime.id)" v-if="eventtime">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <small>شروع</small>
                    <p class="mt-1 mb-0">{{jalaliStart()}}</p>
                </div>
                <div class="col">
                    <small>پایان</small>
                    <p class="mt-1 mb-0">{{jalaliEnd()}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <small>مهلت خرید</small>
                    <p class="mt-1 mb-0">{{jalaliLimit()}}</p>
                </div>
                <div class="col">
                    <small>بلیت فروخته شده</small>
                    <p class="mt-1 mb-0">{{0}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <small>وضعیت</small>
                    <p class="mt-1 mb-0">{{eventtime.enable ? 'فعال' : 'غیرفعال'}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-widget card-plus bg-light mb-2" v-on:click="newEventtime()" v-else>
        <div class="card-body">
            <i class="el-icon-plus mr-2"></i>افزودن
        </div>
    </div>
</template>

<script>
const moment = require('jalali-moment');
import shared from '../../shared';

export default {
    props: {
        eventtime: Object,
        event_id: Number
    },
    methods: {
        newEventtime() {window.location.href = `/admin/eventtime/new?for=${this.event_id}`;},
        goEventtime(id) {window.location.href = `/admin/eventtime/${id}`;},
        constructor: shared.constructor,
        jalaliStart() {
            return this.constructor(moment(this.eventtime.start).locale('fa').format('YYYY/M/D H:m'));
        },
        jalaliEnd() {
            return this.constructor(moment(this.eventtime.end).locale('fa').format('YYYY/M/D H:m'));
        },
        jalaliLimit() {
            return this.constructor(moment(this.eventtime.deadline).locale('fa').format('YYYY/M/D H:m'));
        },
    }
}
</script>

<style>
.card-widget {
    cursor: pointer;
}

.card-item:hover {
    box-shadow: 0 1px 2px #00000038;
}

.card-plus {
    border: dashed 1px #0000004d;
    color: #8a8a8a;
}

.card-plus:hover {
    border: dashed 1px #0012ff4d;
    color: #0012ff4d;
}
</style>