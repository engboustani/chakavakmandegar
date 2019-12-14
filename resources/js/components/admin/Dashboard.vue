<template>
    <div class="main-content container-fluid">
        <div class="row">
          <div class="col-xs-12 col-md-6 col-lg-3">
                      <div class="widget widget-tile">
                        <div class="chart sparkline"><i class="el-icon-user"></i></div>
                        <div class="data-info">
                          <div class="desc">کاربران</div>
                          <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span data-toggle="counter" data-end="113" class="number">{{constructor(user_count)}}</span>
                          </div>
                        </div>
                      </div>
          </div>
          <div class="col-xs-12 col-md-6 col-lg-3">
                      <div class="widget widget-tile">
                        <div id="spark2" class="chart sparkline"><i class="el-icon-shopping-cart-1"></i></div>
                        <div class="data-info">
                          <div class="desc">فروش <small>(ماهیانه)</small></div>
                          <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end="80" data-suffix="%" class="number">{{constructor(payment.sum)}}</span>
                          </div>
                        </div>
                      </div>
          </div>
          <div class="col-xs-12 col-md-6 col-lg-3">
                      <div class="widget widget-tile">
                        <div id="spark3" class="chart sparkline"><i class="el-icon-location-outline"></i></div>
                        <div class="data-info">
                          <div class="desc">ایونت‌های فعال</div>
                          <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end="532" class="number">{{constructor(event_count)}}</span>
                          </div>
                        </div>
                      </div>
          </div>
          <div class="col-xs-12 col-md-6 col-lg-3">
                      <div class="widget widget-tile">
                        <div id="spark4" class="chart sparkline"></div>
                        <div class="data-info">
                          <div class="desc">تیکت‌های فرخته‌شده <small>(ماهیانه)</small></div>
                          <div class="value"><span class="indicator indicator-negative mdi mdi-chevron-down"></span><span data-toggle="counter" data-end="113" class="number">{{constructor(ticket_count)}}</span>
                          </div>
                        </div>
                      </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="widget widget-fullwidth be-loading" style="height: 320px;">
                <dashboardChart :chartData="datacollection" :styles="{height: '300px'}" :height="100"></dashboardChart>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default panel-table">
              <div class="panel-heading"> 
                <div class="tools"><i class="el-icon-more"></i></div>
                <div class="title">پرداختی‌ها <i class="el-icon-refresh" v-on:click="getLatestPayment"></i></div>
              </div>
              <div class="panel-body table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th style="width:30%;">کاربر</th>
                      <th class="number">میزان <small>تومان</small></th>
                      <th style="width:20%;">زمان</th>
                      <th style="width:20%;">وضعیت</th>
                      <th style="width:5%;" class="actions"></th>
                    </tr>
                  </thead>
                  <tbody class="no-border-x">
                    <tr v-for="payment in payments" v-bind:key="payment.id">
                      <td>{{payment.username}}</td>
                      <td class="number">{{constructor(payment.amount)}}</td>
                      <td>{{constructor(moment(payment.created_at).locale('fa').format('YYYY/M/D HH:mm'))}}</td>
                      <td class="text">{{ payment.verified ? 'موفق' : 'ناموفق'}}</td>
                      <td class="actions"><a :href="`/admin/payment/${payment.id}`" class="icon"><i class="el-icon-more"></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
                <div class="title">تراکنش‌ها <i class="el-icon-refresh" v-on:click="getLatestCharge"></i></div>
              </div>
              <div class="panel-body table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width:30%;">کاربر</th>
                      <th style="width:20%;">میزان</th>
                      <th>زمان</th>
                      <th class="actions"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="charge in charges" v-bind:key="charge.id">
                      <td class="user-avatar">{{charge.username}}</td>
                      <td class="amount" v-bind:class="[{withdraw: charge.amount < 0},{deposit: charge.amount > 0}]">{{constructor(charge.amount)}}</td>
                      <td>{{constructor(moment(charge.created_at).locale('fa').format('YYYY/M/D HH:mm'))}}</td>
                      <td class="actions"><a :href="`/admin/charge/${charge.id}`" class="icon"><i class="el-icon-more"></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</template>

<script>
import dashboardChart from './chart/dashboardChart';
const moment = require('jalali-moment');
import shared from '../../shared';


export default {
    components: {
        dashboardChart
    },
    data () {
      return {
        datacollection: {
          datasets: [{
            label: 'ورودی روزانه (ماه اخیر)',
            backgroundColor: '#1976D27A',
            borderColor: '#1976D2',
            type: 'bar',
            pointRadius: 0,
            fill: false,
            lineTension: 0,
            borderWidth: 2
          }]
        },
        payments: [],
        charges: [],
        listLastMonthPayments: [],
        prosData: [],
        user_count: 0,
        payment: {},
        event_count: 0,
        ticket_count: 0,
      }
    },
    mounted () {
      debugger;
      this.dashboardInfo();
      this.getLatestPayment();
      this.getLatestCharge();
      this.getLastMonthPayments();
    },
    methods: {
      fillData() {
        this.prosData = [];
        this.listLastMonthPayments.forEach(element => {
          this.prosData.push({t: moment(element.date).valueOf(), y: element.sum});
        });
        this.datacollection = {
          datasets: [{
            label: 'ورودی روزانه (ماه اخیر)',
            backgroundColor: '#1976D27A',
            borderColor: '#1976D2',
            data: this.prosData,
            type: 'bar',
            pointRadius: 0,
            fill: false,
            lineTension: 0,
            borderWidth: 2
          }]
        }
      },
      dashboardInfo () {
        axios({url: '/api/dashboard/dashboardInfo', method: 'GET' })
        .then(resp => {
          this.user_count = resp.data.user_count;
          this.payment = resp.data.payment;
          this.event_count = resp.data.event_count;
          this.ticket_count = resp.data.ticket_count;
        })
        .catch(err => {
          console.log(`Error: cant get latest payments ${err}`);
        })
      },
      getRandomInt () {
        return Math.floor(Math.random() * (50 - 5 + 1)) + 5
      },
      getLatestPayment() {
        axios({url: '/api/payment/getLatest', method: 'GET' })
        .then(resp => {
          this.payments = resp.data;
        })
        .catch(err => {
          console.log(`Error: cant get latest payments ${err}`);
        })
      },
      getLatestCharge() {
        axios({url: '/api/charge/getLatest', method: 'GET' })
        .then(resp => {
          this.charges = resp.data;
        })
        .catch(err => {
          console.log(`Error: cant get latest payments ${err}`);
        })
      },
      getLastMonthPayments() {
        axios({url: '/api/dashboard/listLastMonthPayments', method: 'GET' })
        .then(resp => {
          this.listLastMonthPayments = resp.data;
          if (resp.data.lenght > 0) {
            console.log('fill');
            this.fillData();
          }
        })
        .catch(err => {
          console.log(`Error: cant get latest payments ${err}`);
        })
      },
      moment: moment,
      constructor: shared.constructor
    }
  }
</script>

<style>
.panel-heading {
  padding-top: 10px;
}

.amount {
  direction: ltr;
  text-align: right;
}

.withdraw {
  color: #B71C1C;
}

.deposit {
  color: #43A047;
}
</style>