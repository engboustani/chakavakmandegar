<template>
  <div class="row">
    <div class="col-12">
      <h5>{{title}} در تاریخ {{startDate}} سانس ساعت {{startTime}}</h5>
    </div>
    <div class="col-12">
      <el-progress :percentage="timeShop" :format="formatProgress"></el-progress>
    </div>
    <div class="col-12 text-xs-center">
      <svg version="1.1" id="x" width="710" height="480">
        <g board>
          <rect x="15" y="370.3" width="682" height="94.7" />
          <text transform="matrix(1 0 0 1 355.0001 417.6496)" class="st1 st2 st3">صحنه</text>
          <rect zoom-control="left" x="15" y="14.6" class="st4" width="250" height="339.6" />
          <text
            zoom-control="left"
            transform="matrix(1 0 0 1 141.8001 184.4502)"
            class="st1 st2 st3"
          >چپ</text>
          <rect zoom-control="center" x="274.5" y="14.6" class="st4" width="205.5" height="339.6" />
          <text
            zoom-control="center"
            transform="matrix(1 0 0 1 376.4998 184.4)"
            class="st1 st2 st3"
          >مرکز</text>
          <rect zoom-control="right" x="491.5" y="212.9" class="st4" width="205.5" height="141.4" />
          <text
            zoom-control="right"
            transform="matrix(1 0 0 1 593.4998 283.6001)"
            class="st1 st2 st3"
          >راست</text>
          <g seating-area="left" zoom-target="left">
            <rect seat id="101" x="57.3" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="102" x="99.5" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="103" x="141.8" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="104" x="185.5" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="105" x="230" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="201" x="57.3" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="202" x="99.5" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="203" x="141.8" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="204" x="185.5" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="205" x="230" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="301" x="15" y="212.8" class="st0" width="35" height="42.3" />
            <rect seat id="302" x="57.3" y="212.8" class="st0" width="35" height="42.3" />
            <rect seat id="303" x="99.5" y="212.8" class="st0" width="35" height="42.3" />
            <rect seat id="304" x="141.8" y="212.8" class="st0" width="35" height="42.3" />
            <rect seat id="305" x="185.5" y="212.8" class="st0" width="35" height="42.3" />
            <rect seat id="306" x="230" y="212.8" class="st0" width="35" height="42.3" />
            <rect seat id="401" x="15" y="163.3" class="st0" width="35" height="42.3" />
            <rect seat id="402" x="57.3" y="163.3" class="st0" width="35" height="42.3" />
            <rect seat id="403" x="99.5" y="163.3" class="st0" width="35" height="42.3" />
            <rect seat id="404" x="141.8" y="163.3" class="st0" width="35" height="42.3" />
            <rect seat id="405" x="185.5" y="163.3" class="st0" width="35" height="42.3" />
            <rect seat id="406" x="230" y="163.3" class="st0" width="35" height="42.3" />
            <rect seat id="501" x="15" y="113.7" class="st0" width="35" height="42.3" />
            <rect seat id="502" x="57.3" y="113.7" class="st0" width="35" height="42.3" />
            <rect seat id="503" x="99.5" y="113.7" class="st0" width="35" height="42.3" />
            <rect seat id="504" x="141.8" y="113.7" class="st0" width="35" height="42.3" />
            <rect seat id="505" x="185.5" y="113.7" class="st0" width="35" height="42.3" />
            <rect seat id="506" x="230" y="113.7" class="st0" width="35" height="42.3" />
            <rect seat id="601" x="15" y="64.1" class="st0" width="35" height="42.3" />
            <rect seat id="602" x="57.3" y="64.1" class="st0" width="35" height="42.3" />
            <rect seat id="603" x="99.5" y="64.1" class="st0" width="35" height="42.3" />
            <rect seat id="604" x="141.8" y="64.1" class="st0" width="35" height="42.3" />
            <rect seat id="605" x="185.5" y="64.1" class="st0" width="35" height="42.3" />
            <rect seat id="606" x="230" y="64.1" class="st0" width="35" height="42.3" />
            <rect seat id="701" x="15" y="14.6" class="st0" width="35" height="42.3" />
            <rect seat id="702" x="57.3" y="14.6" class="st0" width="35" height="42.3" />
            <rect seat id="703" x="99.5" y="14.6" class="st0" width="35" height="42.3" />
            <rect seat id="704" x="141.8" y="14.6" class="st0" width="35" height="42.3" />
            <rect seat id="705" x="185.5" y="14.6" class="st0" width="35" height="42.3" />
            <rect seat id="706" x="230" y="14.6" class="st0" width="35" height="42.3" />
          </g>
          <g seating-area="center" zoom-target="center">
            <rect seat id="106" x="274.5" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="107" x="316.7" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="108" x="359" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="109" x="401.3" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="110" x="445" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="206" x="274.5" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="207" x="316.7" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="208" x="359" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="209" x="401.3" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="210" x="445" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="307" x="274.5" y="212.8" class="st0" width="35" height="42.3" />
            <rect seat id="308" x="316.7" y="212.8" class="st0" width="35" height="42.3" />
            <rect seat id="309" x="359" y="212.8" class="st0" width="35" height="42.3" />
            <rect seat id="310" x="401.3" y="212.8" class="st0" width="35" height="42.3" />
            <rect seat id="311" x="445" y="212.8" class="st0" width="35" height="42.3" />
            <rect seat id="407" x="274.5" y="163.3" class="st0" width="35" height="42.3" />
            <rect seat id="408" x="316.7" y="163.3" class="st0" width="35" height="42.3" />
            <rect seat id="409" x="359" y="163.3" class="st0" width="35" height="42.3" />
            <rect seat id="410" x="401.3" y="163.3" class="st0" width="35" height="42.3" />
            <rect seat id="411" x="445" y="163.3" class="st0" width="35" height="42.3" />
            <rect seat id="507" x="274.5" y="113.7" class="st0" width="35" height="42.3" />
            <rect seat id="508" x="316.7" y="113.7" class="st0" width="35" height="42.3" />
            <rect seat id="509" x="359" y="113.7" class="st0" width="35" height="42.3" />
            <rect seat id="510" x="401.3" y="113.7" class="st0" width="35" height="42.3" />
            <rect seat id="511" x="445" y="113.7" class="st0" width="35" height="42.3" />
            <rect seat id="607" x="274.5" y="64.1" class="st0" width="35" height="42.3" />
            <rect seat id="608" x="316.7" y="64.1" class="st0" width="35" height="42.3" />
            <rect seat id="609" x="359" y="64.1" class="st0" width="35" height="42.3" />
            <rect seat id="610" x="401.3" y="64.1" class="st0" width="35" height="42.3" />
            <rect seat id="611" x="445" y="64.1" class="st0" width="35" height="42.3" />
            <rect seat id="707" x="274.5" y="14.6" class="st0" width="35" height="42.3" />
            <rect seat id="708" x="316.7" y="14.6" class="st0" width="35" height="42.3" />
            <rect seat id="709" x="359" y="14.6" class="st0" width="35" height="42.3" />
            <rect seat id="710" x="401.3" y="14.6" class="st0" width="35" height="42.3" />
            <rect seat id="711" x="445" y="14.6" class="st0" width="35" height="42.3" />
          </g>
          <g seating-area="right" zoom-target="right">
            <rect seat id="111" x="491.5" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="112" x="533.7" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="113" x="576" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="114" x="618.3" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="115" x="662" y="311.9" class="st0" width="35" height="42.3" />
            <rect seat id="211" x="491.5" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="212" x="533.7" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="213" x="576" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="214" x="618.3" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="215" x="662" y="262.4" class="st0" width="35" height="42.3" />
            <rect seat id="312" x="491.5" y="212.9" class="st0" width="35" height="42.3" />
            <rect seat id="313" x="533.7" y="212.9" class="st0" width="35" height="42.3" />
            <rect seat id="314" x="576" y="212.9" class="st0" width="35" height="42.3" />
            <rect seat id="315" x="618.3" y="212.9" class="st0" width="35" height="42.3" />
            <rect seat id="316" x="662" y="212.9" class="st0" width="35" height="42.3" />
          </g>
        </g>
      </svg>
    </div>
    <div class="col-12 text-xs-center">
      <el-button v-on:click="goBack()">برگشت</el-button>
    </div>
    <div class="col-12">
      <h3 class="my-3">
        <i class="el-icon-s-fold mr-2"></i>لیست بلیت‌ها
      </h3>
      <div class="row">
        <Ticket
          v-for="ticket in listTickets"
          :key="ticket.id"
          :ticket="ticket"
          :eventtime_id="eventtime_id"
        ></Ticket>
        <div class="col-12" v-if="listTickets.length == 0">
          <div class="card bg-light mb-3">
            <div class="card-body">مکانی انتخاب نشده است.</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12" v-if="!authenticated">
      <h3 class="my-3">
        <i class="el-icon-user mr-2"></i>مشخصات
      </h3>
      <div class="row">
        <div class="col-12">
          <div class="card bg-light mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 mb-2">
                  <div class="form-group" :class="{ 'form-group--error': $v.firstname.$error }">
                    <label for="firstname">نام</label>
                    <input
                      type="text"
                      class="form-control"
                      id="firstnameTicket"
                      v-model="firstnameTicket"
                      placeholder="First name"
                      v-model.trim="$v.firstname.$model"
                      required
                    />
                  </div>
                  <div class="error" v-if="!$v.firstname.required">باید کامل شود</div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group" :class="{ 'form-group--error': $v.lastname.$error }">
                    <label for="lastname">نام خانوادگی</label>
                    <input
                      type="text"
                      class="form-control"
                      id="lastnameTicket"
                      v-model="lastnameTicket"
                      placeholder="Last name"
                      v-model.trim="$v.lastname.$model"
                      required
                    />
                  </div>
                  <div class="error" v-if="!$v.lastname.required">باید کامل شود</div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group" :class="{ 'form-group--error': $v.iranid.$error }">
                    <label for="iranid">کد ملی</label>
                    <input
                      type="text"
                      class="form-control"
                      id="iranidTicket"
                      v-model="iranidTicket"
                      placeholder="Identification"
                      v-model.trim="$v.iranid.$model"
                      required
                    />
                  </div>
                  <div class="error" v-if="!$v.iranid.required">باید کامل شود</div>
                </div>
                <div class="col-md-6 mb-2">
                  <div class="form-group" :class="{ 'form-group--error': $v.phone.$error }">
                    <label for="phone">شماره همراه</label>
                    <input
                      type="text"
                      class="form-control"
                      id="phoneTicket"
                      v-model="phoneTicket"
                      placeholder="09xxxxxxxxx"
                      v-model.trim="$v.phone.$model"
                      required
                    />
                  </div>
                  <div class="error" v-if="!$v.phone.required">باید کامل شود</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12" v-if="listTickets.length > 0">
      <h3 class="my-3">
        <i class="el-icon-s-finance mr-2"></i>پرداخت
      </h3>
      <div class="row">
        <div class="col-md-12">
          <div class="card bg-light mb-3">
            <div class="card-header">
              <h5>
                <i class="el-icon-s-claim mr-2"></i>فاکتور
              </h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="row">
                  <div class="col-md-6">{{constructor(listTickets.length)}}x بلیت</div>
                  <div class="col-md-6 text-right">{{ constructor(sumPrice) }} تومان</div>
                </div>
              </li>
              <li class="list-group-item disabled" aria-disabled="true">
                <div class="row">
                  <div
                    class="col-md-6"
                  >تخفیف {{ discountPer > 0.0 ? `(${constructor(discountPer)} درصد)` : '' }}</div>
                  <div class="col-md-6 text-right">{{constructor(discountValue)}} تومان</div>
                </div>
              </li>
            </ul>
            <div class="card-footer">
              <h6>مجموع: {{constructor(totalPrice)}} تومان</h6>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-light mb-3">
            <div class="card-header">
              <h5>تخفیف</h5>
            </div>
            <div class="card-body" v-if="authenticated">
              <form>
                <div class="form-group">
                  <label for="discountCode">کد تخفیف</label>
                  <input
                    type="text"
                    class="form-control"
                    id="discountCode"
                    v-model="discountCode"
                    :disabled="discountDisabled"
                  />
                </div>
                <el-button class="float-right" v-on:click="checkFactor()">اعمال</el-button>
              </form>
            </div>
            <div class="card-body" v-else>
              <small>برای استفاده از کد تخفیف باید وارد شوید یا درصورت نداشتن حساب‌کاربری ثبت نام فرمایید</small>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-light mb-3">
            <div class="card-header">
              <h5>پرداخت</h5>
            </div>
            <div class="card-body">
              <h6 class="pb-1">مبلغ فاکتور: {{ constructor(totalPrice) }} تومان</h6>
              <h6 class="pb-1">اعتبار شما: {{ constructor(credit) }} تومان</h6>
              <h5 class="pb-1">مبلغ قابل پرداخت: {{ constructor(totalPrice - credit) }} تومان</h5>
              <el-button
                class="float-right"
                type="primary"
                v-on:click="payFactor()"
                :loading="loadingPay"
                :disabled="disabledPay"
              >پرداخت</el-button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {
  SelectionChangeEvent,
  SelectionChangeEventReason
} from "d3-seating-chart";
import Ticket from "./Ticket";
import shared from "../shared";
const moment = require("jalali-moment");
import { validationMixin } from "vuelidate";
const { required } = require("vuelidate/lib/validators");

