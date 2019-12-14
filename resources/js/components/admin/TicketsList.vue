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
                            <td>#{{ row.id }}</td>
                            <td>{{ row.name }}</td>
                            <td>{{ row.title }}</td>
                            <td>{{ farsiDatetime(row) }}</td>
                            <td>{{ row.seat }}</td>
                            <td>
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
            {label: 'نام خریدار', field: 'name', align: 'right'},
            {label: 'نمایش', field: 'title', align: 'right'},
            {label: 'سانس', field: 'time', align: 'center'},
            {label: 'صندلی', field: 'seat', align: 'center'},
            {label: '', field: '', sortable: false },
        ],
        rows: window.rows,
        page: 1,
        per_page: 10,
        filter: '',
    }},
    methods: {
        getData: function(params, setRowData){
            axios.get('/api/ticket/list').then(function(response){
                var start_index = (params.page_number - 1) * params.page_length;
                var end_index = start_index + params.page_length;

                setRowData(
                    response.data.slice(start_index, end_index),
                    response.data.length
                );
            }.bind(this));
        },
        constructor: shared.constructor,
        farsiDatetime: function(row) {
            return this.constructor(moment(row.time).locale('fa').format('YYYY/M/D H:m'));
        },
        edit(id) {
            window.location.href = `/admin/ticket/${id}`;
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