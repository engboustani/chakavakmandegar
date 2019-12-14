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
                            <td>{{ row.event_name }}</td>
                            <td>{{ farsiStart(row) }}</td>
                            <td>{{ farsiCreated(row) }}</td>
                            <td>پرداخت شده</td>
                            <td>
                                <el-button type="danger" icon="el-icon-close" v-on:click="deletee(row)" circle></el-button>
                                <form action="/printticket" method="post" style="display: unset;">
                                    <input type="hidden" name="id" :value="row.id">
                                    <el-button type="primary" icon="el-icon-printer" native-type="submit" circle></el-button>                                
                                </form>
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
            {label: 'عنوان نمایش', field: 'title', align: 'right'},
            {label: 'سانس', representedAs: this.showEvent, align: 'right'},
            {label: 'تاریخ خرید', representedAs: this.farsiDatetime, align: 'right'},
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
            axios.get('/api/ticket/listUser').then(function(response){
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
        farsiStart: function(row) {
            return this.constructor(moment(row.start).locale('fa').format('YYYY/M/D H:m'));
        },
        print(id) {
            window.location.href = `/printticket/${id}`;
        },
        deletee(row) {
            this.$confirm('آیا مطمئن هستید که میخواهید بلیت را استرداد کنید؟?', 'اخطار', {
                    confirmButtonText: 'بله',
                    cancelButtonText: 'بستن',
                    type: 'warning'
                }).then(() => {
                    axios({url: '/api/ticket/delete', data: {id: row.id}, method: 'DELETE' })
                        .then(resp => {
                            this.$message({
                                type: 'success',
                                message: 'با موفقیت استرداد شد'
                            });
                        })
                        .catch(err => {
                            this.$message({
                                type: 'error',
                                message: 'استرداد این بلیت امکان پذیر نمی‌باشد'
                            }); 
                        })                
                }).catch(() => {
         
                });
        }
    }
}
</script>

<style>
.table {
    background-color: #fff;
    border: #dee2e6 solid 1px;
}
</style>