export default {
  props: {
    eventtime_id: Number
  },
  components: {
    Ticket
  },
  data: function() {
    return {
      d3sc: 0,
      timeShop: 0,
      time: "",
      listTickets: [],
      sumPrice: 0,
      discountPer: 0.0,
      discountValue: 0,
      totalPrice: 0,
      title: "",
      start: moment(),
      discountCode: "",
      discountDisabled: false,
      discountLock: false,
      loadingPay: false,
      disabledPay: false,
      firstnameTicket: "",
      lastnameTicket: "",
      iranidTicket: "",
      phoneTicket: ""
    };
  },
  mounted: function() {
    const D3SeatingChart = require("d3-seating-chart/dist/d3SeatingChart.js")
      .D3SeatingChart;

    axios({ url: `/api/eventtime/info/${this.eventtime_id}`, method: "GET" })
      .then(resp => {
        this.title = resp.data.title;
        this.start = moment(resp.data.start);
      })
      .catch(err => {
        console.log("Error: can't get eventtime information!", err);
      });

    this.d3sc = D3SeatingChart.attach(document.getElementById("x"));

    axios({ url: `/api/shop/seats/${this.eventtime_id}`, method: "GET" })
      .then(resp => {
        resp.data.reserved.forEach(element => {
          this.d3sc.lock(`[id="${element}"]`);
        });
      })
      .catch(err => {
        console.log("Error: can't get seats!", err);
      });

    this.d3sc.registerSelectionChangeListener(e => {
      console.log(e.selection); // All current selections
      this.checkFactor();

      if (e.reason === SelectionChangeEventReason.SelectionChanged) {
        console.log("number of selected seats: " + e.selection.length);
      } else if (e.reason === SelectionChangeEventReason.LockOverride) {
        alert("Some of the seats you had selected are now taken.");
      }
    });
  },
  created: function() {
    this.incrementShopTime();
    this.timer = setInterval(this.incrementShopTime, 1000);
  },
  methods: {
    checkFactor: function() {
      if (!this.authenticated) {
        axios({
          url: "/api/shop/factor-not-user",
          data: {
            seats: this.listSelectedSeats,
            eventtime_id: this.eventtime_id
          },
          method: "POST"
        })
          .then(resp => {
            this.listTickets = resp.data.seats;
            this.sumPrice = resp.data.sum;
            this.totalPrice = resp.data.total;
          })
          .catch(err => {
            console.log("Error: can't get factor!", err);
          });
      } else {
        axios({
          url: "/api/shop/factor",
          data: {
            seats: this.listSelectedSeats,
            eventtime_id: this.eventtime_id,
            discount_code: this.discountCode
          },
          method: "POST"
        })
          .then(resp => {
            this.listTickets = resp.data.seats;
            this.sumPrice = resp.data.sum;
            this.discountPer = resp.data.discount_per;
            this.discountValue = resp.data.discount_value;
            this.totalPrice = resp.data.total;
            switch (resp.data.discount_status) {
              case -1:
                this.$notify.error({
                  title: "خطا",
                  message: "کد تخفیف اشتباه است"
                });
                this.discountCode = "";
                break;
              case -2:
                this.$notify.error({
                  title: "خطا",
                  message: "کد تخفیف قبلا استفاده شده"
                });
                this.discountCode = "";
                break;
              case -3:
                this.$notify.error({
                  title: "خطا",
                  message: "کد تخفیف دیگر معتبر نیست"
                });
                this.discountCode = "";
                break;
              case 1:
                this.$notify({
                  title: "موفق",
                  message: "کد تخفیف اعمال شد",
                  type: "success"
                });
                this.discountDisabled = true;
                break;
              default:
                break;
            }
          })
          .catch(err => {
            console.log("Error: can't get factor!", err);
          });
      }
    },
    payFactor: function() {
      this.loadingPay = true;
      var user = {};
      if (!this.authenticated) {
        user = {
          firstname: this.firstnameTicket,
          lastname: this.lastnameTicket,
          iranid: this.iranidTicket,
          phone: this.phoneTicket
        };
        axios({
          url: "/api/shop/make-not-user",
          data: { tickets: this.listTickets, user: user },
          method: "POST"
        })
          .then(resp => {
            this.loadingPay = false;
            this.disabledPay = true;

            window.location.href = `/payfactor/${resp.data.factor_id}`;
          })
          .catch(err => {
            console.log("Error: can't send factor to pay!", err);
          });
      } else {
        axios({
          url: "/api/shop/make",
          data: { tickets: this.listTickets, discount_code: this.discountCode },
          method: "POST"
        })
          .then(resp => {
            this.loadingPay = false;
            this.disabledPay = true;

            window.location.href = `/payfactor/${resp.data.factor_id}`;
          })
          .catch(err => {
            console.log("Error: can't send factor to pay!", err);
          });
      }
    },
    goBack: function() {
      this.d3sc.goToBoard();
    },
    incrementShopTime() {
      if (this.timeShop >= 100) {
        this.$alert(
          "با عرض پوزش زمان شما برای خرید به اتمام رسید. یا تایید دوباره برای خرید اقدام کنید.",
          "پایان زمان",
          {
            confirmButtonText: "تایید",
            type: "error",
            callback: action => {
              clearInterval(this.timer);
              window.location.reload(false);
            }
          }
        );
      } else this.timeShop++;
    },
    constructor: shared.constructor,
    purchaesButton: function() {
      axios({ url: "/api/payment/payir", method: "POST" })
        .then(resp => {
          window.location.href = resp.data.payir_url;
        })
        .catch(err => {
          console.log(err);
        });
    },
    formatProgress(percentage) {
      return `${100 - percentage} ثانیه باقی مانده `;
    }
  },
  computed: {
    startDate: {
      get: function() {
        return this.constructor(this.start.locale("fa").format("dddd D MMMM"));
      }
    },
    startTime: {
      get: function() {
        return this.constructor(this.start.locale("fa").format("HH:mm"));
      }
    },
    credit: {
      get: function() {
        return this.$store.state.credit;
      }
    },
    listSelectedSeats: {
      get: function() {
        var r = [];
        this.d3sc.selectedElements.forEach(element => {
          r.push(parseInt(element.id));
        });
        return r;
      }
    },
    authenticated: {
      get: function() {
        return this.$store.getters.isAuthenticated;
      }
    }
  },
  validations: {
    firstname: {
      required,
    },
    lastname: {
      required,
    },
    iranid: {
      required,
    },
    phone: {
      required,
    },
  }
};
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
  fill: #efefef;
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

.st3 {
  fill: #ffffff;
}
.st4 {
  font-family: "IRANSans";
}
.st5 {
  font-size: 20px;
}
</style>