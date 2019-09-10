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
                        <date-picker format="jYYYY/jMM/jDD" :min="moment().locale('fa').format('YYYY/M/D')" v-model="startDate" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="summery">زمان شروع</label>
                        <date-picker v-model="startTime" type="time" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="summery">تاریخ پایان</label>
                        <date-picker format="jYYYY/jMM/jDD" :min="startDate" v-model="endDate" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="summery">زمان پایان</label>
                        <date-picker v-model="endTime" type="time" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="summery">تاریخ مهلت</label>
                        <date-picker format="jYYYY/jMM/jDD" :max="startDate" v-model="limitDate" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="summery">زمان مهلت</label>
                        <date-picker v-model="limitTime" type="time" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <svg id="x" width="640" height="480" xmlns="http://www.w3.org/2000/svg">
                            <g board>
                                <rect stage x="92" y="370.3" width="465" height="94.7"/>
                                <rect stage x="309" y="15" class="st2" width="31" height="339"/>
                                <rect zoom-control="left" x="92" y="14.6" class="st1" width="205.5" height="339.6"/>
                                <rect zoom-control="right" x="351.5" y="14.6" class="st1" width="205.5" height="339.6"/>
                                <text transform="matrix(1 0 0 1 299.6465 417.6211)" class="st3 st4 st5">استیج</text>
                                <text zoom-control="right" transform="matrix(1 0 0 1 430.5332 184.6211)" class="st3 st4 st5">راست</text>
                                <text zoom-control="left" transform="matrix(1 0 0 1 178.5723 184.6211)" class="st3 st4 st5">چپ</text>
                                <g seating-area="left" zoom-target="left">
                                    <rect seat id="1" x="92" y="311.9" class="st0" width="35" height="42.3"/>
                                    <rect seat id="2" x="134.3" y="311.9" class="st0" width="35" height="42.3"/>
                                    <rect seat id="3" x="176.5" y="311.9" class="st0" width="35" height="42.3"/>
                                    <rect seat id="4" x="218.8" y="311.9" class="st0" width="35" height="42.3"/>
                                    <rect seat id="5" x="262.5" y="311.9" class="st0" width="35" height="42.3"/>
                                    <rect seat id="6" x="92" y="262.4" class="st0" width="35" height="42.3"/>
                                    <rect seat id="7" x="134.3" y="262.4" class="st0" width="35" height="42.3"/>
                                    <rect seat id="8" x="176.5" y="262.4" class="st0" width="35" height="42.3"/>
                                    <rect seat id="9" x="218.8" y="262.4" class="st0" width="35" height="42.3"/>
                                    <rect seat id="10" x="262.5" y="262.4" class="st0" width="35" height="42.3"/>
                                    <rect seat id="11" x="92" y="212.8" class="st0" width="35" height="42.3"/>
                                    <rect seat id="12" x="134.3" y="212.8" class="st0" width="35" height="42.3"/>
                                    <rect seat id="13" x="176.5" y="212.8" class="st0" width="35" height="42.3"/>
                                    <rect seat id="14" x="218.8" y="212.8" class="st0" width="35" height="42.3"/>
                                    <rect seat id="15" x="262.5" y="212.8" class="st0" width="35" height="42.3"/>
                                    <rect seat id="16" x="92" y="163.3" class="st0" width="35" height="42.3"/>
                                    <rect seat id="17" x="134.3" y="163.3" class="st0" width="35" height="42.3"/>
                                    <rect seat id="18" x="176.5" y="163.3" class="st0" width="35" height="42.3"/>
                                    <rect seat id="19" x="218.8" y="163.3" class="st0" width="35" height="42.3"/>
                                    <rect seat id="20" x="262.5" y="163.3" class="st0" width="35" height="42.3"/>
                                    <rect seat id="21" x="92" y="113.7" class="st0" width="35" height="42.3"/>
                                    <rect seat id="22" x="134.3" y="113.7" class="st0" width="35" height="42.3"/>
                                    <rect seat id="23" x="176.5" y="113.7" class="st0" width="35" height="42.3"/>
                                    <rect seat id="24" x="218.8" y="113.7" class="st0" width="35" height="42.3"/>
                                    <rect seat id="25" x="262.5" y="113.7" class="st0" width="35" height="42.3"/>
                                    <rect seat id="26" x="92" y="64.1" class="st0" width="35" height="42.3"/>
                                    <rect seat id="27" x="134.3" y="64.1" class="st0" width="35" height="42.3"/>
                                    <rect seat id="28" x="176.5" y="64.1" class="st0" width="35" height="42.3"/>
                                    <rect seat id="29" x="218.8" y="64.1" class="st0" width="35" height="42.3"/>
                                    <rect seat id="30" x="262.5" y="64.1" class="st0" width="35" height="42.3"/>
                                    <rect seat id="31" x="92" y="14.6" class="st0" width="35" height="42.3"/>
                                    <rect seat id="32" x="134.3" y="14.6" class="st0" width="35" height="42.3"/>
                                    <rect seat id="33" x="176.5" y="14.6" class="st0" width="35" height="42.3"/>
                                    <rect seat id="34" x="218.8" y="14.6" class="st0" width="35" height="42.3"/>
                                    <rect seat id="35" x="262.5" y="14.6" class="st0" width="35" height="42.3"/>
                                </g>
                                <g seating-area="right" zoom-target="right">
                                    <rect seat id="36" x="351.5" y="311.9" class="st0" width="35" height="42.3"/>
                                    <rect seat id="37" x="393.7" y="311.9" class="st0" width="35" height="42.3"/>
                                    <rect seat id="38" x="436" y="311.9" class="st0" width="35" height="42.3"/>
                                    <rect seat id="39" x="478.3" y="311.9" class="st0" width="35" height="42.3"/>
                                    <rect seat id="40" x="522" y="311.9" class="st0" width="35" height="42.3"/>
                                    <rect seat id="41" x="351.5" y="262.4" class="st0" width="35" height="42.3"/>
                                    <rect seat id="42" x="393.7" y="262.4" class="st0" width="35" height="42.3"/>
                                    <rect seat id="43" x="436" y="262.4" class="st0" width="35" height="42.3"/>
                                    <rect seat id="44" x="478.3" y="262.4" class="st0" width="35" height="42.3"/>
                                    <rect seat id="45" x="522" y="262.4" class="st0" width="35" height="42.3"/>
                                    <rect seat id="46" x="351.5" y="212.8" class="st0" width="35" height="42.3"/>
                                    <rect seat id="47" x="393.7" y="212.8" class="st0" width="35" height="42.3"/>
                                    <rect seat id="48" x="436" y="212.8" class="st0" width="35" height="42.3"/>
                                    <rect seat id="49" x="478.3" y="212.8" class="st0" width="35" height="42.3"/>
                                    <rect seat id="50" x="522" y="212.8" class="st0" width="35" height="42.3"/>
                                    <rect seat id="51" x="351.5" y="163.3" class="st0" width="35" height="42.3"/>
                                    <rect seat id="52" x="393.7" y="163.3" class="st0" width="35" height="42.3"/>
                                    <rect seat id="53" x="436" y="163.3" class="st0" width="35" height="42.3"/>
                                    <rect seat id="54" x="478.3" y="163.3" class="st0" width="35" height="42.3"/>
                                    <rect seat id="55" x="522" y="163.3" class="st0" width="35" height="42.3"/>
                                    <rect seat id="56" x="351.5" y="113.7" class="st0" width="35" height="42.3"/>
                                    <rect seat id="57" x="393.7" y="113.7" class="st0" width="35" height="42.3"/>
                                    <rect seat id="58" x="436" y="113.7" class="st0" width="35" height="42.3"/>
                                    <rect seat id="59" x="478.3" y="113.7" class="st0" width="35" height="42.3"/>
                                    <rect seat id="60" x="522" y="113.7" class="st0" width="35" height="42.3"/>
                                    <rect seat id="61" x="351.5" y="64.1" class="st0" width="35" height="42.3"/>
                                    <rect seat id="62" x="393.7" y="64.1" class="st0" width="35" height="42.3"/>
                                    <rect seat id="63" x="436" y="64.1" class="st0" width="35" height="42.3"/>
                                    <rect seat id="64" x="478.3" y="64.1" class="st0" width="35" height="42.3"/>
                                    <rect seat id="65" x="522" y="64.1" class="st0" width="35" height="42.3"/>
                                    <rect seat id="66" x="351.5" y="14.6" class="st0" width="35" height="42.3"/>
                                    <rect seat id="67" x="393.7" y="14.6" class="st0" width="35" height="42.3"/>
                                    <rect seat id="68" x="436" y="14.6" class="st0" width="35" height="42.3"/>
                                    <rect seat id="69" x="478.3" y="14.6" class="st0" width="35" height="42.3"/>
                                    <rect seat id="70" x="522" y="14.6" class="st0" width="35" height="42.3"/>
                                </g>
                            </g>
                        </svg>
                        <el-button v-on:click="goBack()">برگشت</el-button>
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
                                    <el-button type="primary" round>اعمال</el-button>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="full_price">فعال</label>
                                    <el-switch></el-switch>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pictures">صندلی</label>
                <div class="card">
                    <div class="card-body">
                        <small>یک صندلی را انتخاب کنید</small>
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

