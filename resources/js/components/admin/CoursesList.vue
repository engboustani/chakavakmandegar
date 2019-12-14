<template>
    <div id="vue-root">
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
                            <td>{{ row.title }}</td>
                            <td>{{ row.teacher == '' ? 'نام مشخص' : row.teacher }}</td>
                            <td>{{ `${row.count_users} از ${row.limit_count}` }}</td>
                            <td>{{ farsiTime(row.limit_time) }}</td>
                            <td>
                                <el-button type="danger" icon="el-icon-delete" v-on:click="deletee(row)" circle></el-button>
                                <el-button type="primary" icon="el-icon-edit" v-on:click="edit(row.id)" circle></el-button>
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
</template>

<script>
const moment = require('jalali-moment');
import shared from '../../shared';

export default {
    data: function () { return {
        columns: [
            {label: 'شناسه', field: 'id', align: 'right'},
            {label: 'نام ورک‌شاپ', field: 'title', align: 'right'},
            {label: 'برگذار کننده', field: 'eventtime_count', align: 'right'},
            {label: 'تعداد ثبت‌نامی‌ها', field: 'count_users', align: 'right'},
            {label: 'مهلت ثبت‌نام', field: 'limit_time', align: 'right'},
            {label: '', field: '', align: 'right', sortable: false },
        ],
        rows: window.rows,
        page: 1,
        per_page: 10,
        filter: '',
    }},
    methods: {
        getData: function(params, setRowData){
            axios.get('/api/course/list').then(function(response){
                var start_index = (params.page_number - 1) * params.page_length;
                var end_index = start_index + params.page_length;

                setRowData(
                    response.data.slice(start_index, end_index),
                    response.data.length
                );
            }.bind(this));
        },
        constructor: shared.constructor,
        edit(id) {
            window.location.href = `/admin/course/${id}`;
        },
        deletee(row) {
            this.$confirm('آیا مطمئن هستید که میخواهید ورک‌شاپ را حذف کنید؟', 'اخطار', {
                    confirmButtonText: 'بله',
                    cancelButtonText: 'بستن',
                    type: 'warning'
                }).then(() => {
                    axios({url: '/api/event/delete', data: {id: row.id}, method: 'DELETE' })
                        .then(resp => {
                            this.$message({
                                type: 'success',
                                message: 'با موفقیت حذف شد'
                            });
                        })
                        .catch(err => {
                            this.$message({
                                type: 'error',
                                message: 'حذف این ورک‌شاپ الان امکان پذیر نمی‌باشد'
                            }); 
                            console.log('Error: can\'t delete event!', err)
                        })                
                }).catch(() => {
         
                });
        },
        farsiTime(datetime) {
            return this.constructor(moment(datetime).locale('fa').format('YYYY/M/D H:m'));
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