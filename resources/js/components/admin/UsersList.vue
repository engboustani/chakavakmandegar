<template>
    <div id="vue-root">
        <datatable :columns="columns" :data="rows"></datatable>
    </div>
</template>

<script>
export default {
    data: function () { return {
        columns: [
            {label: 'شناسه', field: 'id', align: 'right'},
            {label: 'ایمیل', field: 'user.username', headerClass: 'class-in-header second-class', align: 'right'},
            {label: 'نام', field: 'user.first_name', align: 'right'},
            {label: 'نام خانوادگی', field: 'user.last_name', align: 'right'},
            {label: 'شماره همراه', field: 'user.email', align: 'right'},
        ],
        rows: [
            //...
            {
                "id": 1,
                "user": {
                    "username": "dprice0",
                    "first_name": "Daniel",
                    "last_name": "Price",
                    "email": "dprice0@blogs.com"
                },
                "address": "3 Toban Park",
                "city": "Pocatello",
                "state": "Idaho"
            }
            //...
        ]
    }},
}
</script>

<style>

</style>