export default {
    props: {
        id: Number
    },
    data: function() {
        return{
            event_title: '',
            startDate: '',
            startTime: '',
            endDate: '',
            endTime: '',
            limitDate: '',
            limitTime: '',
            d3sc: '',
        }
    },
    mounted: function() {
        const D3SeatingChart = require('d3-seating-chart/dist/d3SeatingChart.js').D3SeatingChart;
        this.d3sc = D3SeatingChart.attach(document.getElementById('x'));
        this.d3sc.registerSelectionChangeListener((e) => {
            if (e.selection.length > 1) {
                this.d3sc.deselect(e.selection[0]);
                this.d3sc.select(e.selection[1], false);
                console.log(e.selection); // All current selections               
            }
        });
        if (this.id != 0) {
            axios({url: `/api/eventtime/${this.id}`, method: 'GET' })
            .then(resp => {
                this.event_title = resp.data.event_title;
                this.startDate = moment(resp.data.start).locale('fa').format('YYYY/MM/DD');
                this.startTime = moment(resp.data.start).locale('fa').format('HH:mm');
                this.endDate = moment(resp.data.end).locale('fa').format('YYYY/MM/DD');
                this.endTime = moment(resp.data.end).locale('fa').format('HH:mm');
                this.limitDate = moment(resp.data.deadline).locale('fa').format('YYYY/MM/DD');
                this.limitTime = moment(resp.data.deadline).locale('fa').format('HH:mm');
            })
            .catch(err => {
                console.log('Error: can\'t make a new event!', err)
            })
        }

    },    
    components: {
        datePicker: VuePersianDatetimePicker,

    },
    methods: {
        moment: moment,
        goBack: function () {
            this.d3sc.goToBoard();
        },
    }
}
</script>

<style>

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