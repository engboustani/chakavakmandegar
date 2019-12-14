<template>
    <div id="vue-root" v-if="this.$store.getters.isAuthenticated">
        <div class="row">
            <div class="col-xs-12 form-inline">
                <div class="form-group">
                    <label for="filter" class="sr-only">فیلتر</label>
                    <input type="text" class="form-control" v-model="filter" placeholder="فیلتر">
                </div>
            </div>
        </div>

        <div class="row">
            <div id="table" class="col-xs-12 table-responsive">
                <datatable :columns="columns" :data="getData" :filter-by="filter">
                    <template slot-scope="{ row }">
                        <tr>
                            <td>{{ row.id }}</td>
                            <td>{{ row.amount }}</td>
                            <td>{{ farsiCreated(row) }}</td>
                            <td>پرداخت شده</td>
                            <td>
                                <el-tooltip class="item" effect="dark" :content="row.description" placement="top-start">
                                <i class="el-icon-info" style="font-size: 1.5rem;"></i>
                                </el-tooltip>
                            </td>
                        </tr>
                    </template>
                </datatable>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 form-inline">
                <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
            </div>
        </div>
    </div>
    <div v-else>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">خطا!</h4>
            <p>ابتدا باید وارد حساب خود شوید</p>
        </div>
    </div>
</template>

<script>
const moment = require('jalali-moment');
import shared from '../shared';

export default {
    data: function () { return {
        columns: [
            {label: 'شناسه', field: 'id', align: 'right'},
            {label: 'مبلغ', field: 'title', align: 'right'},
            {label: 'تاریخ' , representedAs: this.showEvent, align: 'right'},
            {label: 'وضعیت', representedAs: this.farsiUpdate, align: 'right'},
            {label: '', field: '', sortable: false },
        ],
        rows: window.rows,
        page: 1,
        per_page: 10,
        filter: '',
    }},
    methods: {
        getData: function(params, setRowData){
            axios.get('/api/payment/listUser').then(function(response){
                var start_index = (params.page_number - 1) * params.page_length;
                var end_index = start_index + params.page_length;

                setRowData(
                    response.data.slice(start_index, end_index),
                    response.data.length
                );
            }.bind(this));
        },
        constructor: shared.constructor,
        farsiCreated: function(row) {
            return this.constructor(moment(row.created_at).locale('fa').format('YYYY/M/D H:m'));
        },
        farsiVerify: function(row) {
            return this.constructor(moment(row.verified_at).locale('fa').format('YYYY/M/D H:m'));
        },
    }
}
</script>

<style>
.table {
    background-color: #fff;
    border: #dee2e6 solid 1px;
}
</style>