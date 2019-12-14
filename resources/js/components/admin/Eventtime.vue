<template>
    <div class="row">
        <div class="col-8">

            <div class="form-group">
                <label for="title">عنوان ایونت</label>
                <h4 class="pb-3">{{ event_title }}</h4>
            </div>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="summery">تاریخ شروع</label>
                        <date-picker type="datetime" input-format="YYYY/MM/DD HH:mm" format="jYYYY/jMM/jDD HH:mm" :min="moment().locale('fa').format('YYYY/MM/DD HH:mm:ss')" v-model="startModel" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="summery">تاریخ پایان</label>
                        <date-picker type="datetime" input-format="YYYY/MM/DD HH:mm" format="jYYYY/jMM/jDD HH:mm" :min="startModel" v-model="endModel" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="summery">تاریخ مهلت</label>
                        <date-picker type="datetime" input-format="YYYY/MM/DD HH:mm" format="jYYYY/jMM/jDD HH:mm" :max="startModel" v-model="limitModel" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <svg version="1.1" id="x" width="710" height="480">
                                    <g board>
                                        <rect x="15" y="370.3" width="682" height="94.7"/>
                                        <text transform="matrix(1 0 0 1 355.0001 417.6496)" class="st1 st2 st3">صحنه</text>
                                        <rect zoom-control="left" x="15" y="14.6" class="st4" width="250" height="339.6"/>
                                        <text zoom-control="left" transform="matrix(1 0 0 1 141.8001 184.4502)" class="st1 st2 st3">چپ</text>
                                        <rect zoom-control="center" x="274.5" y="14.6" class="st4" width="205.5" height="339.6"/>
                                        <text zoom-control="center" transform="matrix(1 0 0 1 376.4998 184.4)" class="st1 st2 st3">مرکز</text>
                                        <rect zoom-control="right" x="491.5" y="212.9" class="st4" width="205.5" height="141.4"/>
                                        <text zoom-control="right" transform="matrix(1 0 0 1 593.4998 283.6001)" class="st1 st2 st3">راست</text>
                                        <g seating-area="left" zoom-target="left">
                                            <rect seat id="101" x="57.3" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="102" x="99.5" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="103" x="141.8" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="104" x="185.5" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="105" x="230" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="201" x="57.3" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="202" x="99.5" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="203" x="141.8" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="204" x="185.5" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="205" x="230" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="301" x="15" y="212.8" class="st0" width="35" height="42.3"/>
                                            <rect seat id="302" x="57.3" y="212.8" class="st0" width="35" height="42.3"/>
                                            <rect seat id="303" x="99.5" y="212.8" class="st0" width="35" height="42.3"/>
                                            <rect seat id="304" x="141.8" y="212.8" class="st0" width="35" height="42.3"/>
                                            <rect seat id="305" x="185.5" y="212.8" class="st0" width="35" height="42.3"/>
                                            <rect seat id="306" x="230" y="212.8" class="st0" width="35" height="42.3"/>
                                            <rect seat id="401" x="15" y="163.3" class="st0" width="35" height="42.3"/>
                                            <rect seat id="402" x="57.3" y="163.3" class="st0" width="35" height="42.3"/>
                                            <rect seat id="403" x="99.5" y="163.3" class="st0" width="35" height="42.3"/>
                                            <rect seat id="404" x="141.8" y="163.3" class="st0" width="35" height="42.3"/>
                                            <rect seat id="405" x="185.5" y="163.3" class="st0" width="35" height="42.3"/>
                                            <rect seat id="406" x="230" y="163.3" class="st0" width="35" height="42.3"/>
                                            <rect seat id="501" x="15" y="113.7" class="st0" width="35" height="42.3"/>
                                            <rect seat id="502" x="57.3" y="113.7" class="st0" width="35" height="42.3"/>
                                            <rect seat id="503" x="99.5" y="113.7" class="st0" width="35" height="42.3"/>
                                            <rect seat id="504" x="141.8" y="113.7" class="st0" width="35" height="42.3"/>
                                            <rect seat id="505" x="185.5" y="113.7" class="st0" width="35" height="42.3"/>
                                            <rect seat id="506" x="230" y="113.7" class="st0" width="35" height="42.3"/>
                                            <rect seat id="601" x="15" y="64.1" class="st0" width="35" height="42.3"/>
                                            <rect seat id="602" x="57.3" y="64.1" class="st0" width="35" height="42.3"/>
                                            <rect seat id="603" x="99.5" y="64.1" class="st0" width="35" height="42.3"/>
                                            <rect seat id="604" x="141.8" y="64.1" class="st0" width="35" height="42.3"/>
                                            <rect seat id="605" x="185.5" y="64.1" class="st0" width="35" height="42.3"/>
                                            <rect seat id="606" x="230" y="64.1" class="st0" width="35" height="42.3"/>
                                            <rect seat id="701" x="15" y="14.6" class="st0" width="35" height="42.3"/>
                                            <rect seat id="702" x="57.3" y="14.6" class="st0" width="35" height="42.3"/>
                                            <rect seat id="703" x="99.5" y="14.6" class="st0" width="35" height="42.3"/>
                                            <rect seat id="704" x="141.8" y="14.6" class="st0" width="35" height="42.3"/>
                                            <rect seat id="705" x="185.5" y="14.6" class="st0" width="35" height="42.3"/>
                                            <rect seat id="706" x="230" y="14.6" class="st0" width="35" height="42.3"/>
                                        </g>
                                        <g seating-area="center" zoom-target="center">
                                            <rect seat id="106" x="274.5" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="107" x="316.7" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="108" x="359" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="109" x="401.3" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="110" x="445" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="206" x="274.5" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="207" x="316.7" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="208" x="359" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="209" x="401.3" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="210" x="445" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="307" x="274.5" y="212.8" class="st0" width="35" height="42.3"/>
                                            <rect seat id="308" x="316.7" y="212.8" class="st0" width="35" height="42.3"/>
                                            <rect seat id="309" x="359" y="212.8" class="st0" width="35" height="42.3"/>
                                            <rect seat id="310" x="401.3" y="212.8" class="st0" width="35" height="42.3"/>
                                            <rect seat id="311" x="445" y="212.8" class="st0" width="35" height="42.3"/>
                                            <rect seat id="407" x="274.5" y="163.3" class="st0" width="35" height="42.3"/>
                                            <rect seat id="408" x="316.7" y="163.3" class="st0" width="35" height="42.3"/>
                                            <rect seat id="409" x="359" y="163.3" class="st0" width="35" height="42.3"/>
                                            <rect seat id="410" x="401.3" y="163.3" class="st0" width="35" height="42.3"/>
                                            <rect seat id="411" x="445" y="163.3" class="st0" width="35" height="42.3"/>
                                            <rect seat id="507" x="274.5" y="113.7" class="st0" width="35" height="42.3"/>
                                            <rect seat id="508" x="316.7" y="113.7" class="st0" width="35" height="42.3"/>
                                            <rect seat id="509" x="359" y="113.7" class="st0" width="35" height="42.3"/>
                                            <rect seat id="510" x="401.3" y="113.7" class="st0" width="35" height="42.3"/>
                                            <rect seat id="511" x="445" y="113.7" class="st0" width="35" height="42.3"/>
                                            <rect seat id="607" x="274.5" y="64.1" class="st0" width="35" height="42.3"/>
                                            <rect seat id="608" x="316.7" y="64.1" class="st0" width="35" height="42.3"/>
                                            <rect seat id="609" x="359" y="64.1" class="st0" width="35" height="42.3"/>
                                            <rect seat id="610" x="401.3" y="64.1" class="st0" width="35" height="42.3"/>
                                            <rect seat id="611" x="445" y="64.1" class="st0" width="35" height="42.3"/>
                                            <rect seat id="707" x="274.5" y="14.6" class="st0" width="35" height="42.3"/>
                                            <rect seat id="708" x="316.7" y="14.6" class="st0" width="35" height="42.3"/>
                                            <rect seat id="709" x="359" y="14.6" class="st0" width="35" height="42.3"/>
                                            <rect seat id="710" x="401.3" y="14.6" class="st0" width="35" height="42.3"/>
                                            <rect seat id="711" x="445" y="14.6" class="st0" width="35" height="42.3"/>
                                        </g>
                                        <g seating-area="right" zoom-target="right">
                                            <rect seat id="111" x="491.5" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="112" x="533.7" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="113" x="576" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="114" x="618.3" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="115" x="662" y="311.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="211" x="491.5" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="212" x="533.7" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="213" x="576" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="214" x="618.3" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="215" x="662" y="262.4" class="st0" width="35" height="42.3"/>
                                            <rect seat id="312" x="491.5" y="212.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="313" x="533.7" y="212.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="314" x="576" y="212.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="315" x="618.3" y="212.9" class="st0" width="35" height="42.3"/>
                                            <rect seat id="316" x="662" y="212.9" class="st0" width="35" height="42.3"/>
                                        </g>
                                    </g>
                                </svg>            
                            </div>
                        </div>
                        <el-button v-on:click="goBack()">برگشت</el-button>
                        <el-button v-on:click="deselect()">deselect</el-button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="pictures">عمومی</label>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="col-8">
                                    <label for="full_price">قیمت کل صندلی‌ها</label>
                                    <input type="text" class="form-control" id="full_price">
                                </div>
                                <div class="col">
                                    <el-button type="primary" v-if="id" round>اعمال</el-button>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="full_price">فعال</label>
                                    <el-switch></el-switch>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <el-button type="primary" v-on:click="makeNew()" round>ثبت زمان</el-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="form-group" v-if="typeof id !== 'undefined'">
                <label for="pictures">صندلی</label>
                <div class="card">
                    <div class="card-body">
                        <small v-if="selected == 0">یک صندلی را انتخاب کنید</small>
                        <seat :seat="selectedSeat()" v-else>یکی انتخاب شده</seat>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { SelectionChangeEvent, SelectionChangeEventReason } from 'd3-seating-chart';
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
const moment = require('jalali-moment');
import seat from './Seat';

export default {
    props: {
        id: {
            type: Number,
            default: null,
            require: false
        },
        event_id: {
            type: Number,
            default: null,
            require: false
        }
    },
    data: function() {
        return{
            event_title: '',
            start: moment(),
            end: moment(),
            limit: moment(),
            d3sc: '',
            seats: []
        }
    },
    mounted: function() {
        const D3SeatingChart = require('d3-seating-chart/dist/d3SeatingChart.js').D3SeatingChart;
        this.d3sc = D3SeatingChart.attach(document.getElementById('x'));
        this.d3sc.registerSelectionChangeListener((e) => {
            console.log(e);              
            if (e.selection.length > 1) {
                this.d3sc.deselectAll();
                this.d3sc.selectedElements = [e.selection[1]];
                this.d3sc.select(e.selection[1], false);
            }
        });
        if (this.id !== null) {
            axios({url: `/api/eventtime/edit/${this.id}`, method: 'GET' })
            .then(resp => {
                this.event_title = resp.data.event_title;
                this.start = moment(resp.data.start);
                this.end = moment(resp.data.end);
                this.limit = moment(resp.data.deadline);
                axios({url: `/api/seat/eventtime/${this.id}`, method: 'GET' })
                .then(resp => {
                    this.seats = resp.data;
                })
                .catch(err => {
                    console.log('Error: can\'t get seat setting!', err)
                })
            })
            .catch(err => {
                console.log('Error: can\'t make a new event!', err)
            })
        }
        else
        {
            axios({url: `/api/event/title/${this.event_id}`, method: 'GET' })
            .then(resp => {
                this.event_title = resp.data.title;
                axios({url: `/api/seat/setting`, method: 'GET' })
                .then(resp => {
                    this.seats = resp.data;
                })
                .catch(err => {
                    console.log('Error: can\'t get seat setting!', err)
                })
            })
            .catch(err => {
                console.log('Error: can\'t make a new event!', err)
            })

        }

    },    
    components: {
        datePicker: VuePersianDatetimePicker,
        seat
    },
    methods: {
        moment: moment,
        goBack: function () {
            this.d3sc.goToBoard();
        },
        makeNew: function() {
            const {id, event_id, startModel, endModel, limitModel, seats} = this;
            if (id === null) {
                axios({url: '/api/eventtime/new', data: {event_id, start: startModel, end: endModel, limit: limitModel, enable: true, seats}, method: 'POST' })
                    .then(resp => {
                        window.location.href = `/admin/eventtime/${resp.data.id}`;
                    })
                    .catch(err => {
                        console.log('Error: can\'t make a new eventtime!', err)
                    })                                
            }
            else
            {
                axios({url: '/api/eventtime/update', data: {id, start: startModel, end: endModel, limit: limitModel, enable: true, seats}, method: 'PUT' })
                    .then(resp => {
                        window.location.href = `/admin/eventtime/${resp.data.id}`;
                    })
                    .catch(err => {
                        console.log('Error: can\'t update the eventtime!', err)
                    })                
            }
        },
        deselect: function() {
            this.d3sc.selectedElements = [];
            this.d3sc.deselectAll();
        },
        selectedSeat: function() {
            return this.seats.find( ({ number }) => number === this.selectedNumber);
        }
    },
    computed: {
        startModel: {
            set: function(val) {
                this.start = moment.from(val, 'fa', 'YYYY/MM/DD HH:mm');
            },
            get: function() {
                return this.start.locale('en').format('YYYY/MM/DD HH:mm');
            }
        },
        endModel: {
            set: function(val) {
                this.end = moment.from(val, 'fa', 'YYYY/MM/DD HH:mm');
            },
            get: function() {
                return this.end.locale('en').format('YYYY/MM/DD HH:mm');
            }
        },
        limitModel: {
            set: function(val) {
                this.limit = moment.from(val, 'fa', 'YYYY/MM/DD HH:mm');
            },
            get: function() {
                return this.limit.locale('en').format('YYYY/MM/DD HH:mm');
            }
        },
        selected: {
            get: function() {
                if(typeof this.d3sc.selectedElements !== 'undefined')
                    return this.d3sc.selectedElements.length;
                else
                    return 0;
            }
        },
        selectedNumber: {
            get: function() {
                if(typeof this.d3sc.selectedElements !== 'undefined')
                    return parseInt(this.d3sc.selectedElements[0].id);
                else
                    return 0;
            }
        }
    }
}
</script>

<style>

#x {
    width: 100%;
}

svg {
  border: none;
  display: block;
  margin: 0 auto;
}

[stage] {
  fill: #000;
}

[zoom-control] {
    fill: #888888;
}

[zoom-control] {
  cursor: pointer;
  fill: #566199;
}

[seat] {
  fill: #e0e0e0;
}

[seat][locked] {
  fill: #888888;
}

[seat][locked="reserved"] {
  fill: #00bfff;
}

[seat][selected] {
  fill: #ffe100;
}

[seat]:not([selected]):not([locked]):hover {
  fill: #ddd;
  cursor: pointer;
}

	.st3{fill:#FFFFFF;}
	.st4{font-family:'IRANSans';}
	.st5{font-size:20px;}
</style>